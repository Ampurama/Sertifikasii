<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use App\Models\User;
use Session;

class RegisterController extends Controller
{
    public function register()
    {
        return view('pages.register');
    }

    public function actionregister(Request $request)
    {
        $user = User::create([
            'email' => $request->email,
            'name' => $request->name,
            'password' => Hash::make($request->password),
            'admin' => 'False',
            'active' => 1
        ]);

        Session::flash('success', 'Register Berhasil. Akun Anda sudah Aktif silahkan Login menggunakan username dan password.');
        return redirect('login');
    }
}
