<?php

namespace App\Http\Controllers\Data;

use App\Models\TypeProduct;
use Illuminate\Http\Request;
use App\Models\HistoryProduct;
use Illuminate\Support\Facades\DB;
use App\Http\Controllers\Controller;

class HistoryProductController extends Controller
{
    function index()
    {
        $typeProduct = TypeProduct::all();
        $data = DB::table('history_products')
            ->LeftJoin('master_products', 'master_products.code_product', '=', 'history_products.code_product')
            ->orderBy('date_product', 'desc')->get([
                'master_products.code_product',
                'master_products.type_product',
                'master_products.name_product',
                'history_products.date_product',
                'history_products.type_history',
                'history_products.from',
                'history_products.to',
                'history_products.unit_product',
                'history_products.product_pabean',
                'history_products.qty_product'
            ]);
        // dd($data);
        return view('master_data.barang.history_barang.history_index', [
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
