<?php

namespace App\Http\Controllers;

use App\Models\Administrator;
use App\Models\Guru;
use App\Models\Siswa;
use App\Models\User;
use Illuminate\Contracts\Session\Session;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Inertia\Inertia;

class IndexController extends Controller
{
    public function index()
    {
        if(session('user')){
            return back();
        }
        return Inertia::render('Login');
    } 
    
    public function home(){
        return Inertia::render('Home');
    }
    public function loginAdmin(Request $request)
    {
        $admin = Administrator::where('id_admin', $request->idAdmin)->where('password', $request->password)->first();
         if (!$admin) return back()->with('error', "kode admin atau password salah");

         $admin->role = 'admin';
         session(['user' => $admin]);

         return redirect('/home');
    }

    public function loginSiswa(request $request)
    {
        $siswa = Siswa::where('nis', $request->nis)->where('password', $request->password)->first();
        if (!$siswa) return back()->with('error', "nis atau password salah");

        $siswa->role = 'siswa';
        session(['user' => $siswa]);
        return redirect('/home');
    }

    public function loginGuru(request $request)
    {
        $guru = Guru::where('nip', $request->nip)->where('password', $request->password)->first();
        if (!$guru) return back()->with('error', "nip atau password salah");

        $guru->role = 'guru';
        session(['user' => $guru]);
        return redirect('/home');
    }

    public function logout(Request $request){
        $request->session()->invalidate();

        $request->session()->regenerateToken();
        return redirect('/');
    }
}