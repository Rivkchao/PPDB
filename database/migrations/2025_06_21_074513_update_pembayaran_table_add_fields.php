<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
  public function up()
    {
        Schema::table('pembayaran', function (Blueprint $table) {
            // Tambahkan field yang sebelumnya error karena belum ada
            if (!Schema::hasColumn('pembayaran', 'gross_amount')) {
                $table->integer('gross_amount')->after('status')->default(0);
            }

            if (!Schema::hasColumn('pembayaran', 'payment_type')) {
                $table->string('payment_type')->after('gross_amount')->default('-');
            }

            if (!Schema::hasColumn('pembayaran', 'transaction_time')) {
                $table->timestamp('transaction_time')->after('payment_type')->nullable();
            }

            if (!Schema::hasColumn('pembayaran', 'midtrans_response')) {
                $table->json('midtrans_response')->after('transaction_time')->nullable();
            }
        });
    }

    public function down()
    {
        Schema::table('pembayaran', function (Blueprint $table) {
            $table->dropColumn(['gross_amount', 'payment_type', 'transaction_time', 'midtrans_response']);
        });
    }
};
