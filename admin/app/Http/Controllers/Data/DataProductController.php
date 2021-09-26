<?php

namespace App\Http\Controllers\Data;

use App\Models\TypeProduct;
use App\Models\StockProduct;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class DataProductController extends Controller
{
    public function index()
    {
        $typeProduct = TypeProduct::all();
        $data = StockProduct::all();
        return view('master_data.barang.data_barang.data_index', [
            'data' => $data,
            'typeProduct' => $typeProduct,
            'no' => 1,
            'title' => 'Master Data Barang',
            'menuOpen' => 'menu-open',
            'menuActive' => 'active',
            'barangOpen' => 'menu-open',
            'barangActive' => 'active',
            'dataActive' => 'active',
        ]);
    }
}
