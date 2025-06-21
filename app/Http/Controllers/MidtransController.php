<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Pembayaran;
use App\Models\Pendaftar;
use Midtrans\Config;
use Midtrans\Snap;
use Illuminate\Support\Facades\Log;

class MidtransController extends Controller
{
    public function getSnapToken(Request $request)
    {
        // Logging masuk ke fungsi
        Log::info('Masuk ke getSnapToken', $request->only('nisn', 'nama'));

        $request->validate([
            'nisn' => 'required',
            'nama' => 'required'
        ]);

        try {
            // Konfigurasi Midtrans
            Config::$serverKey = 'SB-Mid-server-8nzNiPQzJJRxbug2TDyXOPRT';
            Config::$isProduction = false;
            Config::$isSanitized = true;
            Config::$is3ds = true;

            $orderId = 'ORDER-' . $request->nisn . '-' . time();
            $pendaftar = Pendaftar::with('gelombang')->where('nisn', $request->nisn)->first();
            $grossAmount = $pendaftar->gelombang->biaya;

            $transaction = [
                'transaction_details' => [
                    'order_id' => $orderId,
                    'gross_amount' => $grossAmount,
                ],
                'customer_details' => [
                    'first_name' => $request->nama,
                ]
            ];

            $snapToken = Snap::getSnapToken($transaction);

            Log::info('Sebelum insert ke pembayaran', ['order_id' => $orderId]);

            // Simpan ke tabel pembayaran
            Pembayaran::create([
                'nisn' => $request->nisn,
                'order_id' => $orderId,
                'status' => 'pending',
                'gross_amount' => $grossAmount,
                'payment_type' => '-',
                'transaction_time' => now(),
                'midtrans_response' => json_encode($transaction),
            ]);

            Log::info('Setelah insert ke pembayaran');

            return response()->json(['token' => $snapToken]);
        } catch (\Exception $e) {
            Log::error('Gagal membuat Snap Token atau menyimpan pembayaran', [
                'error' => $e->getMessage(),
                'trace' => $e->getTraceAsString()
            ]);
            return response()->json(['error' => 'Terjadi kesalahan saat memproses pembayaran.'], 500);
        }
    }
}
