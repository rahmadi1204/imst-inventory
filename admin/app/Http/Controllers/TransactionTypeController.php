<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;

use Illuminate\Http\Request;

class TransactionTypeController extends Controller
{
    public function index()
    {
        return view('transactions.index', [
            'menuOpen' => "menu-open",
            'menuActive' => "active",
            'transactionActive' => "active",
            'title' => 'Jenis Transaksi',
        ]);
    }
}
