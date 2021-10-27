<?php

namespace App\Http\Controllers\Data;

use App\Models\TypeProduct;
use Illuminate\Support\Facades\DB;
use App\Http\Controllers\Controller;

class HistoryProductController extends Controller
{

    function index()
    {
        app('App\Http\Controllers\CalculateController')->calculating();
        $typeProduct = TypeProduct::all();
        $data = DB::table('history_products')
            ->LeftJoin('master_products', 'master_products.id', '=', 'history_products.product_id')
            ->LeftJoin('suppliers', 'suppliers.id', '=', 'history_products.from')
            ->LeftJoin('warehouses', 'warehouses.id', '=', 'history_products.to')
            ->orderBy('date_product', 'desc')->get([
                'master_products.code_product',
                'master_products.type_product',
                'master_products.name_product',
                'history_products.date_product',
                'history_products.type_history',
                'suppliers.name_supplier',
                'warehouses.name_warehouse',
                'history_products.unit_product',
                'history_products.product_pabean',
                'history_products.qty_product'
            ]);
        // dd($data);
        return view('master_data.barang.history_index', [
            'data' => $data,
            'typeProduct' => $typeProduct,
            'no' => 1,
            'title' => 'History Data Barang',
            'menuOpen' => 'menu-open',
            'menuActive' => 'active',
            'barangOpen' => 'menu-open',
            'barangActive' => 'active',
            'historyActive' => 'active',
        ]);
    }
}
