<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Pendaftar;
use App\Models\DokumenSiswa;
use App\Models\Pembayaran;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\Log;


class SiswaController extends Controller
{
    public function profil()
    {
        $nisn = Session::get('nisn');

        $data = Pendaftar::with(['dokumen', 'pembayaran'])->where('nisn', $nisn)->firstOrFail();

        // Update status jika sudah bayar tapi masih menunggu
        if (strtolower($data->status_verifikasi) === 'menunggu') {
            $statusBayar = strtolower($data->pembayaran->status ?? '');
            if (in_array($statusBayar, ['settlement', 'capture'])) {
                $data->status_verifikasi = 'sudah bayar';
                $data->save();
            }
        }

        return view('siswa.profil', ['data' => $data]);
    }
   public function updateStatusTerbayar(Request $request)
{
    try {
        Log::info('Request masuk ke updateStatusTerbayar', $request->all());

        $request->validate([
            'nisn' => 'required'
        ]);

        $updated = \App\Models\Pendaftar::where('nisn', $request->nisn)
            ->update(['status_verifikasi' => 'terbayar']);

        Log::info('Update status_verifikasi berhasil', ['updated' => $updated]);

        return response()->json(['message' => 'Status berhasil diperbarui ke terbayar']);
    } catch (\Exception $e) {
        Log::error('Gagal update status: ' . $e->getMessage());
        return response()->json(['message' => 'Terjadi kesalahan saat update status'], 500);
    }
}
}
