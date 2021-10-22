<?php

namespace App\Http\Controllers;

use App\Models\Po;
use App\Models\Pib;
use App\Models\Currency;
use App\Models\Customer;
use App\Models\Data\Unit;
use App\Models\Warehouse;
use App\Models\NcrCustomer;
use App\Models\TypeProduct;
use Illuminate\Http\Request;
use App\Models\HistoryProduct;
use App\Models\NcrCustomerProduct;
use Illuminate\Support\Facades\DB;
use App\Models\Master\MasterProduct;

class NcrcustomerController extends Controller
{

    public function index()
    {
        $data = DB::table('ncr_customers')
            ->join('ncr_customer_products', 'ncr_customer_products.code_ncrc', '=', 'ncr_customers.code_ncrc')
            ->join('master_products', 'master_products.id', '=', 'ncr_customer_products.product_id')
            ->join('customers', 'customers.id', '=', 'ncr_customers.customer_id')
            ->join('warehouses', 'warehouses.id', '=', 'ncr_customers.warehouse_id')
            ->get([
                'ncr_customers.code_ncrc',
                'ncr_customers.date_ncrc',
                'ncr_customers.no_ref',
                'customers.name_customer',
                'warehouses.name_warehouse',
                'master_products.name_product',
                'ncr_customer_products.code_ncrc_product',
                'ncr_customer_products.qty_product',
            ]);
        // dd($data);
        return view('ncr_customer.ncrcustomer_index', [
            'title' => 'NCR Customer',
            'data' => $data,
            'transaksiOpen' => "active",
            'transaksiOpen' => "menu-open",
            'transaksiActive' => "active",
            'NcrCustActive' => "active",
        ]);
    }

    public function create()
    {
        $customer = Customer::all();
        $warehouse = Warehouse::all();
        $typeProduct = TypeProduct::all();
        $product = MasterProduct::all();
        $po = Po::all();
        $unit = Unit::all();
        $currency = Currency::orderBy('name')->get();
        $codeNcrc = DB::table('ncr_customers')
            ->join('customers', 'customers.id', '=', 'ncr_customers.customer_id')
            ->where('type_ncrc', '=', 0)
            ->get([
                'customers.id',
                'customers.name_customer',
                'customers.address_customer',
                'ncr_customers.no_ref',
                'ncr_customers.code_po',
            ]);
        return view('ncr_customer.ncrcustomer_create', [
            'title' => 'Data NCR Customer',
            'po' => $po,
            'unit' => $unit,
            'codeNcrc' => $codeNcrc,
            'currency' => $currency,
            'typeProduct' => $typeProduct,
            'customer' => $customer,
            'product' => $product,
            'warehouse' => $warehouse,
            'transaksiOpen' => "active",
            'transaksiOpen' => "menu-open",
            'transaksiActive' => "active",
            'NcrCustActive' => "active",
        ]);
    }


    public function store(Request $request)
    {
        // dd($request);
        $attr = $request->validate([
            'date_ncrc' => 'required',
            'name_customer' => 'required',
            'name_warehouse' => 'required',
            'way_transport' => 'required',
        ]);
        $prd = $request->validate([
            'code_product' => 'required',
            'qty_product' => 'required',
            'unit_product' => 'required',
        ]);
        // dd($attr);
        $count = count($prd['code_product']);

        DB::beginTransaction();
        try {

            NcrCustomer::insert([
                'code_po' => null,
                'code_ncrc' => date('ymdhis'),
                'date_ncrc' => $request->date_ncrc,
                'no_ref' => $request->no_ref,
                'type_ncrc' => 0,
                'warehouse_id' => $request->name_warehouse,
                'customer_id' =>  $request->name_customer,
                'way_transport' =>  $request->way_transport,
                'created_at' => now(),
                'updated_at' => now(),
            ]);
            for ($i = 0; $i < $count; $i++) {
                NcrCustomerProduct::create([
                    'code_po' => null,
                    'type_ncrc' => 0,
                    'code_ncrc' => date('ymdhis'),
                    'code_ncrc_product' => date('ymdhis') . '-' . $request->code_product[$i],
                    'product_id' => $request->code_product[$i],
                    'qty_product' => -$request->qty_product[$i],
                    'unit_product' => $request->unit_product[$i],
                ]);
                HistoryProduct::create([
                    'code_po' => null,
                    'code_ncrc' => date('ymdhis'),
                    'code_po_product' => null,
                    'code_ncrc_product' => date('ymdhis') . '-' . $request->code_product[$i],
                    'product_id' => $request->code_product[$i],
                    'unit_product' => $request->unit_product[$i],
                    'product_pabean' => 0,
                    'date_product' =>  $request->date_ncrc,
                    'type_history' =>  -3,
                    'to' =>  $request->name_warehouse,
                    'from' =>  $request->name_customer,
                    'qty_product' =>  -$request->qty_product[$i],
                    'created_at' => now(),
                    'updated_at' => now(),
                ]);
            }
            DB::commit();
            // dd('ok');
            return redirect()->route('ncr_customer')->with('Ok', "Data Tersimpan");
        } catch (\Throwable $th) {
            DB::rollback();
            // dd('fail');
            return redirect()->route('ncr_customer')->with('Fail', "Data Tidak Tersimpan");
        }
    }

    public function storeCustomer(Request $request)
    {
        // dd($request);

        $count = count($request->code_product);
        $code = date('ymdhis');

        DB::beginTransaction();
        try {

            NcrCustomer::insert([
                'code_po' => null,
                'code_ncrc' => $code,
                'date_ncrc' => $request->date_ncrc,
                'no_ref' => $request->no_ref,
                'type_ncrc' => 1,
                'warehouse_id' => $request->name_warehouse,
                'customer_id' =>  $request->code_customer,
                'way_transport' =>  $request->way_transport,
                'created_at' => now(),
                'updated_at' => now(),
            ]);
            for ($i = 0; $i < $count; $i++) {
                NcrCustomerProduct::create([
                    'code_po' => null,
                    'type_ncrc' => 1,
                    'code_ncrc' => $code,
                    'code_ncrc_product' => $code . '-' . $request->code_product[$i],
                    'product_id' => $request->code_product[$i],
                    'qty_product' => $request->qty_product[$i],
                    'unit_product' => $request->unit_product[$i],
                ]);
                HistoryProduct::create([
                    'code_po' => null,
                    'code_ncrc' => $code,
                    'code_po_product' => null,
                    'code_ncrc_product' => $code . '-' . $request->code_product[$i],
                    'product_id' => $request->code_product[$i],
                    'unit_product' => $request->unit_product[$i],
                    'product_pabean' => 0,
                    'date_product' =>  $request->date_ncrc,
                    'type_history' =>  3,
                    'to' =>  $request->name_warehouse,
                    'from' =>  $request->code_customer,
                    'qty_product' =>  $request->qty_product[$i],
                    'created_at' => now(),
                    'updated_at' => now(),
                ]);
            }
            DB::commit();
            // dd('ok');
            return redirect()->route('ncr_customer')->with('Ok', "Data Tersimpan");
        } catch (\Throwable $th) {
            DB::rollback();
            // dd('fail');
            return redirect()->route('ncr_customer')->with('Fail', "Data Tidak Tersimpan");
        }
    }

    public function edit($id)
    {
        $customer = Customer::all();
        $warehouse = Warehouse::all();
        $typeProduct = TypeProduct::all();
        $product = MasterProduct::all();
        $po = Po::all();
        $unit = Unit::all();
        $currency = Currency::orderBy('name')->get();
        $codeNcrc = DB::table('ncr_customers')
            ->join('customers', 'customers.id', '=', 'ncr_customers.customer_id')
            ->where('type_ncrc', '=', 0)
            ->get([
                'customers.id',
                'customers.name_customer',
                'customers.address_customer',
                'ncr_customers.no_ref',
                'ncr_customers.code_po',
            ]);
        $data = NcrCustomer::where('code_ncrc', $id)
            ->join('warehouses', 'warehouses.id', '=', 'ncr_customers.warehouse_id')
            ->join('customers', 'customers.id', '=', 'ncr_customers.customer_id')
            ->get();
        // dd($data);
        $id = NcrCustomer::where('code_ncrc', $id)->value('code_ncrc');
        return view('ncr_customer.ncrcustomer_edit', [
            'title' => 'Data NCR Customer',
            'po' => $po,
            'data' => $data,
            'id' => $id,
            'unit' => $unit,
            'codeNcrc' => $codeNcrc,
            'currency' => $currency,
            'typeProduct' => $typeProduct,
            'customer' => $customer,
            'product' => $product,
            'warehouse' => $warehouse,
            'transaksiOpen' => "active",
            'transaksiOpen' => "menu-open",
            'transaksiActive' => "active",
            'NcrCustActive' => "active",
        ]);
    }
    public function destroy(Request $request)
    {
        $id = $request->id;
        $code = mb_substr($id, 0, 12);
        $cek = NcrCustomerProduct::where('code_ncrc', $code)->get();
        DB::beginTransaction();

        try {
            if (count($cek) == 1) {
                NcrCustomer::where('code_ncrc', $code)->delete();
            }
            HistoryProduct::where('code_ncrc_product', $id)->delete();
            NcrCustomerProduct::where('code_ncrc_product', $id)->delete();
            DB::commit();

            return redirect()->route('ncr_customer')->with('Ok', 'Data Terhapus');
        } catch (\Throwable $th) {
            DB::rollback();
            return redirect()->route('ncr_customer')->with('Fail', 'Data Tidak Terhapus');
        }
    }
}
