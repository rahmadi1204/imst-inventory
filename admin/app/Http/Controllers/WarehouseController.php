<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Models\Warehouse;
use Illuminate\Http\Request;

class WarehouseController extends Controller
{
    public function index()
    {
        $data = Warehouse::all();
        // dd($data);
        return view('master_data.gudang.gudang_index', [
            'data' => $data,
            'title' => 'Data Gudang',
            'menuOpen' => "menu-open",
            'menuActive' => "active",
            'warehouseActive' => "active",
        ]);
    }

    public function create()
    {
        $date = date('Y-m-d');
        $data = Warehouse::where('date', $date)->get();
        // dd($data);
        return view('master_data.gudang.gudang_create', [
            'data' => $data,
            'title' => 'Data Gudang',
            'menuOpen' => "menu-open",
            'menuActive' => "active",
            'warehouseActive' => "active",
        ]);
    }

    public function store(Request $request)
    {
        // dd($request);
        $attr = $request->validate([
            'code_warehouse' => 'required',
            'name_warehouse' => 'required',
            'address_warehouse' => 'required',
            'date' => 'required',
        ], [
            'code_warehouse.required' => 'Kode warehouse Harus Diisi',
            'name_warehouse.required' => 'Nama warehouse Harus Diisi',
            'address_warehouse.required' => 'Alamat warehouse Harus Diisi',
            'date.required' => 'Tanggal Harus Diisi',
        ]);
        $insert = Warehouse::insert($attr);
        if ($insert) {
            return redirect()->back()->with('Ok', 'Data Berhasil Disimpan');
        } else {
            return redirect()->back()->with('Fail', 'Data Gagal Disimpan');
        }
    }
    public function edit($id)
    {
        // dd($id);
        $warehouse = Warehouse::where('code_warehouse', $id)->first();
        // dd($raw);
        return view('master_data.gudang.gudang_edit', [
            'warehouse' => $warehouse,
            'title' => 'Data Gudang',
            'menuOpen' => "menu-open",
            'menuActive' => "active",
            'warehouseActive' => "active",
        ]);
    }
    public function update(Request $request, $id)
    {
        // dd($request);
        $attr = $request->validate([
            'code_warehouse' => 'required',
            'name_warehouse' => 'required',
            'address_warehouse' => 'required',
            'date' => 'required',
        ], [
            'code_warehouse.required' => 'Kode warehouse Harus Diisi',
            'name_warehouse.required' => 'Nama warehouse Harus Diisi',
            'address_warehouse.required' => 'Alamat warehouse Harus Diisi',
            'date.required' => 'Tanggal Harus Diisi',
        ]);
        $update = Warehouse::where('code_warehouse', $id)->update($attr);
        if ($update) {
            return redirect()->route('warehouse')->with('Ok', 'Data Berhasil Disimpan');
        } else {
            return redirect()->back()->with('Fail', 'Data Gagal Disimpan');
        }
    }

    public function destroy(Request $request)
    {
        $id = $request->id;
        $delete = Warehouse::where('code_warehouse', $id)->delete();
        if ($delete) {
            return redirect()->back()->with('Ok', 'Data Berhasil Dihapus');
        } else {
            return redirect()->back()->with('Fail', 'Data Gagal Dihapus');
        }
    }
}
