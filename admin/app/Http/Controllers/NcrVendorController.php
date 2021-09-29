<?php

namespace App\Http\Controllers;

use App\Models\Po;
use App\Models\Pib;
use App\Models\Currency;
use App\Models\Supplier;
use App\Models\Data\Unit;
use App\Models\HistoryProduct;
use App\Models\Warehouse;
use App\Models\TypeProduct;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Models\Master\MasterProduct;
use App\Models\NcrVendor;
use App\Models\NcrVendorProduct;

class NcrVendorController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
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

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
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

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
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

        NcrVendor::insert($attr);
        for ($i = 0; $i < $count; $i++) {
            NcrVendorProduct::create([
                'code_ncrv' => $attr['code_ncrv'],
                'code_po' => $request->code_po,
                'code_product' => $request->code_product[0],
                'type_product' => $request->type_product[0],
                'name_product' => $request->name_product[0],
                'qty_product' => -$request->qty_product[0],
                'unit_product' => $request->unit_product[0],
            ]);
            HistoryProduct::create([
                'code_po' => $request->code_po,
                'code_ncrv' => $attr['code_ncrv'],
                'code_product' => $request->code_product[0],
                'name_product' => $request->name_product[0],
                'date_product' => $request->date_ncrv,
                'qty_product' => -$request->qty_product[0],
                'from' => $request->name_warehouse,
                'to' => $request->name_supplier,
                'type_history' => 0,
            ]);
        }

        DB::beginTransaction();
        try {

            DB::commit();
            return redirect()->route('ncr_vendor')->with('Ok', "Data Tersimpan");
        } catch (\Throwable $th) {
            DB::rollback();
            return redirect()->route('ncr_vendor')->with('Fail', "Data Tidak Tersimpan");
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
