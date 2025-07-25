<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Pendaftar;
use App\Models\DokumenSiswa;
use App\Models\Gelombang;
use Carbon\Carbon;

class PendaftaranController extends Controller
{
    public function showForm()
    {
        $gelombangList = Gelombang::orderBy('tanggal_mulai')->get();
        return view('pendaftaran', compact('gelombangList'));
    }

    public function submitForm(Request $request)
    {
        $request->validate([
            'nisn' => 'required|unique:pendaftar,nisn',
            'nama_lengkap' => 'required',
            'pas_foto' => 'required|file|mimes:jpg,jpeg,png|max:7000',
            'scan_ijazah' => 'required|file|mimes:jpg,jpeg,pdf|max:7000',
            'scan_kk' => 'required|file|mimes:jpg,jpeg,pdf|max:7000',
            'scan_akta' => 'required|file|mimes:jpg,jpeg,pdf|max:7000',
            'scan_kelakuan' => 'nullable|file|mimes:jpg,jpeg,pdf|max:7000',
        ]);

        $now = Carbon::now()->toDateString(); 

        $gelombangAktif = Gelombang::where('tanggal_mulai', '<=', $now)
            ->where('tanggal_selesai', '>=', $now)
            ->first();

        $pendaftar = Pendaftar::create(array_merge(
            $request->except([
                'pas_foto',
                'scan_ijazah',
                'scan_kk',
                'scan_akta',
                'scan_kelakuan'
            ]),
            ['gelombang_id' => $gelombangAktif ? $gelombangAktif->id : null]
        ));
        $uploads = [];
        try {
            foreach (['pas_foto', 'scan_ijazah', 'scan_kk', 'scan_akta', 'scan_kelakuan'] as $file) {
                if ($request->hasFile($file) && $request->file($file)->isValid()) {
                    $uploads[$file] = $request->file($file)->store('dokumen', 'public');
                } else {
                    $uploads[$file] = null;
                }
            }
            // Pastikan nisn yang dipakai adalah dari pendaftar baru
            $uploads['nisn'] = $pendaftar->nisn;
            \App\Models\DokumenSiswa::updateOrCreate(
                ['nisn' => $pendaftar->nisn],
                $uploads
            );
        } catch (\Exception $e) {
            return redirect()->back()->withInput()->with('error', 'Gagal upload dokumen: ' . $e->getMessage() . ' | ' . $e->getTraceAsString());
        }

        return redirect()->route('siswa.login.siswa')->with('success', 'Pendaftaran berhasil!');
    }
}
