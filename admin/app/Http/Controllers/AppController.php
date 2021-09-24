<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class AppController extends Controller
{
    public function index()
    {
        if (Auth::user()->role == 'dev') {
            return view('dev.dashboard');
        } elseif (Auth::user()->role == 'admin') {
            return view('admin.dashboard');
        } else {
            return view('guest.dashboard');
        }
    }
}
