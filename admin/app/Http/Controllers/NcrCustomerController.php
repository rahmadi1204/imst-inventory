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
            ->join('master_products', 'master_products.code_product', '=', 'ncr_customer_products.code_product')
            ->get([
                'ncr_customers.code_ncrc',
                'ncr_customers.date_ncrc',
                'ncr_customers.no_ncrc',
                'ncr_customers.name_customer',
                'ncr_customers.name_warehouse',
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
        $pib = Pib::all();
        $unit = Unit::all();
        $currency = Currency::orderBy('name')->get();
        return view('ncr_customer.ncrcustomer_create', [
            'title' => 'Data NCR Customer',
            'po' => $po,
            'pib' => $pib,
            'unit' => $unit,
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
        $attr['code_po'] = date('ymdhis');
        $attr['no_ncrc'] = $request->no_ncrc;
        $attr['code_ncrc'] = date('ymdhis');
        $attr['created_at'] = now();
        $attr['updated_at'] = now();
        // dd($attr);
        $count = count($prd['code_product']);

        NcrCustomer::insert($attr);
        for ($i = 0; $i < $count; $i++) {
            NcrCustomerProduct::create([
                'code_po' => null,
                'code_ncrc' => $attr['code_ncrc'],
                'code_ncrc_product' => $attr['code_ncrc'] . '-' . $request->code_product[$i],
                'code_product' => $request->code_product[$i],
                'qty_product' => -$request->qty_product[$i],
                'unit_product' => $request->unit_product[$i],
            ]);
            HistoryProduct::create([
                'code_po' => 0,
                'code_ncrc' => $attr['code_ncrc'],
                'code_po_product' => 0,
                'code_ncrc_product' => $attr['code_ncrc'] . '-' . $request->code_product[$i],
                'code_product' => $request->code_product[$i],
                'unit_product' => $request->unit_product[$i],
                'product_pabean' => 0,
                'date_product' =>  $attr['date_ncrc'],
                'type_history' =>  -1,
                'from' =>  $request->name_warehouse,
                'to' =>  $request->name_customer,
                'qty_product' =>  -$request->qty_product[$i],
                'created_at' => now(),
                'updated_at' => now(),
            ]);
        }


        DB::beginTransaction();
        try {


            DB::commit();
            // dd('ok');
            return redirect()->route('ncr_customer')->with('Ok', "Data Tersimpan");
        } catch (\Throwable $th) {
            DB::rollback();
            // dd('fail');
            return redirect()->route('ncr_customer')->with('Fail', "Data Tidak Tersimpan");
        }
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
