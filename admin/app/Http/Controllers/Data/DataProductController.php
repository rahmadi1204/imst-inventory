<?php

namespace App\Http\Controllers\Data;

use Illuminate\Support\Facades\DB;
use App\Http\Controllers\Controller;


class DataProductController extends Controller
{
    public function index()
    {
        app('App\Http\Controllers\CalculateController')->calculating();
        $data = DB::table('master_products')->get();
        // dd($data);
        return view('master_data.barang.data_index', [
            'data' => $data,
            'no' => 1,
            'title' => 'Stok Data Barang',
            'menuOpen' => 'menu-open',
            'menuActive' => 'active',
            'barangOpen' => 'menu-open',
            'barangActive' => 'active',
            'dataActive' => 'active',
        ]);
    }
}
