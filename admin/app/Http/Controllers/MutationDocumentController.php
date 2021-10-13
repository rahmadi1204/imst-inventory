<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class MutationDocumentController extends Controller
{
    public function index()
    {
        return view('report.laporan_barang_mutasi', [
            'title' => "Laporan Mutasi Barang",
            'reportOpen' => "menu-open",
            'reportActive' => "active",
            'reportMutasi' => "active",
        ]);
    }
}
