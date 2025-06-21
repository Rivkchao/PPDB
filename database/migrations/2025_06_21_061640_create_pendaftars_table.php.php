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
    Schema::create('pendaftar', function (Blueprint $table) {
        $table->id();
        $table->string('nisn', 15)->unique();
        $table->string('nama_lengkap', 100)->nullable();
        $table->string('nik', 20)->nullable();
        $table->string('tempat_lahir', 50)->nullable();
        $table->date('tanggal_lahir')->nullable();
        $table->string('jenis_kelamin', 10)->nullable();
        $table->string('agama', 20)->nullable();
        $table->text('alamat')->nullable();
        $table->string('telepon', 20)->nullable();
        $table->string('email', 100)->nullable();
        $table->string('asal_sekolah', 100)->nullable();
        $table->string('jurusan', 50)->nullable();
        $table->string('nama_ortu', 100)->nullable();
        $table->string('pekerjaan_ortu', 100)->nullable();
        $table->string('penghasilan_ortu', 50)->nullable();
        $table->text('alamat_ortu')->nullable();
        $table->string('pendidikan_ortu', 50)->nullable();
        $table->string('telepon_ortu', 20)->nullable();
        $table->enum('status_verifikasi', ['menunggu', 'diterima', 'ditolak'])->default('menunggu');
        $table->timestamp('updated_at')->useCurrent()->nullable();
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
