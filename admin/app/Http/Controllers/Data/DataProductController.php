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
        $master = MasterProduct::all();
        foreach ($master as $item) {
            $stok = StockProduct::updateOrCreate(
                [
                    'code_product' => $item->code_product,
                    'name_product' => $item->name_product,
                    'type_product' => $item->type_product
                ],
                ['qty_product' => 0]
            );
        }
        // dd($master);
        $data = HistoryProduct::groupBy('code_product')
            ->selectRaw(' sum(qty_product) as sum, code_product')
            ->pluck('sum', 'code_product');
        // dd($data);
        foreach ($data as $key => $value) {
            StockProduct::where('code_product', $key)->update([
                'qty_product' => $value
            ]);
        }
        $data = StockProduct::all();
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
