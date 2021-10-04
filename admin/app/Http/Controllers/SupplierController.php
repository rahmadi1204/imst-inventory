<?php

namespace App\Http\Controllers;

use App\Models\Po;
use App\Models\Pib;
use App\Models\Supplier;
use App\Models\NcrVendor;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class SupplierController extends Controller

{
    public function index()
    {
        $data = Supplier::all();
        // dd($data);
        return view('master_data.supplier.supplier_index', [
            'data' => $data,
            'title' => 'Data supplier',
            'menuOpen' => "menu-open",
            'menuActive' => "active",
            'supplierActive' => "active",
        ]);
    }

    public function create()
    {
        $date = date('Y-m-d');
        $data = Supplier::where('date', $date)->get();
        // dd($data);
        return view('master_data.supplier.supplier_create', [
            'data' => $data,
            'title' => 'Data supplier',
            'menuOpen' => "menu-open",
            'menuActive' => "active",
            'supplierActive' => "active",
        ]);
    }

    public function store(Request $request)
    {
        // dd($request);
        $attr = $request->validate([
            'code_supplier' => 'required',
            'name_supplier' => 'required',
            'address_supplier' => 'required',
            'date' => 'required',
        ], [
            'code_supplier.required' => 'Kode supplier Harus Diisi',
            'name_supplier.required' => 'Nama supplier Harus Diisi',
            'address_supplier.required' => 'Alamat supplier Harus Diisi',
            'date.required' => 'Tanggal Harus Diisi',
        ]);
        $insert = Supplier::insert($attr);
        if ($insert) {
            return redirect()->back()->with('Ok', 'Data Berhasil Disimpan');
        } else {
            return redirect()->back()->with('Fail', 'Data Gagal Disimpan');
        }
    }
    public function edit($id)
    {
        // dd($id);
        $supplier = Supplier::where('code_supplier', $id)->first();
        // dd($raw);
        return view('master_data.supplier.supplier_edit', [
            'supplier' => $supplier,
            'title' => 'Data supplier',
            'menuOpen' => "menu-open",
            'menuActive' => "active",
            'supplierActive' => "active",
        ]);
    }
    public function update(Request $request, $id)
    {
        // dd($request);
        $attr = $request->validate([
            'code_supplier' => 'required',
            'name_supplier' => 'required',
            'address_supplier' => 'required',
            'date' => 'required',
        ], [
            'code_supplier.required' => 'Kode supplier Harus Diisi',
            'name_supplier.required' => 'Nama supplier Harus Diisi',
            'address_supplier.required' => 'Alamat supplier Harus Diisi',
            'date.required' => 'Tanggal Harus Diisi',
        ]);
        $update = Supplier::where('code_supplier', $id)->update($attr);
        if ($update) {
            return redirect()->route('supplier')->with('Ok', 'Data Berhasil Disimpan');
        } else {
            return redirect()->back()->with('Fail', 'Data Gagal Disimpan');
        }
    }

    public function destroy(Request $request)
    {
        $id = $request->id;
        $cekPo = Po::where('code_supplier', $id)->first();
        $cekPib = Pib::where('code_supplier', $id)->first();
        $cekVendor = NcrVendor::where('code_supplier', $id)->first();
        if ($cekPo != null) {
            return redirect()->route('supplier')->with('Fail', 'Data Dipakai PO');
        }
        if ($cekPib != null) {
            return redirect()->route('supplier')->with('Fail', 'Data Dipakai PIB');
        }
        if ($cekVendor != null) {
            return redirect()->route('supplier')->with('Fail', 'Data Dipakai NCR Vendor');
        }
        DB::beginTransaction();
        try {
            Supplier::where('code_supplier', $id)->delete();
            DB::commit();
            return redirect()->route('supplier')->with('Ok', 'Data Terhapus');
        } catch (\Throwable $th) {
            DB::rollback();
            return redirect()->route('supplier')->with('Fail', 'Data Tidak Terhapus');
        }
    }
}
