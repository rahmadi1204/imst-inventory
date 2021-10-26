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
            ->join('pos', 'pos.code_po', '=', 'ncr_vendors.code_po')
            ->join('ncr_vendor_products', 'ncr_vendor_products.code_ncrv', '=', 'ncr_vendors.code_ncrv')
            ->join('master_products', 'master_products.id', '=', 'ncr_vendor_products.product_id')
            ->join('suppliers', 'suppliers.id', '=', 'ncr_vendors.supplier_id')
            ->join('warehouses', 'warehouses.id', '=', 'ncr_vendors.warehouse_id')
            ->get([
                'ncr_vendors.code_ncrv',
                'pos.no_po',
                'ncr_vendors.no_ref',
                'ncr_vendors.way_transport',
                'ncr_vendors.date_ncrv',
                'ncr_vendor_products.qty_product',
                'ncr_vendor_products.code_ncrv_product',
                'suppliers.name_supplier',
                'warehouses.name_warehouse',
                'master_products.name_product',
            ]);
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
        $codeNcrv = NcrVendor::join('suppliers', 'suppliers.id', '=', 'ncr_vendors.supplier_id')
            ->where('type_ncrv', '=', 0)
            ->get([
                'suppliers.id',
                'suppliers.name_supplier',
                'suppliers.address_supplier',
                'ncr_vendors.no_ref',
                'ncr_vendors.code_po',
            ]);
        // dd($codeNcrv);
        $po = Po::join('suppliers', 'suppliers.id', '=', 'pos.supplier_id')
            ->get([
                'suppliers.id',
                'suppliers.code_supplier',
                'suppliers.name_supplier',
                'suppliers.address_supplier',
                'pos.code_po',
                'pos.no_po',
            ]);
        $pib = Pib::all();
        $unit = Unit::all();
        $currency = Currency::orderBy('name')->get();
        return view('ncr_vendor.ncrvendor_create', [
            'title' => 'Data NCR Vendor',
            'po' => $po,
            'pib' => $pib,
            'unit' => $unit,
            'codeNcrv' => $codeNcrv,
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
        $count = count($request->code_product);
        $code = date('ymdhis');

        DB::beginTransaction();
        try {

            NcrVendor::insert([
                'code_ncrv' => $code,
                'type_ncrv' => 0,
                'code_po' => $request->code_po,
                'no_ref' => $request->no_ref,
                'date_ncrv' => $request->date_ncrv,
                'supplier_id' => $request->code_supplier,
                'warehouse_id' => $request->name_warehouse,
                'way_transport' => $request->way_transport,
                'created_at' => now(),
                'updated_at' => now(),
            ]);
            for ($i = 0; $i < $count; $i++) {
                NcrVendorProduct::insert([
                    'code_po' => $request->code_po,
                    'code_ncrv' => $code,
                    'type_ncrv' => 0,
                    'code_ncrv_product' => $code . '-' . $request->code_product[$i],
                    'product_id' => $request->code_product[$i],
                    'qty_product' => -$request->qty_product[$i],
                    'unit_product' => $request->unit_product[$i],
                    'created_at' => now(),
                    'updated_at' => now(),
                ]);
                HistoryProduct::insert([
                    'code_po' => $request->code_po,
                    'code_ncrv' => $code,
                    'code_po_product' => $request->code_po . '-' . $request->code_product[$i],
                    'code_ncrv_product' => $code . '-' . $request->code_product[$i],
                    'product_id' => $request->code_product[$i],
                    'unit_product' => $request->unit_product[$i],
                    'product_pabean' => 0,
                    'date_product' => $request->date_ncrv,
                    'type_history' =>  -2,
                    'to' =>  $request->name_warehouse,
                    'from' =>  $request->code_supplier,
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
            dd('fail');
            return redirect()->route('ncr_vendor')->with('Fail', "Data Tidak Tersimpan");
        }
    }
    public function storeVendor(Request $request)
    {
        // dd($request);
        $count = count($request->code_product);
        $code = date('ymdhis');

        DB::beginTransaction();
        try {

            NcrVendor::insert([
                'code_ncrv' => $code,
                'code_po' => $request->code_po,
                'type_ncrv' => 1,
                'date_ncrv' => $request->date_ncrv,
                'no_ref' => $request->no_ref,
                'supplier_id' => $request->code_supplier,
                'warehouse_id' => $request->name_warehouse,
                'way_transport' => $request->way_transport,
                'created_at' => now(),
                'updated_at' => now(),
            ]);
            for ($i = 0; $i < $count; $i++) {
                NcrVendorProduct::insert([
                    'code_po' => $request->code_po,
                    'type_ncrv' => 1,
                    'code_ncrv' => $code,
                    'code_ncrv_product' => $code . '-' . $request->code_product[$i],
                    'product_id' => $request->code_product[$i],
                    'qty_product' => $request->qty_product[$i],
                    'unit_product' => $request->unit_product[$i],
                    'created_at' => now(),
                    'updated_at' => now(),
                ]);
                HistoryProduct::insert([
                    'code_po' => $request->code_po,
                    'code_ncrv' => $code,
                    'code_po_product' => $request->code_po . '-' . $request->code_product[$i],
                    'code_ncrv_product' => $code . '-' . $request->code_product[$i],
                    'product_id' => $request->code_product[$i],
                    'unit_product' => $request->unit_product[$i],
                    'product_pabean' => 0,
                    'date_product' => $request->date_ncrv,
                    'type_history' =>  2,
                    'to' =>  $request->name_warehouse,
                    'from' =>  $request->code_supplier,
                    'qty_product' =>  $request->qty_product[$i],
                    'created_at' => now(),
                    'updated_at' => now(),
                ]);
            }

            DB::commit();
            // dd('ok');
            return redirect()->route('ncr_vendor')->with('Ok', "Data Tersimpan");
        } catch (\Throwable $th) {
            DB::rollback();
            dd('fail');
            return redirect()->route('ncr_vendor')->with('Fail', "Data Tidak Tersimpan");
        }
    }
    public function edit($id)
    {
        $supplier = Supplier::all();
        $warehouse = Warehouse::all();
        $typeProduct = TypeProduct::all();
        $product = MasterProduct::all();
        $cek = NcrVendor::where('code_ncrv', $id)->value('type_ncrv');

        $codeNcrv = NcrVendor::join('suppliers', 'suppliers.id', '=', 'ncr_vendors.supplier_id')
            ->where('type_ncrv', '=', $cek)
            ->get([
                'suppliers.id',
                'suppliers.name_supplier',
                'suppliers.address_supplier',
                'ncr_vendors.no_ref',
                'ncr_vendors.code_po',
                'ncr_vendors.code_ncrv',
            ]);
        // dd($codeNcrv);
        $po = Po::join('suppliers', 'suppliers.id', '=', 'pos.supplier_id')
            ->get([
                'suppliers.id',
                'suppliers.code_supplier',
                'suppliers.name_supplier',
                'suppliers.address_supplier',
                'pos.code_po',
                'pos.no_po',
            ]);
        $pib = Pib::all();
        $unit = Unit::all();
        $currency = Currency::orderBy('name')->get();
        $data = NcrVendor::where('code_ncrv', $id)->with(['supplier', 'warehouse'])
            ->first();
        $ncrvProduct = NcrVendorProduct::where('code_ncrv', $id)->with(['product'])->get();
        // dd($codeNcrv);
        if ($cek == 0) {
            return view('ncr_vendor.ncrvendor_return_edit', [
                'title' => 'NCR Vendor',
                'po' => $po,
                'pib' => $pib,
                'unit' => $unit,
                'codeNcrv' => $codeNcrv,
                'currency' => $currency,
                'typeProduct' => $typeProduct,
                'supplier' => $supplier,
                'product' => $product,
                'warehouse' => $warehouse,
                'data' => $data,
                'ncrvProduct' => $ncrvProduct,
                'transaksiOpen' => "active",
                'transaksiOpen' => "menu-open",
                'transaksiActive' => "active",
                'NcrvendorActive' => "active",
            ]);
        } else {
            return view('ncr_vendor.ncrvendor_edit', [
                'title' => 'NCR Vendor',
                'po' => $po,
                'pib' => $pib,
                'unit' => $unit,
                'codeNcrv' => $codeNcrv,
                'currency' => $currency,
                'typeProduct' => $typeProduct,
                'supplier' => $supplier,
                'product' => $product,
                'warehouse' => $warehouse,
                'data' => $data,
                'ncrvProduct' => $ncrvProduct,
                'transaksiOpen' => "active",
                'transaksiOpen' => "menu-open",
                'transaksiActive' => "active",
                'NcrvendorActive' => "active",
            ]);
        }
    }
    public function update(Request $request, $id)
    {

        // dd($request);
        DB::beginTransaction();

        try {
            NcrVendor::where('code_ncrv', $id)->update([
                'date_ncrv' => $request->date_ncrv,
                'code_po' => $request->code_po,
                'no_ref' => $request->no_ref,
                'no_ref' => $request->no_ref,
                'supplier_id' => $request->code_supplier,
                'warehouse_id' => $request->name_warehouse,
                'way_transport' => $request->way_transport,
                'way_transport' => $request->way_transport,
                'updated_at' => now(),
            ]);
            if ($request->name_product[0] != null) {
                $count = count($request->name_product);
                for ($i = 0; $i < $count; $i++) {
                    NcrVendorProduct::insert([
                        'code_po' => $request->code_po,
                        'type_ncrv' => 1,
                        'code_ncrv' => $id,
                        'code_ncrv_product' => $id . '-' . $request->code_product[$i],
                        'product_id' => $request->code_product[$i],
                        'qty_product' => $request->qty_product[$i],
                        'unit_product' => $request->unit_product[$i],
                        'created_at' => now(),
                        'updated_at' => now(),
                    ]);
                    HistoryProduct::insert([
                        'code_po' => $request->code_po,
                        'code_ncrv' => $id,
                        'code_po_product' => $request->code_po . '-' . $request->code_product[$i],
                        'code_ncrv_product' => $id . '-' . $request->code_product[$i],
                        'product_id' => $request->code_product[$i],
                        'unit_product' => $request->unit_product[$i],
                        'product_pabean' => 0,
                        'date_product' => $request->date_ncrv,
                        'type_history' =>  2,
                        'to' =>  $request->name_warehouse,
                        'from' =>  $request->code_supplier,
                        'qty_product' =>  $request->qty_product[$i],
                        'created_at' => now(),
                        'updated_at' => now(),
                    ]);
                }
            }

            DB::commit();
            return redirect()->route('ncr_vendor')->with('Ok', 'Data Berhasil Di Update');
        } catch (\Throwable $th) {
            DB::rollback();
            dd('fail');
            return redirect()->route('ncr_vendor')->with('Fail', 'Data Gagal Di Update');
        }
    }
    public function updateReturn(Request $request, $id)
    {
        // dd($request);
        DB::beginTransaction();

        try {
            NcrVendor::where('code_ncrv', $id)->update([
                'date_ncrv' => $request->date_ncrv,
                'code_po' => $request->code_po,
                'no_ref' => $request->no_ref,
                'no_ref' => $request->no_ref,
                'supplier_id' => $request->code_supplier,
                'warehouse_id' => $request->name_warehouse,
                'way_transport' => $request->way_transport,
                'way_transport' => $request->way_transport,
                'updated_at' => now(),
            ]);
            if ($request->name_product[0] != null) {
                $count = count($request->name_product);
                for ($i = 0; $i < $count; $i++) {
                    NcrVendorProduct::insert([
                        'code_po' => $request->code_po,
                        'type_ncrv' => 1,
                        'code_ncrv' => $id,
                        'code_ncrv_product' => $id . '-' . $request->code_product[$i],
                        'product_id' => $request->code_product[$i],
                        'qty_product' => $request->qty_product[$i],
                        'unit_product' => $request->unit_product[$i],
                        'created_at' => now(),
                        'updated_at' => now(),
                    ]);
                    HistoryProduct::insert([
                        'code_po' => $request->code_po,
                        'code_ncrv' => $id,
                        'code_po_product' => $request->code_po . '-' . $request->code_product[$i],
                        'code_ncrv_product' => $id . '-' . $request->code_product[$i],
                        'product_id' => $request->code_product[$i],
                        'unit_product' => $request->unit_product[$i],
                        'product_pabean' => 0,
                        'date_product' => $request->date_ncrv,
                        'type_history' =>  -2,
                        'to' =>  $request->name_warehouse,
                        'from' =>  $request->code_supplier,
                        'qty_product' =>  $request->qty_product[$i],
                        'created_at' => now(),
                        'updated_at' => now(),
                    ]);
                }
            }

            DB::commit();
            return redirect()->route('ncr_vendor')->with('Ok', 'Data Berhasil Di Update');
        } catch (\Throwable $th) {
            DB::rollback();
            dd('fail');
            return redirect()->route('ncr_vendor')->with('Fail', 'Data Gagal Di Update');
        }
    }
    public function updateProduct(Request $request, $id)
    {
        // dd($request);
        DB::beginTransaction();
        NcrVendorProduct::where('code_ncrv_product', $request->id)->update([
            'product_id' => $request->code_product,
            'qty_product' => $request->qty_product,
            'unit_product' => $request->unit,
            'updated_at' => now(),
        ]);
        HistoryProduct::where('code_ncrv_product', $request->id)->update([
            'product_id' => $request->code_product,
            'qty_product' => $request->qty_product,
            'unit_product' => $request->unit,
            'updated_at' => now(),
        ]);
        try {
            DB::commit();
            return redirect()->back()->with('Ok', 'Data  Product Diupdate');
        } catch (\Throwable $th) {
            DB::rollback();
            dd('gagal');
            return redirect()->back()->with('Fail', 'Data  Product Tidak Diupdate');
        }
    }
    public function destroyProduct(Request $request, $id)
    {
        // dd($id);
        $cek = count(NcrVendorProduct::where('code_ncrv', $id)->select('product_id')->get());
        // dd($cek);
        if ($cek <= 1) {
            return redirect()->back()->with('Fail', 'Data Tidak Boleh Kosong');
        }

        DB::beginTransaction();
        try {

            NcrVendorProduct::where('code_ncrv_product', $request->code)->delete();
            HistoryProduct::where('code_ncrv_product', $request->code)->delete();
            DB::commit();
            return redirect()->back()->with('Ok', 'Data  Berhasil Dihapus');
        } catch (\Throwable $th) {
            DB::rollback();
            dd('gagal');
            return redirect()->back()->with('Fail', 'Data Gagal Dihapus');
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
