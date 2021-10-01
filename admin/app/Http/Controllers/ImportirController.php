<?php

namespace App\Http\Controllers;

use App\Models\Importir;
use Illuminate\Http\Request;

class ImportirController extends Controller
{
    public function index()
    {
        $data = Importir::all();
        // dd($data);
        return view('master_data.importir.importir_index', [
            'data' => $data,
            'title' => 'Data importir',
            'menuOpen' => "menu-open",
            'menuActive' => "active",
            'importirActive' => "active",
        ]);
    }

    public function create()
    {
        $date = date('Y-m-d');
        $data = Importir::where('date', $date)->get();
        // dd($data);
        return view('master_data.importir.importir_create', [
            'data' => $data,
            'title' => 'Data importir',
            'menuOpen' => "menu-open",
            'menuActive' => "active",
            'importirActive' => "active",
        ]);
    }

    public function store(Request $request)
    {
        // dd($request);
        $attr = $request->validate([
            'code_importir' => 'required',
            'name_importir' => 'required',
            'address_importir' => 'required',
            'date' => 'required',
        ], [
            'code_importir.required' => 'Kode importir Harus Diisi',
            'name_importir.required' => 'Nama importir Harus Diisi',
            'address_importir.required' => 'Alamat importir Harus Diisi',
            'date.required' => 'Tanggal Harus Diisi',
        ]);
        $insert = Importir::insert($attr);
        if ($insert) {
            return redirect()->back()->with('Ok', 'Data Berhasil Disimpan');
        } else {
            return redirect()->back()->with('Fail', 'Data Gagal Disimpan');
        }
    }
    public function edit($id)
    {
        // dd($id);
        $importir = Importir::where('code_importir', $id)->first();
        // dd($raw);
        return view('master_data.importir.importir_edit', [
            'importir' => $importir,
            'title' => 'Data importir',
            'menuOpen' => "menu-open",
            'menuActive' => "active",
            'importirActive' => "active",
        ]);
    }
    public function update(Request $request, $id)
    {
        // dd($request);
        $attr = $request->validate([
            'code_importir' => 'required',
            'name_importir' => 'required',
            'address_importir' => 'required',
            'date' => 'required',
        ], [
            'code_importir.required' => 'Kode importir Harus Diisi',
            'name_importir.required' => 'Nama importir Harus Diisi',
            'address_importir.required' => 'Alamat importir Harus Diisi',
            'date.required' => 'Tanggal Harus Diisi',
        ]);
        $update = Importir::where('code_importir', $id)->update($attr);
        if ($update) {
            return redirect()->route('importir')->with('Ok', 'Data Berhasil Disimpan');
        } else {
            return redirect()->back()->with('Fail', 'Data Gagal Disimpan');
        }
    }

    public function destroy(Request $request)
    {
        $id = $request->id;
        $delete = Importir::where('code_importir', $id)->delete();
        if ($delete) {
            return redirect()->back()->with('Ok', 'Data Berhasil Dihapus');
        } else {
            return redirect()->back()->with('Fail', 'Data Gagal Dihapus');
        }
    }
}
