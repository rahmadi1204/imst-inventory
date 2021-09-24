<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Barryvdh\DomPDF\Facade as PDF;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;

class UserController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */

    public function __construct()
    {
        $this->middleware(function ($request, $next) {

            if ($this->user = Auth::user()->role == "guest") {
                return redirect()->route('home');
            } else {
                return $next($request);
            }
        });
    }
    public function index()
    {
        if (Auth::user()->role == 'admin') {
            $users = User::where('role', 'guest')->get();
        } else {
            $users = User::all();
        }

        return view(
            'master_data.user.user_index',
            [
                'title' => 'Data User',
                'users' => $users,
                'no' => 1,
                'menuOpen' => "menu-open",
                'menuActive' => "active",
                'userActive' => "active",
            ]
        );
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function createPDF()
    {
        // retreive all records from db
        $data = User::all();
        // share data to view
        view()->share('users', $data);
        $pdf = PDF::loadView('pdf.user_pdf', $data);

        // download PDF file with download method
        return $pdf->stream();
        // return $pdf->download('user_' . date('d_F_Y') . '.pdf');
    }
    public function create()
    {
        return view('master_data.user.user_create', [
            [
                'title' => 'Data User',
                'menuOpen' => "menu-open",
                'menuActive' => "active",
                'userActive' => "active",
            ]
        ]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $createUser = $request->validate([
            'name' => 'required',
            'username' => 'required|unique:users',
            'email' => 'required|unique:users|email',
            'password' => 'required',
        ]);
        $createUser['password'] = bcrypt($request->password);
        $createUser['role'] = "guest";
        if (User::create($createUser)) {
            return redirect()->route('user')->with('Ok', 'User Berhasil Dibuat');
        } else {
            return redirect()->back()->with('Fail', 'User Gagal Dibuat');
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($username)
    {

        $users = DB::table('users')->where('username', '=', $username)->first();
        // dd($users);
        return view('master_data.user.user_edit', [
            'data' => $users,
            'title' => 'Update User',
            'menuOpen' => "menu-open",
            'menuActive' => "active",
            'userActive' => "active",
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $username)
    {
        // dd($request);
        if ($request->password == null) {
            $password = DB::table('users')->where('username', '=', $username)->get('password');
        } else {
            $password = $request->password;
        }
        $update = User::where('username', $username)->update([
            'name' => $request->name,
            'username' => $request->username,
            'email' => $request->email,
            'password' => bcrypt($password),
        ]);
        if ($update) {
            return redirect()->route('user')->with('Ok', 'Data Berhasil Diupdate');
        } else {
            return redirect()->back()->with('Fail', 'Data Gagal Diupdate');
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Request $request)
    {
        $id = $request->id;
        $delete = User::find($id)->delete();
        if ($delete) {
            return redirect()->route('user')->with('Ok', 'Data Berhasil Didelete');
        } else {
            return redirect()->back()->with('Fail', 'Data Gagal Didelete');
        }
    }
}
