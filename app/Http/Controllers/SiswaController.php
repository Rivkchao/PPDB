<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Pendaftar;
use App\Models\Gelombang;
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
                $data->status_verifikasi = 'terbayar';
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

            $updated = Pendaftar::where('nisn', $request->nisn)
                ->update(['status_verifikasi' => 'terbayar']);

            Log::info('Update status_verifikasi berhasil', ['updated' => $updated]);

            return response()->json(['message' => 'Status berhasil diperbarui ke terbayar']);
        } catch (\Exception $e) {
            Log::error('Gagal update status: ' . $e->getMessage());
            return response()->json(['message' => 'Terjadi kesalahan saat update status'], 500);
        }
    }

    public function revisi()
    {
        $nisn = session('nisn');
        $data = Pendaftar::where('nisn', $nisn)->firstOrFail();
        $gelombangList = Gelombang::all();

        return view('siswa.revisi_siswa', compact('data', 'gelombangList'));
    }

    public function updateData(Request $request)
    {
        $nisn = session('nisn');

        $request->validate([
            'nama_lengkap'      => 'required|string|max:255',
            'nik'               => 'required|string|max:20',
            'tempat_lahir'      => 'required|string|max:100',
            'tanggal_lahir'     => 'required|date',
            'jenis_kelamin'     => 'required|in:Laki-laki,Perempuan',
            'agama'             => 'required|string|max:50',
            'alamat'            => 'required|string',
            'telepon'           => 'required|string|max:20',
            'email'             => 'nullable|email|max:100',
            'asal_sekolah'      => 'required|string|max:100',
            'jurusan'           => 'required|string|max:50',

            'nama_ortu'         => 'required|string|max:100',
            'pekerjaan_ortu'    => 'required|string|max:100',
            'penghasilan_ortu'  => 'nullable|string|max:20',
            'alamat_ortu'       => 'required|string',
            'pendidikan_ortu'   => 'required|string|max:50',
            'telepon_ortu'      => 'required|string|max:20',
        ]);

        $siswa = Pendaftar::where('nisn', $nisn)->firstOrFail();

        $siswa->update([
            'nama_lengkap'      => $request->nama_lengkap,
            'nik'               => $request->nik,
            'tempat_lahir'      => $request->tempat_lahir,
            'tanggal_lahir'     => $request->tanggal_lahir,
            'jenis_kelamin'     => $request->jenis_kelamin,
            'agama'             => $request->agama,
            'alamat'            => $request->alamat,
            'telepon'           => $request->telepon,
            'email'             => $request->email,
            'asal_sekolah'      => $request->asal_sekolah,
            'jurusan'           => $request->jurusan,

            'nama_ortu'         => $request->nama_ortu,
            'pekerjaan_ortu'    => $request->pekerjaan_ortu,
            'penghasilan_ortu'  => $request->penghasilan_ortu,
            'alamat_ortu'       => $request->alamat_ortu,
            'pendidikan_ortu'   => $request->pendidikan_ortu,
            'telepon_ortu'      => $request->telepon_ortu,
        ]);

        return redirect()->route('siswa.profil')->with('success', 'Data berhasil diperbarui.');
    }
}
