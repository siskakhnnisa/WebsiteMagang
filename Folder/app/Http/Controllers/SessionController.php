<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\Hash;


class SessionController extends Controller
{
    function index(){
        return view("pages/sign_in");
    }
    function login(Request $request){
        Session::flash('username',$request->username);
        $request->validate([
            'username'=>'required',
            'password'=>'required'
        ],[
            'username.required'=>'Username wajib diisi',
            'password.required'=>'Password wajib diisi'
        ]);

        $infologin = [
            'username' => $request->username,
            'password' => $request->password
        ];


        if (Auth::attempt($infologin)) {
            //proses autentikasi berhasil
            $userId = Auth::id();

            // Check user ID and redirect accordingly
            if ($userId == 1) {
                return redirect('dashboardAdmin')->with('success', 'Login Berhasil. Selamat Datang Admin!');
            } else {
                // return redirect('dashboard')->with('success', 'Login Berhasil. Silahkan melakukan peminjaman dengan mengisi form berikut.');
                return redirect('dashboard');
            }
        } else {
            //proses autentikasi gagal
            return redirect('sesi')->withErrors('Username dan Password yang dimasukkan tidak sesuai');
        }
    }

    function logout(Request $request){
        Auth::logout();
        request()->session()->invalidate();
        request()->session()->regenerateToken();
        return redirect('sesi');
    }

    function register(){
        return view('pages/login');
    }
    
    function create(Request $request){
        Session::flash('nama', $request->nama);
        Session::flash('username', $request->username);

        $request->validate([
            'nama' => 'required',
            'jabatan' => 'required',
            'username' => 'required|min:4|unique:users',
            'password' => 'required|min:6',
            'password_confirmation' => 'required|same:password'
        ], [
            'nama.required' => 'Nama wajib diisi',
            'jabatan.required' => 'Detail posisi dalam perusahaan wajib diisi',
            // 'username.required' => 'Username wajib diisi',
            // 'username.min' => 'Username minimal terdiri dari 4 karakter',
            'username.required' => 'username wajib diisi',
            'username.unique' => 'Username sudah pernah didaftarkan pada sistem ini, silahkan masukkan username yang berbeda',
            'password.required' => 'Password wajib diisi',
            'password.min' => 'Password minimal 6 karakter',
            'password_confirmation.same' => 'Mohon sesuaikan dengan isian pada kolom password '
        ]);

        $data = [
            'nama' => $request->nama,
            'jabatan' => $request->jabatan,
            'username' => $request->username,
            'password' => Hash::make($request->password)
        ];

        User::create($data);

        $infologin = [
            'username' => $request->username,
            'password' => $request->password
        ];



        if(Auth::attempt($infologin)){
            //proses autentikasi berhasil
            return redirect('sesi')->with('success', 'Berhasil Registrasi');
        } else {
            //proses autentikasi gagal
            return redirect('sesi')->withErrors('Username dan Password yang dimasukkan tidak sesuai');
        }
    }

}
