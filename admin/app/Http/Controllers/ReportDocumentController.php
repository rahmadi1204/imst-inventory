<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class ReportDocumentController extends Controller
{
    public function index()
    {
        $data = null;
        return view('report.laporan_barang_perdokumen', [
            'data' => $data,
            'reportOpen' => 'menu-open',
            'reportActive' => 'active',
            'reportDocument' => 'active',
        ]);
    }
}
