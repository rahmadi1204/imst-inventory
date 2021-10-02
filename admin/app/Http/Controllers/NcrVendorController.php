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
            ->join('master_products', 'master_products.code_product', '=', 'ncr_vendor_products.code_product')
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
            'qty_product' => 'required',
            'unit_product' => 'required',
        ]);
        $attr['code_ncrv'] = date('ymdhis');
        $attr['created_at'] = now();
        $attr['updated_at'] = now();
        // dd($attr);
        $count = count($prd['code_product']);


        DB::beginTransaction();
        try {

            NcrVendor::insert($attr);
            for ($i = 0; $i < $count; $i++) {
                NcrVendorProduct::create([
                    'code_po' => $request->code_po,
                    'code_ncrv' => $attr['code_ncrv'],
                    'code_ncrv_product' => $attr['code_ncrv'] . '-' . $request->code_product[$i],
                    'code_product' => $request->code_product[$i],
                    'qty_product' => -$request->qty_product[$i],
                    'unit_product' => $request->unit_product[$i],
                ]);
                HistoryProduct::create([
                    'code_po' => $request->code_po,
                    'code_ncrv' => $attr['code_ncrv'],
                    'code_po_product' => $request->code_po . '-' . $request->code_product[$i],
                    'code_ncrv_product' => $attr['code_ncrv'] . '-' . $request->code_product[$i],
                    'code_product' => $request->code_product[$i],
                    'unit_product' => $request->unit_product[$i],
                    'product_pabean' => 0,
                    'date_product' =>  $attr['date_ncrv'],
                    'type_history' =>  0,
                    'from' =>  $request->name_warehouse,
                    'to' =>  $request->name_supplier,
                    'qty_product' =>  -$request->qty_product[$i],
                    'created_at' => now(),
                    'updated_at' => now(),
                ]);
            }

            DB::commit();
            // dd('ok');
            return redirect()->route('ncr_vendor')->with('Ok', "Data Tersimpan");
        } catch (\Throwable $th) {
            DB::rollback();
            // dd('fail');
            return redirect()->route('ncr_vendor')->with('Fail', "Data Tidak Tersimpan");
        }
    }

    public function destroy(Request $request)
    {
        $id = $request->id;
        $code = mb_substr($id, 0, 12);
        $cek =  NcrVendorProduct::where('code_ncrv', $code)->get();
        DB::beginTransaction();

        try {
            if (count($cek) == 1) {
                NcrVendor::where('code_ncrv', $code)->delete();
            }
            HistoryProduct::where('code_ncrv_product', $id)->delete();
            NcrVendorProduct::where('code_ncrv_product', $id)->delete();
            DB::commit();

            return redirect()->route('ncr_vendor')->with('Ok', 'Data Terhapus');
        } catch (\Throwable $th) {
            DB::rollback();
            return redirect()->route('ncr_vendor')->with('Fail', 'Data Tidak Terhapus');
        }
    }
}
