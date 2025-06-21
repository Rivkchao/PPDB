<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
   public function up()
{
    Schema::create('dokumen_siswa', function (Blueprint $table) {
        $table->id();
        $table->string('nisn', 15);
        $table->string('pas_foto', 255)->nullable();
        $table->string('scan_ijazah', 255)->nullable();
        $table->string('scan_kk', 255)->nullable();
        $table->string('scan_akta', 255)->nullable();
        $table->string('scan_kelakuan', 255)->nullable();
        $table->timestamp('uploaded_at')->useCurrent()->nullable();
    });
}


    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        //
    }
};
