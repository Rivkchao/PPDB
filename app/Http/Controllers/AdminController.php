<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage; 
use Illuminate\Support\Facades\Hash;
use App\Models\Pendaftar;
use App\Models\Gelombang;
use App\Models\Admin;
use App\Models\Berita;
use Carbon\Carbon;

class AdminController extends Controller
{
    public function showLogin()
    {
        return view('admin.login_admin');
    }
    public function login(Request $request)
    {
        $request->validate([
            'email' => 'required|email',
            'password' => 'required'
        ]);

        // Cari admin berdasarkan email
        $admin = Admin::where('email', $request->email)->first();

        if ($admin && Hash::check($request->password, $admin->password)) {
            session(['admin_id' => $admin->id]);
            return redirect()->route('admin.dashboard_admin');
        }

        return back()->withErrors(['error' => 'Email atau password salah']);
    }


    public function dashboard(Request $request)
    {
        $gelombangList = Gelombang::all();

        $query = Pendaftar::with('gelombang');

        if ($request->filled('gelombang_id')) {
            $query->where('gelombang_id', $request->gelombang_id);
        }

        $pendaftar = $query->get();

        return view('admin.dashboard_admin', compact('pendaftar', 'gelombangList'));
    }


    public function detailPendaftar($nisn)
    {
        $data = Pendaftar::with(['dokumen', 'pembayaran', 'gelombang'])
            ->where('nisn', $nisn)
            ->firstOrFail();

        return view('admin.detail', compact('data'));
    }

    public function logout()
    {
        session()->forget('admin_id');
        return redirect()->route('admin.login_admin');
    }
    public function verifikasiPendaftar(Request $request, $nisn)
    {
        $request->validate([
            'status' => 'required|in:diterima,ditolak',
            'catatan' => 'nullable|string'
        ]);

        $pendaftar = Pendaftar::where('nisn', $nisn)->firstOrFail();
        $pendaftar->status_verifikasi = $request->status;
        $pendaftar->catatan_penolakan = $request->status === 'ditolak' ? $request->catatan : null;
        $pendaftar->save();

        return redirect()->route('admin.dashboard_admin')->with('success', 'Status verifikasi diperbarui.');
    }

    public function berita()
    {
        $beritaList = Berita::latest()->get();
        return view('admin.berita', compact('beritaList'));
    }

    public function simpanBerita(Request $request)
    {
        $request->validate([
            'judul' => 'required|string|max:255',
            'gambar' => 'required|image|mimes:jpg,jpeg,png|max:2048',
            'isi_konten' => 'required|string'
        ]);

        $gambarPath = $request->file('gambar')->store('berita', 'public');

        Berita::create([
            'judul' => $request->judul,
            'gambar' => $gambarPath,
            'isi_konten' => $request->isi_konten,
            'tanggal' => Carbon::now()
        ]);

        return redirect()->route('admin.berita')->with('success', 'Berita berhasil ditambahkan!');
    }

    public function deleteBerita($id)
{
    $berita = Berita::findOrFail($id);

    // Hapus file gambar jika ada
    if ($berita->gambar && Storage::disk('public')->exists('berita/' . $berita->gambar)) {
        Storage::disk('public')->delete('berita/' . $berita->gambar);
    }

    $berita->delete();

    return redirect()->route('admin.berita')->with('success', 'Berita berhasil dihapus.');
}
}
