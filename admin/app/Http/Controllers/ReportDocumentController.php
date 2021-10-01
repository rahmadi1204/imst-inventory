<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\HistoryProduct;
use App\Models\ReportDocument;
use Illuminate\Support\Facades\DB;

class ReportDocumentController extends Controller
{
    public function index()
    {
        $masuk = DB::table('history_products')
            ->join('pib_products', 'pib_products.code_pib', '=', 'history_products.code_pib')->get();
        $count = count($masuk);
        for ($i = 0; $i < $count; $i++) {
            $masuk[$i]->type_in = 1;
            $masuk[$i]->date_in = $masuk[$i]->date_product;
            $masuk[$i]->no_in = $i + 1;
        }
        // dd($masuk);
        $ncrv = DB::table('history_products')
            ->join('ncr_vendor_products', 'ncr_vendor_products.code_ncrv', '=', 'history_products.code_ncrv')->get();
        $count = count($ncrv);
        for ($i = 0; $i < $count; $i++) {
            $ncrv[$i]->type_out = 1;
            $ncrv[$i]->date_out = $ncrv[$i]->date_product;
            $ncrv[$i]->no_out = $i + 1;
        }
        // dd($ncrv);
        // $ncrc = DB::table('history_products')
        //     ->join('ncr_customers', 'ncr_customers.code_ncrc', '=', 'history_products.code_ncrv')->get();
        // dd($ncrv);
        $data = ReportDocument::all();
        return view('report.laporan_barang_perdokumen', [
            'masuk' => $masuk,
            'keluar' => $ncrv,
            'data' => $data,
            'no' => 1,
            'reportOpen' => 'menu-open',
            'reportActive' => 'active',
            'reportDocument' => 'active',
        ]);
    }
}
