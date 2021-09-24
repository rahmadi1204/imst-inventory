<?php

namespace App\Http\Controllers;

use App\Models\Po;
use App\Models\Customer;
use App\Models\Supplier;
use App\Models\Warehouse;
use App\Models\TypeProduct;
use App\Models\Data\Product;
use Illuminate\Http\Request;
use App\Models\RecivedProduct;
use App\Models\Master\MasterProduct;

class PoController extends Controller
{
    function index()
    {
        $data = Po::all()->unique('no_po');
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
        $attr = $request->validate([
            'vendor_name' => 'required',
            'vendor_address' => 'required',
            'send_address' => 'required',
            'no_po' => 'required',
            'project' => 'required',
            'date_po' => 'required',
            'code_product' => 'required',
            'name_product' => 'required',
            'type_product' => 'required',
            'description' => 'required',
            'value_product' => 'required',
            'unit_price' => 'required',
            'currency' => 'required',
            'total_amount' => 'required',
            'latest' => 'required',
        ]);
        $po = Po::insert($attr);
        $poProduct = $this->addProduct($request);
        return redirect()->back();
    }
    public function addRecived($request)
    {
        $recived = $request->validate([
            'no_po' => 'required',
            'code_product' => 'required',
            'name_product' => 'required',
            'qty_product' => 'required',
        ]);
        $count = count($recived['code_product']);
        for ($i = 0; $i < $count; $i++) {
            $add = RecivedProduct::insert([
                'no_po' => $request->no_po,
                'qty_po' =>  $request->qty_product[$i],
                'created_at' => now(),
            ]);
        }

        return $add;
    }
}
