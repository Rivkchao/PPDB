<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
   public function up()
{
    Schema::table('pendaftar', function (Blueprint $table) {
        $table->unsignedBigInteger('gelombang_id')->nullable()->after('id');

        $table->foreign('gelombang_id')->references('id')->on('gelombang')->onDelete('set null');
    });
}


    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('pendaftar', function (Blueprint $table) {
            //
        });
    }
};
