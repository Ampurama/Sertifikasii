<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

use Session;

class LoginController extends Controller
{
    public function login()
    {
        if (Auth::check()) {
            return redirect('home');
        }else{
            return view('pages.login');
        }
    }

    public function actionlogin(Request $request)
    {
        $credentials = $request->validate([
            'email' => ['required', 'email'],
            'password' => ['required']
        ]);
        if (Auth::attempt($credentials)) {
            $request->session()->regenerate();

            if (Auth::user()->admin === 'True') {
                return redirect('data-mahasiswa');
            }

            return redirect('home')->with('success', 'Login successful.');
        }
        Session::flash('status', 'failed');
        Session::flash('message', 'proses login gagal, Email atau Password salah');
        return redirect('/login');
    }

    public function actionlogout()
    {
        Auth::logout();
        return redirect('login')->with('success','Berhasil Logout');
    }
}