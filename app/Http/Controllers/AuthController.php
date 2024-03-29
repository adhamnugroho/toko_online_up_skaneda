<?php

namespace App\Http\Controllers;

use App\Models\Users;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class AuthController extends Controller
{

    public function __construc()
    {

        $this->middleware('guest')->except('logout');
    }

    public function login(Request $request)
    {

        return view('admin.auth.login');
    }

    public function postLogin(Request $request)
    {

        // return $request->all();

        $email = strip_tags($request->email);
        $password = strip_tags($request->password);

        // Pengkondisian jika email atau password kosong
        if (empty($email)) {

            return redirect()->route('login')->with('status', 'error')->with('message', 'Email Harus Diisi');
        } else if (empty($password)) {

            return redirect()->route('login')->with('status', 'error')->with('message', 'Email Harus Diisi');
        }


        $users = Users::where('email', $email)->first();


        // Cek email pada tabel users
        if (!empty($users)) {

            $data = [
                'email' => $users->email,
                'password' => $password
            ];


            if (Auth::attempt($data)) {

                // Pengecekan user yang login itu 'Pengguna' atau 'Admin'
                if ($users->level_user == "Admin") {


                    return redirect()->route('dashboard')->with('status', 'success')->with('message', 'Selamat Datang ' . $users->nama_lengkap);
                } else {

                    return redirect()->route('userDashboard')->with('status', 'success')->with('message', 'Selamat Datang ' . $users->nama_lengkap);
                }
            } else {

                return redirect()->route('login')->with('status', 'error')->with('message', 'Akun tidak terdaftar pada sistem');
            }
        } else {

            return redirect()->route('login')->with('status', 'error')->with('message', 'Akun tidak terdaftar pada sistem');
        }
    }


    public function logout()
    {

        Auth::logout();
        session_start();
        session_destroy();

        return redirect()->route('login')->with('status', 'success')->with('message', 'Berhasil logout');
    }
}
