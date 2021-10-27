<?php

namespace App\Http\Controllers\Data;

use App\Models\PoProduct;
use App\Models\PibProduct;
use App\Models\TypeProduct;
use Illuminate\Http\Request;
use App\Models\NcrVendorProduct;
use App\Models\NcrCustomerProduct;
use Illuminate\Support\Facades\DB;
use App\Http\Controllers\Controller;
use App\Models\Master\MasterProduct;

class MasterProductController extends Controller
{

    function index()
    {
        app('App\Http\Controllers\CalculateController')->calculating();
        $data = DB::table('master_products')->get();
        // dd($data);
        $typeProduct = TypeProduct::all();
        return view('master_data.barang.master_index', [
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
        $attr['status_product'] = "Kosong";
        $attr['qty_product'] = 0;
        $store = MasterProduct::insert($attr);
        if ($store) {
            return redirect()->back()->with('Ok', 'Berhasil Menyimpan');
        } else {
            return redirect()->back()->with('Fail', 'Gagal Menyimpan');
        }
    }
    public function update(Request $request)
    {
        $update = MasterProduct::find($request->id)->update([
            'code_product' => $request->code_product,
            'name_product' => $request->name_product,
            'type_product' => $request->type_product,
        ]);
        if ($update) {
            return redirect()->back()->with('Ok', 'Berhasil Menyimpan');
        } else {
            return redirect()->back()->with('Fail', 'Gagal Menyimpan');
        }
    }
    public function destroy()
    {
        $id = request('id');
        $cekPo = PoProduct::where('code_product', $id)->first();
        $cekPib = PibProduct::where('code_product', $id)->first();
        $cekVendor = NcrVendorProduct::where('code_product', $id)->first();
        $cekCustomer = NcrCustomerProduct::where('code_product', $id)->first();
        if ($cekPo != null) {
            return redirect()->route('master.data')->with('Fail', 'Data Dipakai PO');
        }
        if ($cekPib != null) {
            return redirect()->route('master.data')->with('Fail', 'Data Dipakai PIB');
        }
        if ($cekVendor != null) {
            return redirect()->route('master.data')->with('Fail', 'Data Dipakai NCR Vendor');
        }
        if ($cekCustomer != null) {
            return redirect()->route('master.data')->with('Fail', 'Data Dipakai NCR Customer');
        }
        DB::beginTransaction();
        try {
            MasterProduct::where('code_product', $id)->delete();
            DB::commit();
            return redirect()->route('master.data')->with('Ok', 'Data Terhapus');
        } catch (\Throwable $th) {
            DB::rollback();
            return redirect()->route('master.data')->with('Fail', 'Data Tidak Terhapus');
        }
    }
}
