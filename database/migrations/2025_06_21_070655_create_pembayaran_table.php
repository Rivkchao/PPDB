<?php
use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreatePembayaranTable extends Migration
{
    public function up()
    {
        Schema::create('pembayaran', function (Blueprint $table) {
            $table->id();
            $table->string('nisn');
            $table->string('order_id')->unique();
            $table->string('status')->default('pending');
            $table->integer('gross_amount'); // <- WAJIB diisi
            $table->string('payment_type')->default('-');
            $table->timestamp('transaction_time')->nullable();
            $table->json('midtrans_response')->nullable();
            $table->timestamps();

            // Jika kamu ingin relasi ke tabel pendaftar:
            // $table->foreign('nisn')->references('nisn')->on('pendaftar')->onDelete('cascade');
        });
    }

    public function down()
    {
        Schema::dropIfExists('pembayaran');
    }
}
