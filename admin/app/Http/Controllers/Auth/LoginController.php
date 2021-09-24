<?php

namespace App\Http\Controllers\Auth;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;

class LoginController extends Controller
{

    function index()
    {
        return view('auth.login');
    }
    public function store(Request $request)
    {
        // dd($request);
        $request->validate([
            'username' => 'required',
            'password' => 'required',
        ]);
        if (Auth::attempt(request()->only('username', 'password'))) {
            return redirect('/it-inventory')->with("loginOk", "Selamat Datang " . Auth::user()->name);
        } else {
            return redirect()->back()->with("loginFail", "Username / Password Salah");
        }
    }
}
