<?php 
namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;
use App\Models\Pendaftar;

class LoginSiswaController extends Controller
{
    public function showLoginForm()
    {
        return view('siswa.login_siswa');
    }

    public function login(Request $request)
    {
        $request->validate([
            'nisn' => 'required',
            'tanggal_lahir' => 'required|date',
        ]);

        $pendaftar = Pendaftar::where('nisn', $request->nisn)
                        ->where('tanggal_lahir', $request->tanggal_lahir)
                        ->first();

        if ($pendaftar) {
            session(['nisn' => $pendaftar->nisn]);
            return redirect()->route('siswa.profil'); 
        } else {
            return redirect()->back()->withErrors(['login' => 'Login gagal. Data tidak ditemukan!']);
        }
    }

    public function logout()
    {
        Session::forget('nisn');
        return redirect()->route('siswa.login.siswa');
    }
}
