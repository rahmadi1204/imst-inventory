<?php

namespace App\Http\Controllers\Data;

use App\Models\TypeProduct;
use App\Models\StockProduct;
use Illuminate\Http\Request;
use App\Models\HistoryProduct;
use Illuminate\Support\Facades\DB;
use App\Http\Controllers\Controller;
use App\Models\Master\MasterProduct;
use PhpOffice\PhpSpreadsheet\Calculation\MathTrig\Sum;

class DataProductController extends Controller
{
    public function index()
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
        $data = DB::table('master_products')->get();
        // dd($data);
        return view('master_data.barang.data_barang.data_index', [
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
