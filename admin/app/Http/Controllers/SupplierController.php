<?php

namespace App\Http\Controllers;

use App\Models\Supplier;
use Illuminate\Http\Request;

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
        $delete = Supplier::where('code_supplier', $id)->delete();
        if ($delete) {
            return redirect()->back()->with('Ok', 'Data Berhasil Dihapus');
        } else {
            return redirect()->back()->with('Fail', 'Data Gagal Dihapus');
        }
    }
}
