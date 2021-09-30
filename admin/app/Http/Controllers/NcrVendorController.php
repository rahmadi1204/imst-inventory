<?php

namespace App\Http\Controllers;

use App\Models\Po;
use App\Models\Pib;
use App\Models\Currency;
use App\Models\Supplier;
use App\Models\Data\Unit;
use App\Models\NcrVendor;
use App\Models\Warehouse;
use App\Models\TypeProduct;
use Illuminate\Http\Request;
use App\Models\HistoryProduct;
use App\Models\ReportDocument;
use App\Models\NcrVendorProduct;
use Illuminate\Support\Facades\DB;
use App\Models\Master\MasterProduct;

class NcrVendorController extends Controller
{

    public function index()
    {
        $data = DB::table('ncr_vendors')
            ->join('ncr_vendor_products', 'ncr_vendor_products.code_ncrv', '=', 'ncr_vendors.code_ncrv')
            ->get();
        // dd($data);
        return view('ncr_vendor.ncrvendor_index', [
            'title' => 'NCR Vendor',
            'data' => $data,
            'transaksiOpen' => "active",
            'transaksiOpen' => "menu-open",
            'transaksiActive' => "active",
            'NcrvendorActive' => "active",
        ]);
    }

    public function create()
    {
        $supplier = Supplier::all();
        $warehouse = Warehouse::all();
        $typeProduct = TypeProduct::all();
        $product = MasterProduct::all();
        $po = Po::all();
        $pib = Pib::all();
        $unit = Unit::all();
        $currency = Currency::orderBy('name')->get();
        return view('ncr_vendor.ncrvendor_create', [
            'title' => 'Data NCR Vendor',
            'po' => $po,
            'pib' => $pib,
            'unit' => $unit,
            'currency' => $currency,
            'typeProduct' => $typeProduct,
            'supplier' => $supplier,
            'product' => $product,
            'warehouse' => $warehouse,
            'transaksiOpen' => "active",
            'transaksiOpen' => "menu-open",
            'transaksiActive' => "active",
            'NcrvendorActive' => "active",
        ]);
    }


    public function store(Request $request)
    {
        // dd($request);
        $attr = $request->validate([
            'date_ncrv' => 'required',
            'no_po' => 'required',
            'code_po' => 'required',
            'name_supplier' => 'required',
            'name_warehouse' => 'required',
            'way_transport' => 'required',
        ]);
        $prd = $request->validate([
            'code_po' => 'required',
            'code_product' => 'required',
            'type_product' => 'required',
            'name_product' => 'required',
            'qty_product' => 'required',
            'unit_product' => 'required',
        ]);
        $attr['code_ncrv'] = date('ymdhis');
        $attr['created_at'] = now();
        $attr['updated_at'] = now();
        // dd($attr);
        $count = count($prd['code_product']);
        $no = 1;
        $cek = ReportDocument::where('type_out', 1)->get();
        if ($cek != "[]") {
            $no = 1 + count($cek);
        }


        DB::beginTransaction();
        try {

            NcrVendor::insert($attr);
            for ($i = 0; $i < $count; $i++) {
                NcrVendorProduct::create([
                    'code_ncrv' => $attr['code_ncrv'],
                    'code_po' => $request->code_po,
                    'code_product' => $request->code_product[$i],
                    'type_product' => $request->type_product[$i],
                    'name_product' => $request->name_product[$i],
                    'qty_product' => -$request->qty_product[$i],
                    'unit_product' => $request->unit_product[$i],
                ]);
                HistoryProduct::create([
                    'code_po' => $request->code_po,
                    'code_ncrv' => $attr['code_ncrv'],
                    'code_product' => $request->code_product[$i],
                    'name_product' => $request->name_product[$i],
                    'date_product' => $request->date_ncrv,
                    'qty_product' => -$request->qty_product[$i],
                    'value_pabean' => 0,
                    'from' => $request->name_warehouse,
                    'to' => $request->name_supplier,
                    'type_history' => 0,
                ]);
                ReportDocument::insert([
                    'code_po' => $request->code_po,
                    'code_ncrv' => $attr['code_ncrv'],
                    'type_out' => 1,
                    'no_out' => $no,
                    'date_out' => $request->date_ncrv,
                    'code_product_out' => $request->code_product[$i],
                    'name_product_out' => $request->name_product[$i],
                    'type_product_out' => $request->type_product[$i],
                    'unit_product_out' => $request->unit_product[$i],
                    'qty_product_out' =>  $request->qty_product[$i],
                    'value_product_out' => 0,
                    'date_product_out' =>  $request->date_ncrv,
                    'created_at' => now(),
                    'updated_at' => now(),
                ]);
            }

            DB::commit();
            dd('ok');
            return redirect()->route('ncr_vendor')->with('Ok', "Data Tersimpan");
        } catch (\Throwable $th) {
            DB::rollback();
            dd('fail');
            return redirect()->route('ncr_vendor')->with('Fail', "Data Tidak Tersimpan");
        }
    }

    public function destroy(Request $request)
    {
        $id = $request->id;
        DB::beginTransaction();
        try {
            NcrVendor::where('code_ncrv', $id)->delete();
            NcrVendorProduct::where('code_ncrv', $id)->delete();
            HistoryProduct::where('code_ncrv', $id)->delete();
            DB::commit();
            return redirect()->route('ncr_vendor')->with('Ok', 'Data Terhaapus');
        } catch (\Throwable $th) {
            DB::rollback();
            return redirect()->route('ncr_vendor')->with('Fail', 'Data Tidak Terhaapus');
        }
    }
}
