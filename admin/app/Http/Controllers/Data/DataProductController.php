<?php

namespace App\Http\Controllers\Data;

use App\Models\TypeProduct;
use App\Models\StockProduct;
use Illuminate\Http\Request;
use App\Models\HistoryProduct;
use App\Http\Controllers\Controller;
use App\Models\Master\MasterProduct;
use PhpOffice\PhpSpreadsheet\Calculation\MathTrig\Sum;

class DataProductController extends Controller
{
    public function index()
    {
        $typeProduct = TypeProduct::all();
        $data = HistoryProduct::groupBy('code_product')
            ->selectRaw(' sum(qty_product) as sum, code_product')
            ->pluck('sum', 'code_product');
        // dd($data);
        foreach ($data as $key => $value) {
            StockProduct::where('code_product', $key)->update([
                'qty_product' => $value
            ]);
            $cek = StockProduct::where('code_product', $key)->get();
            if ($cek == '[]') {
                StockProduct::where('code_product', $key)->delete();
            }
        }
        $data = StockProduct::all();
        return view('master_data.barang.data_barang.data_index', [
            'data' => $data,
            'typeProduct' => $typeProduct,
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
