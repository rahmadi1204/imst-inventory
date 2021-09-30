<?php

namespace App\Http\Controllers;

use App\Models\ReportDocument;
use Illuminate\Http\Request;

class ReportDocumentController extends Controller
{
    public function index()
    {
        $data = ReportDocument::all();
        return view('report.laporan_barang_perdokumen', [
            'data' => $data,
            'no' => 1,
            'reportOpen' => 'menu-open',
            'reportActive' => 'active',
            'reportDocument' => 'active',
        ]);
    }
}
