<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Midtrans\Config;
use Midtrans\Snap;
use App\Models\Pendaftar;
use App\Models\Pembayaran;
use Illuminate\Support\Facades\Log;

class MidtransController extends Controller
{
    public function __construct()
    {
        Config::$serverKey = config('services.midtrans.server_key');
        Config::$isProduction = config('services.midtrans.is_production');
        Config::$isSanitized = true;
        Config::$is3ds = true;
    }

    public function getSnapToken(Request $request)
    {
        try {
            // Cari data pendaftar berdasarkan NISN
            $pendaftar = Pendaftar::where('nisn', $request->nisn)->first();

            if (!$pendaftar) {
                return response()->json(['error' => 'Data siswa tidak ditemukan'], 404);
            }

            $orderId = 'ORDER-' . uniqid();

            // Simpan ke tabel pembayaran
            Pembayaran::updateOrCreate(
                ['nisn' => $pendaftar->nisn],
                [
                    'order_id' => $orderId,
                    'status' => 'pending',
                    'gross_amount' => $request->biaya,
                    'payment_type' => '-',
                ]
            );

            $params = [
                'transaction_details' => [
                    'order_id' => $orderId,
                    'gross_amount' => (int) $request->biaya,
                ],
                'customer_details' => [
                    'first_name' => $request->nama,
                    'email' => $pendaftar->email ?? 'dummy@example.com',
                ],
                'item_details' => [[
                    'id' => 'biaya-gelombang-' . $request->nisn,
                    'price' => (int) $request->biaya,
                    'quantity' => 1,
                    'name' => 'Biaya Pendaftaran'
                ]],
                'callbacks' => [
                    'finish' => route('siswa.profil')
                ],
                'notification_url' => url('/midtrans/callback'),
            ];

            $snapToken = Snap::getSnapToken($params);

            return response()->json(['token' => $snapToken]);
        } catch (\Exception $e) {
            Log::error('Midtrans error: ' . $e->getMessage());
            return response()->json(['error' => 'Gagal membuat token Midtrans'], 500);
        }
    }

   public function updateStatusTerbayar(Request $request)
{
    try {
        // Simpan ke tabel pembayaran
        Pembayaran::updateOrCreate(
            ['nisn' => $request->nisn],
            [
                'order_id' => $request->order_id,
                'status' => 'settlement',
                'gross_amount' => $request->gross_amount,
                'payment_type' => $request->payment_type,
                'transaction_time' => $request->transaction_time,
                'midtrans_response' => json_encode($request->all())
            ]
        );

        // Update status pendaftar
        Pendaftar::where('nisn', $request->nisn)
            ->update(['status_verifikasi' => 'terbayar']);

        return response()->json(['message' => 'Status pembayaran berhasil diperbarui.']);
    } catch (\Exception $e) {
        Log::error('Update Status Error: ' . $e->getMessage());
        return response()->json(['error' => 'Gagal update status'], 500);
    }
}

}
