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
            ->join('master_products', 'master_products.code_product', '=', 'history_products.code_product')
            ->orderBy('date_product', 'desc')->get();
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
