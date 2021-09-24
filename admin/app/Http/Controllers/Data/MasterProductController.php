<?php

namespace App\Http\Controllers\Data;

use App\Models\TypeProduct;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\Master\MasterProduct;

class MasterProductController extends Controller
{

    function index()
    {
        $typeProduct = TypeProduct::all();
        $data = MasterProduct::all();
        return view('master_data.barang.master_barang.master_index', [
            'data' => $data,
            'typeProduct' => $typeProduct,
            'no' => 1,
            'title' => 'Master Data Barang',
            'menuOpen' => 'menu-open',
            'menuActive' => 'active',
            'barangOpen' => 'menu-open',
            'barangActive' => 'active',
            'masterActive' => 'active',
        ]);
    }
    public function store(Request $request)
    {
        $attr = $request->validate([
            'code_product' => 'required',
            'name_product' => 'required',
            'type_product' => 'required',
        ]);
        $attr['status_product'] = "Dalam Pesanan";
        $store = MasterProduct::insert($attr);
        if ($store) {
            return redirect()->back()->with('Ok', 'Berhasil Menyimpan');
        } else {
            return redirect()->back()->with('Fail', 'Gagal Menyimpan');
        }
    }
    public function destroy()
    {
        $id = request('id');
        $delete = MasterProduct::where('code_product', $id)->delete();
        if ($delete) {
            return redirect()->route('master.data')->with('Ok', 'Data Terhapus');
        } else {
            return redirect()->route('master.data')->with('Fail', 'Data Tidak Terhapus');
        }
    }
}
