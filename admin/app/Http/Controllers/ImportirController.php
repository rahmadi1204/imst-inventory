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

        $insert = Importir::insert([
            'nik_importir' => $request->nik_importir,
            'name_importir' => $request->name_importir,
            'address_importir' => $request->address_importir,
            'status_importir' => $request->status_importir,
            'apiu' => $request->apiu,
            'created_at' => now(),
            'updated_at' => now(),
        ]);
        if ($insert) {
            return redirect()->back()->with('Ok', 'Data Berhasil Disimpan');
        } else {
            return redirect()->back()->with('Fail', 'Data Gagal Disimpan');
        }
    }
    public function edit($id)
    {
        // dd($id);
        $importir = Importir::where('nik_importir', $id)->first();
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
            'nik_importir' => 'required',
            'name_importir' => 'required',
            'address_importir' => 'required',
            'status_importir' => 'required',
            'apiu' => 'required',
        ], [
            'nik_importir.required' => 'NIK importir Harus Diisi',
            'name_importir.required' => 'Nama importir Harus Diisi',
            'address_importir.required' => 'Alamat importir Harus Diisi',
            'status_importir.required' => 'Status importir Harus Diisi',
            'apiu.required' => 'APIUHarus Diisi',
        ]);
        $update = Importir::where('nik_importir', $id)->update($attr);
        if ($update) {
            return redirect()->route('importir')->with('Ok', 'Data Berhasil Disimpan');
        } else {
            return redirect()->back()->with('Fail', 'Data Gagal Disimpan');
        }
    }

    public function destroy(Request $request)
    {
        $id = $request->id;
        $delete = Importir::where('nik_importir', $id)->delete();
        if ($delete) {
            return redirect()->back()->with('Ok', 'Data Berhasil Dihapus');
        } else {
            return redirect()->back()->with('Fail', 'Data Gagal Dihapus');
        }
    }
}
