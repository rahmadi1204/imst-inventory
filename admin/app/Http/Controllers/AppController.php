<?php

namespace App\Http\Controllers;

use App\Models\Master\MasterProduct;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class AppController extends Controller
{
    public function index()
    {
        $countProduct = MasterProduct::count('code_product');
        // dd($countProduct);
        return view('admin.dashboard', [
            'dashboardActive' => "active",
            'countProduct' => $countProduct,
        ]);
    }
}
