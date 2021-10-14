<?php

namespace App\Http\Controllers;


use App\Models\HistoryProduct;
use Illuminate\Support\Facades\DB;
use Barryvdh\DomPDF\Facade as PDF;

class ReportDocumentController extends Controller
{
    public function index()
    {
        $masuk = DB::table('history_products')
            ->join('master_products', function ($join) {
                $join->on('master_products.id', '=', 'history_products.product_id')->where('type_history', '>', 0);
            })
            ->get([
                'master_products.code_product',
                'master_products.type_product',
                'master_products.name_product',
                'history_products.type_history',
                'history_products.date_product',
                'history_products.qty_product',
                'history_products.unit_product',
                'history_products.product_pabean',
            ]);
        $count = count($masuk);
        for ($i = 0; $i < $count; $i++) {
            $masuk[$i]->date_in = $masuk[$i]->date_product;
            $masuk[$i]->no_in = $i + 1;
        }
        // dd($masuk);
        $keluar = DB::table('history_products')
            ->join('master_products', function ($join) {
                $join->on('master_products.id', '=', 'history_products.product_id')->where('type_history', '<', 1);
            })
            ->get([
                'master_products.code_product',
                'master_products.type_product',
                'master_products.name_product',
                'history_products.type_history',
                'history_products.date_product',
                'history_products.qty_product',
                'history_products.unit_product',
                'history_products.product_pabean',
            ]);
        $count = count($keluar);
        for ($j = 0; $j < $count; $j++) {
            $keluar[$j]->date_out = $keluar[$j]->date_product;
            $keluar[$j]->no_out = $j + 1;
        }
        $sumMasuk  = DB::table('history_products')
            ->selectRaw('history_products.product_id, sum(qty_product) as qty_product, sum(product_pabean) as product_pabean')
            ->groupBy('history_products.product_id')
            ->where('type_history', '>', 0)
            ->get();
        // ->pluck('qty_product', 'code_product');
        // dd($sumMasuk);
        foreach ($sumMasuk as $value) {
            $getUnit = HistoryProduct::where('product_id', $value->product_id)->value('unit_product');
            // dd($getUnit);
            DB::table('stock_products')->upsert(
                [
                    'type_stock' => 1,
                    'product_id' => $value->product_id,
                    'code_stock' => "1" . $value->product_id,
                    'qty_product' => $value->qty_product,
                    'unit_product' => $getUnit,
                    'product_pabean' => $value->product_pabean,
                    'created_at' => now(),
                    'updated_at' => now(),
                ],
                ['code_stock'],
                ['qty_product', 'unit_product']
            );
        }
        $dataMasuk =   DB::table('stock_products')->where('type_stock', '=', 1)
            ->join('master_products', 'master_products.id', '=', 'stock_products.product_id')
            ->get([
                'master_products.id',
                'master_products.code_product',
                'master_products.type_product',
                'master_products.name_product',
                'stock_products.qty_product',
                'stock_products.created_at',
                'stock_products.product_pabean',
                'stock_products.unit_product',

            ]);
        // dd($dataMasuk);
        foreach ($dataMasuk as  $value) {
            DB::table('report_documents')->upsert(
                [
                    'product_id' => $value->id,
                    'qty_product_in' => $value->qty_product,
                    'unit_product_in' => $getUnit,
                    'product_pabean_in' => $value->product_pabean,
                    'created_at' => now(),
                    'updated_at' => now(),
                ],
                ['product_id'],
                ['qty_product_in', 'unit_product_in', 'updated_at']
            );
        }
        // dd($dataMasuk);
        $sumKeluar  = DB::table('history_products')
            ->selectRaw('history_products.product_id, sum(qty_product) as qty_product, sum(product_pabean) as product_pabean')
            ->groupBy('product_id')
            ->where('type_history', '<', 0)
            ->get();
        // ->pluck('qty_product', 'code_product');
        // dd($sumKeluar);
        foreach ($sumKeluar as $value) {
            $getUnit = HistoryProduct::where('product_id', $value->product_id)->value('unit_product');
            // dd($getUnit);
            DB::table('stock_products')->upsert(
                [
                    'type_stock' => 0,
                    'product_id' => $value->product_id,
                    'code_stock' => "0" . $value->product_id,
                    'qty_product' => $value->qty_product,
                    'unit_product' => $getUnit,
                    'product_pabean' => $value->product_pabean,
                    'created_at' => now(),
                    'updated_at' => now(),
                ],
                ['code_stock'],
                ['qty_product', 'unit_product']
            );
        }
        $dataKeluar =   DB::table('stock_products')->where('type_stock', '=', 0)
            ->join('master_products', 'master_products.id', '=', 'stock_products.product_id')
            ->get([
                'master_products.id',
                'master_products.code_product',
                'master_products.type_product',
                'master_products.name_product',
                'stock_products.qty_product',
                'stock_products.created_at',
                'stock_products.product_pabean',
                'stock_products.unit_product',
            ]);
        // dd($dataKeluar);
        foreach ($dataKeluar as  $value) {
            DB::table('report_documents')
                ->where('product_id', '=', $value->id)->update(
                    [
                        'qty_product_out' => $value->qty_product,
                        'unit_product_out' => $getUnit,
                        'product_pabean_out' => $value->product_pabean,
                        'updated_at' => now(),
                    ]
                );
        }
        $data = DB::table('report_documents')
            ->join('master_products', 'master_products.id', '=', 'report_documents.product_id')
            ->get([
                'master_products.code_product',
                'master_products.type_product',
                'master_products.name_product',
                'report_documents.qty_product_in',
                'report_documents.qty_product_out',
                'report_documents.unit_product_in',
                'report_documents.unit_product_out',
                'report_documents.product_pabean_in',
                'report_documents.product_pabean_out',
                'report_documents.updated_at',
            ]);
        // dd($data);

        return view('report.laporan_barang_perdokumen', [
            'masuk' => $masuk,
            'keluar' => $keluar,
            'dataMasuk' => $dataMasuk,
            'dataKeluar' => $dataKeluar,
            'data' => $data,
            'title' => "Laporan Barang Perdokumen",
            'noMasuk' => 1,
            'noKeluar' => 1,
            'reportOpen' => 'menu-open',
            'reportActive' => 'active',
            'reportDocument' => 'active',
        ]);
    }

    public function docFilter()
    {

        $filter = request('filter');
        $date =  str_replace(' ', '', $filter);
        $date1 = mb_substr($date, 0, 10);
        $date2 = mb_substr($date, 11, 10);
        $dataMasuk = null;
        $dataKeluar = null;
        $masuk =  $this->masuk($date1, $date2);
        $keluar = $this->keluar($date1, $date2);
        $range = "Tanggal " . date('d F Y', strtotime($date1)) . " Sampai " . date('d F Y', strtotime($date2));
        // dd($masuk);
        $sumMasuk  = DB::table('history_products')
            ->whereBetween('history_products.date_product', [$date1, $date2])
            ->selectRaw('history_products.product_id, sum(qty_product) as qty_product, sum(product_pabean) as product_pabean')
            ->groupBy('history_products.product_id')
            ->where('type_history', '>', 0)
            ->get();

        if ($sumMasuk != "[]") {
            $dataMasuk =  $this->dataMasuk($sumMasuk);
        }
        $sumKeluar  = DB::table('history_products')
            ->whereBetween('history_products.date_product', [$date1, $date2])
            ->selectRaw('history_products.product_id, sum(qty_product) as qty_product, sum(product_pabean) as product_pabean')
            ->groupBy('product_id')
            ->where('type_history', '<', 0)
            ->get();

        if ($sumKeluar != "[]") {
            $dataKeluar =  $this->dataKeluar($sumKeluar);
        }
        if ($sumMasuk && $sumKeluar == "[]") {
            DB::table('report_documents')
                ->update(
                    [
                        'qty_product_in' => 0,
                        'qty_product_out' => 0,
                        'unit_product_out' => null,
                        'product_pabean_in' => 0,
                        'product_pabean_out' => 0,
                        'updated_at' => now(),
                    ]
                );
        }
        $data = DB::table('report_documents')
            ->join('master_products', 'master_products.id', '=', 'report_documents.product_id')
            ->get([
                'master_products.code_product',
                'master_products.type_product',
                'master_products.name_product',
                'report_documents.qty_product_in',
                'report_documents.qty_product_out',
                'report_documents.unit_product_in',
                'report_documents.unit_product_out',
                'report_documents.product_pabean_in',
                'report_documents.product_pabean_out',
                'report_documents.updated_at',
            ]);

        // dd($data);
        return view('report.laporan_barang_perdokumen', [
            'masuk' => $masuk,
            'keluar' => $keluar,
            'dataMasuk' => $dataMasuk,
            'dataKeluar' => $dataKeluar,
            'data' => $data,
            'range' => $range,
            'title' => "Laporan Barang Perdokumen",
            'noMasuk' => 1,
            'noKeluar' => 1,
            'reportOpen' => 'menu-open',
            'reportActive' => 'active',
            'reportDocument' => 'active',
        ]);
    }
    public function docPeriode()
    {
        $periode = request('periode');
        if ($periode == 1) {
            $date1 = date('Y') . "-01-01";
            $date2 = date('Y') . "-04-30";
            $titlePeriode =  "Bulan Januari Sampai April";
        } elseif ($periode == 12) {
            $date1 = date('Y') . "-05-01";
            $date2 = date('Y') . "-08-31";
            $titlePeriode =  "Bulan Mei Sampai Agustus";
        } else {
            $date1 = date('Y') . "-09-01";
            $date2 = date('Y') . "-12-31";
            $titlePeriode =  "Bulan September Sampai Desember";
        }
        $dataMasuk = null;
        $dataKeluar = null;
        $masuk =  $this->masuk($date1, $date2);
        $keluar = $this->keluar($date1, $date2);
        // dd($masuk);
        $sumMasuk  = DB::table('history_products')
            ->whereBetween('history_products.date_product', [$date1, $date2])
            ->selectRaw('history_products.product_id, sum(qty_product) as qty_product, sum(product_pabean) as product_pabean')
            ->groupBy('history_products.product_id')
            ->where('type_history', '>', 0)
            ->get();

        if ($sumMasuk != "[]") {
            $dataMasuk =  $this->dataMasuk($sumMasuk);
        }
        $sumKeluar  = DB::table('history_products')
            ->whereBetween('history_products.date_product', [$date1, $date2])
            ->selectRaw('history_products.product_id, sum(qty_product) as qty_product, sum(product_pabean) as product_pabean')
            ->groupBy('product_id')
            ->where('type_history', '<', 0)
            ->get();

        if ($sumKeluar != "[]") {
            $dataKeluar =  $this->dataKeluar($sumKeluar);
        }
        if ($sumMasuk && $sumKeluar == "[]") {
            DB::table('report_documents')
                ->update(
                    [
                        'qty_product_in' => 0,
                        'qty_product_out' => 0,
                        'unit_product_out' => null,
                        'product_pabean_in' => 0,
                        'product_pabean_out' => 0,
                        'updated_at' => now(),
                    ]
                );
        }
        $data = DB::table('report_documents')
            ->join('master_products', 'master_products.id', '=', 'report_documents.product_id')
            ->get([
                'master_products.code_product',
                'master_products.type_product',
                'master_products.name_product',
                'report_documents.qty_product_in',
                'report_documents.qty_product_out',
                'report_documents.unit_product_in',
                'report_documents.unit_product_out',
                'report_documents.product_pabean_in',
                'report_documents.product_pabean_out',
                'report_documents.updated_at',
            ]);

        // dd($data);
        return view('report.laporan_barang_perdokumen', [
            'masuk' => $masuk,
            'keluar' => $keluar,
            'dataMasuk' => $dataMasuk,
            'dataKeluar' => $dataKeluar,
            'data' => $data,
            'periode' => $periode,
            'titlePeriode' => $titlePeriode,
            'title' => "Laporan Barang Perdokumen",
            'noMasuk' => 1,
            'noKeluar' => 1,
            'reportOpen' => 'menu-open',
            'reportActive' => 'active',
            'reportDocument' => 'active',
        ]);
    }
    public function masuk($date1, $date2)
    {
        $masuk = DB::table('history_products')
            ->join('master_products', function ($join) {
                $join->on('master_products.id', '=', 'history_products.product_id')->where('type_history', '>', 0);
            })
            ->whereBetween('history_products.date_product', [$date1, $date2])
            ->get([
                'master_products.code_product',
                'master_products.type_product',
                'master_products.name_product',
                'history_products.type_history',
                'history_products.date_product',
                'history_products.qty_product',
                'history_products.unit_product',
                'history_products.product_pabean',
            ]);
        $count = count($masuk);
        for ($i = 0; $i < $count; $i++) {
            $masuk[$i]->date_in = $masuk[$i]->date_product;
            $masuk[$i]->no_in = $i + 1;
        }
        return $masuk;
    }
    public function keluar($date1, $date2)
    {
        $keluar = DB::table('history_products')
            ->join('master_products', function ($join) {
                $join->on('master_products.id', '=', 'history_products.product_id')->where('type_history', '<', 1);
            })
            ->whereBetween('history_products.date_product', [$date1, $date2])
            ->get([
                'master_products.code_product',
                'master_products.type_product',
                'master_products.name_product',
                'history_products.type_history',
                'history_products.date_product',
                'history_products.qty_product',
                'history_products.unit_product',
                'history_products.product_pabean',
            ]);
        $count = count($keluar);
        for ($j = 0; $j < $count; $j++) {
            $keluar[$j]->date_out = $keluar[$j]->date_product;
            $keluar[$j]->no_out = $j + 1;
        }
        return $keluar;
    }
    public function dataMasuk($sumMasuk)
    {
        foreach ($sumMasuk as $value) {
            $getUnit = HistoryProduct::where('product_id', $value->product_id)->value('unit_product');
            // dd($getUnit);
            DB::table('stock_products')->upsert(
                [
                    'type_stock' => 1,
                    'product_id' => $value->product_id,
                    'code_stock' => "1" . $value->product_id,
                    'qty_product' => $value->qty_product,
                    'unit_product' => $getUnit,
                    'product_pabean' => $value->product_pabean,
                    'created_at' => now(),
                    'updated_at' => now(),
                ],
                ['code_stock'],
                ['qty_product', 'unit_product']
            );
        }
        $dataMasuk =   DB::table('stock_products')->where('type_stock', '=', 1)
            ->join('master_products', 'master_products.id', '=', 'stock_products.product_id')

            ->get([
                'master_products.id',
                'master_products.code_product',
                'master_products.type_product',
                'master_products.name_product',
                'stock_products.qty_product',
                'stock_products.created_at',
                'stock_products.product_pabean',
                'stock_products.unit_product',

            ]);
        // dd($dataMasuk);
        foreach ($dataMasuk as  $value) {
            DB::table('report_documents')->upsert(
                [
                    'product_id' => $value->id,
                    'qty_product_in' => $value->qty_product,
                    'unit_product_in' => $getUnit,
                    'product_pabean_in' => $value->product_pabean,
                    'created_at' => now(),
                    'updated_at' => now(),
                ],
                ['product_id'],
                ['qty_product_in', 'unit_product_in', 'updated_at']
            );
        }
        return $dataMasuk;
    }
    public function dataKeluar($sumKeluar)
    {
        foreach ($sumKeluar as $value) {
            $getUnit = HistoryProduct::where('product_id', $value->product_id)->value('unit_product');
            // dd($getUnit);
            DB::table('stock_products')->upsert(
                [
                    'type_stock' => 0,
                    'product_id' => $value->product_id,
                    'code_stock' => "0" . $value->product_id,
                    'qty_product' => $value->qty_product,
                    'unit_product' => $getUnit,
                    'product_pabean' => $value->product_pabean,
                    'created_at' => now(),
                    'updated_at' => now(),
                ],
                ['code_stock'],
                ['qty_product', 'unit_product']
            );
        }
        $dataKeluar =   DB::table('stock_products')->where('type_stock', '=', 0)
            ->join('master_products', 'master_products.id', '=', 'stock_products.product_id')

            ->get([
                'master_products.id',
                'master_products.code_product',
                'master_products.type_product',
                'master_products.name_product',
                'stock_products.qty_product',
                'stock_products.created_at',
                'stock_products.product_pabean',
                'stock_products.unit_product',
            ]);
        // dd($dataKeluar);
        foreach ($dataKeluar as  $value) {
            DB::table('report_documents')
                ->where('product_id', '=', $value->id)->update(
                    [
                        'qty_product_out' => $value->qty_product,
                        'unit_product_out' => $getUnit,
                        'product_pabean_out' => $value->product_pabean,
                        'updated_at' => now(),
                    ]
                );
        }
        return $dataKeluar;
    }
}
