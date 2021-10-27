<?php

namespace App\Http\Controllers;

use App\Models\StockProduct;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class CalculateController extends Controller
{
    public function calculating()
    {
        DB::table('master_products')->update([
            'qty_product' => 0,
            'status_product' => "KOSONG",
        ]);
        $cek = DB::table('history_products')
            ->selectRaw('history_products.product_id, sum(qty_product) as qty_product')
            ->groupBy('product_id')
            ->pluck('qty_product', 'product_id');
        foreach ($cek as $key => $value) {
            DB::table('master_products')->where('id', '=', $key)
                ->update([
                    'qty_product' => $value,
                    'status_product' => "OK",
                ]);
        }
    }
    public function sumMasuk($value)
    {
        DB::table('stock_products')->upsert(
            [
                'type_stock' => 1,
                'product_id' => $value->product_id,
                'code_stock' => "1" . $value->product_id,
                'qty_product' => $value->qty_product,
                'unit_product' =>  $value->unit,
                'product_pabean' => $value->product_pabean,
                'created_at' => now(),
                'updated_at' => now(),
            ],
            ['code_stock'],
            ['qty_product', 'unit_product']
        );
    }
    public function reportMasuk($value)
    {
        DB::table('report_documents')->update([
            'qty_product_in' => 0,
            'product_pabean_in' => 0,
        ]);
        DB::table('report_documents')->upsert(
            [
                'product_id' => $value->id,
                'qty_product_in' => $value->qty_product,
                'unit_product_in' =>  $value->unit,
                'product_pabean_in' => $value->product_pabean,
                'created_at' => now(),
                'updated_at' => now(),
            ],
            ['product_id'],
            ['qty_product_in', 'unit_product_in', 'updated_at']
        );
    }
    public function sumKeluar($value)
    {
        DB::table('stock_products')->upsert(
            [
                'type_stock' => 0,
                'product_id' => $value->product_id,
                'code_stock' => "0" . $value->product_id,
                'qty_product' => $value->qty_product,
                'unit_product' =>  $value->unit,
                'product_pabean' => $value->product_pabean,
                'created_at' => now(),
                'updated_at' => now(),
            ],
            ['code_stock'],
            ['qty_product', 'unit_product']
        );
    }
    public function reportKeluar($value)
    {
        DB::table('report_documents')->update([
            'qty_product_out' => 0,
            'product_pabean_out' => 0,
        ]);
        DB::table('report_documents')->upsert(
            [
                'product_id' => $value->id,
                'qty_product_out' => $value->qty_product,
                'unit_product_out' =>  $value->unit,
                'product_pabean_out' => $value->product_pabean,
                'created_at' => now(),
                'updated_at' => now(),
            ],
            ['product_id'],
            ['qty_product_out', 'unit_product_out', 'updated_at']
        );
    }
}
