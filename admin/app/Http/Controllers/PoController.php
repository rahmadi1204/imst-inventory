<?php

namespace App\Http\Controllers;

use App\Models\Currency;
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
use App\Models\NcrCustomer;
use App\Models\NcrVendor;
use App\Models\Pib;

class PoController extends Controller
{
    function index()
    {
        $cek = DB::table('history_products')
            ->selectRaw('history_products.code_po_product, sum(qty_product) as qty_product')
            ->groupBy('code_po_product')
            ->pluck('qty_product', 'code_po_product');
        DB::table('po_products')->update([
            'qty_recived' => 0,
        ]);
        // dd($cek);
        foreach ($cek as $key => $value) {
            DB::table('po_products')->where('code_po_product', '=', $key)
                ->update([
                    'qty_recived' => $value,
                ]);
        }
        $data = DB::table('pos')
            ->join('suppliers', 'suppliers.id', '=', 'pos.supplier_id')
            ->join('warehouses', 'warehouses.id', '=', 'pos.warehouse_id')
            ->join('po_products', 'po_products.code_po', '=', 'pos.code_po')
            ->join('master_products', 'master_products.id', '=', 'po_products.product_id')
            ->get([
                'pos.id',
                'pos.no_po',
                'pos.code_po',
                'pos.project',
                'pos.date_po',
                'suppliers.name_supplier',
                'suppliers.address_supplier',
                'warehouses.name_warehouse',
                'warehouses.address_warehouse',
                'pos.currency',
                'pos.total_amount_po',
                'po_products.description',
                'po_products.qty_product',
                'po_products.qty_recived',
                'po_products.unit_price',
                'po_products.total_amount',
                'po_products.latest',
                'master_products.code_product',
                'master_products.name_product',
                'master_products.type_product',
            ]);

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
        $currency = Currency::orderBy('name')->get();
        $data = Po::where('date_po', $date)->get();
        return view('master_data.po.po_create', [
            'data' => $data,
            'supplier' => $supplier,
            'tujuan' => $tujuan,
            'product' => $product,
            'currency' => $currency,
            'typeProduct' => $typeProduct,
            'title' => 'Data PO',
            'transaksiOpen' => "menu-open",
            'transaksiActive' => "active",
            'poActive' => "active",
        ]);
    }
    public function store(Request $request)
    {
        // dd($request);
        $request->validate([
            'no_po' => 'required',
            'name_supplier' => 'required',
            'name_warehouse' => 'required',
            'project' => 'required',
            'date_po' => 'required',
            'code_product' => 'required',
            'qty_product' => 'required',
            'unit_price' => 'required',
            'currency' => 'required',
            'total_amount' => 'required',
            'latest' => 'required',
        ]);
        // dd($request);
        DB::beginTransaction();

        $count = count($request->code_product);
        $amount = 0;
        $code_po = date('ymdhis');
        try {
            for ($i = 0; $i < $count; $i++) {
                PoProduct::insert([
                    'code_po' => $code_po,
                    'code_po_product' => $code_po . '-' . $request->code_product[$i],
                    'product_id' => $request->code_product[$i],
                    'description' => $request->description[$i],
                    'latest' => $request->latest[$i],
                    'qty_product' => $request->qty_product[$i],
                    'qty_recived' => 0,
                    'unit_price' => $request->unit_price[$i],
                    'total_amount' => $request->total_amount[$i],
                    'created_at' => now(),
                    'updated_at' => now(),
                ]);
                $amount = $request->total_amount[$i];
                $amount++;
            }

            Po::insert([
                'no_po' => $request->no_po,
                'code_po' => $code_po,
                'project' => $request->project,
                'date_po' => $request->date_po,
                'supplier_id' => $request->name_supplier,
                'warehouse_id' => $request->name_warehouse,
                'currency' => $request->currency,
                'total_amount_po' => $amount,
                'created_at' => now(),
                'updated_at' => now(),
            ]);

            DB::commit();

            return redirect()->route('po')->with('Ok', 'Data Disimpan');
        } catch (\Throwable $th) {
            //throw $th;
            DB::rollback();
            dd('fail');
            return redirect()->route('po')->with('Fail', 'Data Tidak Disimpan');
        }
    }
    public function edit($id)
    {
        // dd($id);
        $code = DB::table('pos')->where('id', '=', $id)->value('code_po');
        $po = Po::find($id);
        $poSupplier = PO::find($id)->supplier;
        $poWarehouse = PO::find($id)->warehouse;
        $poProduct = DB::table('po_products')->where('code_po', '=', $code)
            ->join('master_products', 'master_products.id', '=', 'po_products.product_id')->get();
        // dd($poProduct);
        $supplier = Supplier::all();
        $typeProduct = TypeProduct::all();
        $warehouse = Warehouse::all();
        $currency = Currency::all();
        return view(
            'master_data.po.po_edit',
            [
                'po' => $po,
                'poSupplier' => $poSupplier,
                'poWarehouse' => $poWarehouse,
                'product' => $poProduct,
                'typeProduct' => $typeProduct,
                'supplier' => $supplier,
                'tujuan' => $warehouse,
                'currency' => $currency,
                'title' => 'Edit Data Pre Order',
                'transaksiOpen' => "menu-open",
                'transaksiActive' => "active",
                'poActive' => "active",
            ]
        );
    }
    public function update(Request $request, $id)
    {
        // dd($id);
        DB::beginTransaction();
        $code_po = $id;
        try {
            $amount = 0;
            if (isset($request->code_product)) {
                $count = count($request->code_product);
                for ($i = 0; $i < $count; $i++) {
                    PoProduct::insert([
                        'code_po' => $code_po,
                        'code_po_product' => $code_po . '-' . $request->code_product[$i],
                        'product_id' => $request->code_product[$i],
                        'description' => $request->description[$i],
                        'latest' => $request->latest[$i],
                        'qty_product' => $request->qty_product[$i],
                        'qty_recived' => 0,
                        'unit_price' => $request->unit_price[$i],
                        'total_amount' => $request->total_amount[$i],
                        'created_at' => now(),
                        'updated_at' => now(),
                    ]);
                    $amount = $request->total_amount[$i];
                    $amount++;
                }
            }
            $cek = DB::table('po_products')
                ->where('code_po', '=', $code_po)
                ->selectRaw('po_products.code_po, sum(total_amount) as total_amount')
                ->groupBy('code_po')
                ->first('total_amount');
            // dd($cek);
            $amount1 = (float)$cek->total_amount;
            Po::where('code_po', '=', $code_po)->update([
                'no_po' => $request->no_po,
                'project' => $request->project,
                'date_po' => $request->date_po,
                'supplier_id' => $request->name_supplier,
                'warehouse_id' => $request->name_warehouse,
                'currency' => $request->currency,
                'total_amount_po' => $amount + $amount1,
                'created_at' => now(),
                'updated_at' => now(),
            ]);

            DB::commit();

            return redirect()->route('po')->with('Ok', 'Data Disimpan');
        } catch (\Throwable $th) {
            //throw $th;
            DB::rollback();
            dd('fail');
            return redirect()->route('po')->with('Fail', 'Data Tidak Disimpan');
        }
    }
    public function destroy(Request $request)
    {
        $id = $request->id;
        // dd($id);
        $cekPib = Pib::where('code_po', $id)->first();
        $cekVendor = NcrVendor::where('code_po', $id)->first();
        $cekCustomer = NcrCustomer::where('code_po', $id)->first();
        // dd($cekPib);
        if ($cekPib != null) {
            return redirect()->route('po')->with('Fail', 'Data Digunakan PIB');
        }
        if ($cekVendor != null) {
            return redirect()->route('po')->with('Fail', 'Data Digunakan NCR Vendor');
        }
        if ($cekCustomer != null) {
            return redirect()->route('po')->with('Fail', 'Data Digunakan NCR Customer');
        }
        DB::beginTransaction();
        try {
            Po::where('code_po', $id)->delete();
            PoProduct::where('code_po', $id)->delete();
            DB::commit();
            // dd('ok');
            return redirect()->route('po')->with('Ok', 'Data Dihapus');
        } catch (\Throwable $th) {
            DB::rollback();
            return redirect()->route('po')->with('Fail', 'Data Gagal Dihapus');
        }
    }
}
