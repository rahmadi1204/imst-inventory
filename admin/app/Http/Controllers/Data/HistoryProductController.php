<?php

namespace App\Http\Controllers\Data;

use App\Models\TypeProduct;
use Illuminate\Http\Request;
use App\Models\HistoryProduct;
use App\Http\Controllers\Controller;

class HistoryProductController extends Controller
{
    function index()
    {
        $typeProduct = TypeProduct::all();
        $data = HistoryProduct::all();
        return view('master_data.barang.history_barang.history_index', [
            'data' => $data,
            'typeProduct' => $typeProduct,
            'no' => 1,
            'title' => 'Master Data Barang',
            'menuOpen' => 'menu-open',
            'menuActive' => 'active',
            'barangOpen' => 'menu-open',
            'barangActive' => 'active',
            'historyActive' => 'active',
        ]);
    }
}
