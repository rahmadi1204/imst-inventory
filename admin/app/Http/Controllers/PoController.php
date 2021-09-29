<?php

namespace App\Http\Controllers;

use App\Models\Po;
use App\Models\Customer;
use App\Models\Supplier;
use App\Models\PoProduct;
use App\Models\Warehouse;
use App\Models\PibProduct;
use App\Models\TypeProduct;
use App\Models\Data\Product;
use Illuminate\Http\Request;
use App\Models\HistoryProduct;
use App\Models\RecivedProduct;
use Illuminate\Support\Facades\DB;
use App\Models\Master\MasterProduct;

class PoController extends Controller
{
    function index()
    {
        $a = 1;
        for ($i = 0; $i < $a; $i++) {
            $data = DB::table('pos')
                ->join('po_products', 'po_products.no_po', '=', 'pos.no_po')
                ->get();
            foreach ($data as $key) {
                DB::table('po_products')->where('code_product', '=', $key->code_product)->update([
                    'qty_recived' => 0,
                ]);
                $product = PibProduct::where('no_po', $key->no_po)->groupBy('code_product')
                    ->selectRaw(' sum(qty_product) as sum, code_product')
                    ->pluck('sum', 'code_product');
                // dd($product);
                foreach ($product as $key => $value) {
                    PoProduct::where('code_product', $key)->update([
                        'qty_recived' => $value,
                    ]);
                }
            }
        }
        // dd($product);
        return view('master_data.po.po_index', [
            'data' => $data,
            'title' => 'Data Pre Order',
            'transaksiOpen' => "menu-open",
            'transaksiActive' => "active",
            'poActive' => "active",
        ]);
    }
    public function create()
    {
        $date = date('Y-m-d');
        $supplier = Supplier::all();
        $tujuan = Warehouse::all();
        $typeProduct = TypeProduct::all();
        $product = MasterProduct::all();
        $data = Po::where('date_po', $date)->get();
        return view('master_data.po.po_create', [
            'data' => $data,
            'supplier' => $supplier,
            'tujuan' => $tujuan,
            'product' => $product,
            'typeProduct' => $typeProduct,
            'title' => 'Data PO',
            'menuOpen' => "menu-open",
            'menuActive' => "active",
            'PoPib' => "menu-open",
            'PoPibActive' => "active",
            'PoActive' => "active",
        ]);
    }
    public function store(Request $request)
    {
        // dd($request);
        $request->validate([
            'vendor_name' => 'required',
            'vendor_address' => 'required',
            'send_address' => 'required',
            'address_warehouse' => 'required',
            'no_po' => 'required',
            'project' => 'required',
            'date_po' => 'required',
            'code_product' => 'required',
            'name_product' => 'required',
            'type_product' => 'required',
            'description' => 'required',
            'qty_product' => 'required',
            'unit_price' => 'required',
            'currency' => 'required',
            'total_amount' => 'required',
            'total_amount_po' => 'nullable',
            'latest' => 'required',
        ]);

        DB::beginTransaction();

        $count = count($request->code_product);
        $amount = 0;
        try {
            for ($i = 0; $i < $count; $i++) {
                PoProduct::insert([
                    'no_po' => $request->no_po,
                    'code_product' => $request->code_product[$i],
                    'type_product' => $request->type_product[$i],
                    'name_product' => $request->name_product[$i],
                    'description' => $request->description[$i],
                    'latest' => $request->latest[$i],
                    'qty_product' => $request->qty_product[$i],
                    'qty_recived' => 0,
                    'unit_price' => $request->unit_price[$i],
                    'total_amount' => $request->total_amount[$i],
                    'created_at' => now(),
                ]);
                $amount = $request->total_amount[$i];
                $amount++;
            }

            $po =  Po::insert([
                'no_po' => $request->no_po,
                'project' => $request->project,
                'date_po' => $request->date_po,
                'vendor_name' => $request->vendor_name,
                'vendor_address' => $request->vendor_address,
                'send_address' => $request->send_address,
                'address_warehouse' => $request->address_warehouse,
                'currency' => $request->currency,
                'total_amount_po' => $amount,
                'created_at' => now(),
            ]);

            DB::commit();

            return redirect()->route('po')->with('Ok', 'Data Disimpan');
        } catch (\Throwable $th) {
            //throw $th;
            DB::rollback();
            return redirect()->route('po')->with('Fail', 'Data Tidak Disimpan');
        }
    }
}
