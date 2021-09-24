<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Models\Customer;
use Illuminate\Http\Request;

class CustomerController extends Controller
{
    public function index()
    {
        $data = Customer::all();
        // dd($data);
        return view('master_data.customer.customer_index', [
            'data' => $data,
            'title' => 'Data Customer',
            'menuOpen' => "menu-open",
            'menuActive' => "active",
            'customerActive' => "active",
        ]);
    }

    public function create()
    {
        $date = date('Y-m-d');
        $data = Customer::where('date', $date)->get();
        // dd($data);
        return view('master_data.customer.customer_create', [
            'data' => $data,
            'title' => 'Data Customer',
            'menuOpen' => "menu-open",
            'menuActive' => "active",
            'customerActive' => "active",
        ]);
    }

    public function store(Request $request)
    {
        // dd($request);
        $attr = $request->validate([
            'code_customer' => 'required',
            'name_customer' => 'required',
            'address_customer' => 'required',
            'date' => 'required',
        ], [
            'code_customer.required' => 'Kode Customer Harus Diisi',
            'name_customer.required' => 'Nama Customer Harus Diisi',
            'address_customer.required' => 'Alamat Customer Harus Diisi',
            'date.required' => 'Tanggal Harus Diisi',
        ]);
        $insert = Customer::insert($attr);
        if ($insert) {
            return redirect()->back()->with('Ok', 'Data Berhasil Disimpan');
        } else {
            return redirect()->back()->with('Fail', 'Data Gagal Disimpan');
        }
    }
    public function edit($id)
    {
        // dd($id);
        $customer = Customer::where('code_customer', $id)->first();
        // dd($raw);
        return view('master_data.customer.customer_edit', [
            'customer' => $customer,
            'title' => 'Data Customer',
            'menuOpen' => "menu-open",
            'menuActive' => "active",
            'customerActive' => "active",
        ]);
    }
    public function update(Request $request, $id)
    {
        // dd($request);
        $attr = $request->validate([
            'code_customer' => 'required',
            'name_customer' => 'required',
            'address_customer' => 'required',
            'date' => 'required',
        ], [
            'code_customer.required' => 'Kode Customer Harus Diisi',
            'name_customer.required' => 'Nama Customer Harus Diisi',
            'address_customer.required' => 'Alamat Customer Harus Diisi',
            'date.required' => 'Tanggal Harus Diisi',
        ]);
        $update = Customer::where('code_customer', $id)->update($attr);
        if ($update) {
            return redirect()->route('customer')->with('Ok', 'Data Berhasil Disimpan');
        } else {
            return redirect()->back()->with('Fail', 'Data Gagal Disimpan');
        }
    }

    public function destroy(Request $request)
    {
        $id = $request->id;
        $delete = Customer::where('code_customer', $id)->delete();
        if ($delete) {
            return redirect()->back()->with('Ok', 'Data Berhasil Dihapus');
        } else {
            return redirect()->back()->with('Fail', 'Data Gagal Dihapus');
        }
    }
}
