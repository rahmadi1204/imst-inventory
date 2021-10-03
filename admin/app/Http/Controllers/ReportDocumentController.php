<?php

namespace App\Http\Controllers;

use App\Models\HistoryProduct;
use Illuminate\Support\Facades\DB;

class ReportDocumentController extends Controller
{
    public function index()
    {
        $masuk = DB::table('history_products')
            ->join('master_products', function ($join) {
                $join->on('master_products.code_product', '=', 'history_products.code_product')->where('type_history', '=', 1);
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
                $join->on('master_products.code_product', '=', 'history_products.code_product')->where('type_history', '<', 1);
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
            ->selectRaw('history_products.code_product, sum(qty_product) as qty_product, sum(product_pabean) as product_pabean')
            ->groupBy('code_product')
            ->where('type_history', '=', 1)
            ->get();
        // ->pluck('qty_product', 'code_product');
        // dd($sumMasuk);
        foreach ($sumMasuk as $value) {
            $getUnit = HistoryProduct::where('code_product', $value->code_product)->value('unit_product');
            // dd($getUnit);
            DB::table('stock_products')->upsert(
                [
                    'type_stock' => 1,
                    'code_product' => $value->code_product,
                    'code_stock' => "1" . $value->code_product,
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
            ->join('master_products', 'master_products.code_product', '=', 'stock_products.code_product')
            ->get([
                'master_products.code_product',
                'master_products.type_product',
                'master_products.name_product',
                'stock_products.qty_product',
                'stock_products.created_at',
                'stock_products.product_pabean',
                'stock_products.unit_product',

            ]);

        foreach ($dataMasuk as  $value) {
            DB::table('report_documents')->upsert(
                [
                    'code_product' => $value->code_product,
                    'qty_product_in' => $value->qty_product,
                    'unit_product_in' => $getUnit,
                    'product_pabean_in' => $value->product_pabean,
                    'created_at' => now(),
                    'updated_at' => now(),
                ],
                ['code_product'],
                ['qty_product_in', 'unit_product_in', 'updated_at']
            );
        }
        // dd($dataMasuk);
        $sumKeluar  = DB::table('history_products')
            ->selectRaw('history_products.code_product, sum(qty_product) as qty_product, sum(product_pabean) as product_pabean')
            ->groupBy('code_product')
            ->where('type_history', '<', 1)
            ->get();
        // ->pluck('qty_product', 'code_product');
        // dd($sumKeluar);
        foreach ($sumKeluar as $value) {
            $getUnit = HistoryProduct::where('code_product', $value->code_product)->value('unit_product');
            // dd($getUnit);
            DB::table('stock_products')->upsert(
                [
                    'type_stock' => 0,
                    'code_product' => $value->code_product,
                    'code_stock' => "0" . $value->code_product,
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
            ->join('master_products', 'master_products.code_product', '=', 'stock_products.code_product')
            ->get([
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
                ->where('code_product', '=', $value->code_product)->update(
                    [
                        'qty_product_out' => $value->qty_product,
                        'unit_product_out' => $getUnit,
                        'product_pabean_out' => $value->product_pabean,
                        'updated_at' => now(),
                    ]
                );
        }
        $data = DB::table('report_documents')
            ->join('master_products', 'master_products.code_product', '=', 'report_documents.code_product')
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
            'noMasuk' => 1,
            'noKeluar' => 1,
            'reportOpen' => 'menu-open',
            'reportActive' => 'active',
            'reportDocument' => 'active',
        ]);
    }
}
