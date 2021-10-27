<?php

namespace App\Http\Controllers\Data;

use App\Http\Controllers\Controller;
use App\Models\Master\MasterProduct;
use Illuminate\Http\Request;

class MutationProductController extends Controller
{
    public function index()
    {
        $data = MasterProduct::all();
        return view('master_data.barang.mutasi_index', [
            'data' => $data,
            'no' => 1,
            'title' => 'Data Barang Mutasi',
            'menuOpen' => 'menu-open',
            'menuActive' => 'active',
            'barangOpen' => 'menu-open',
            'barangActive' => 'active',
            'mutasiActive' => 'active',
        ]);
    }
}
