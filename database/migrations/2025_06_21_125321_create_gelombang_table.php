<?php
use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
    public function up()
    {
        Schema::create('gelombang', function (Blueprint $table) {
            $table->id();
            $table->string('nama'); // contoh: Gelombang 1, Gelombang 2
            $table->date('tanggal_mulai');
            $table->date('tanggal_selesai');
            $table->integer('biaya'); // biaya pendaftaran
            $table->timestamps();
        });
    }

    public function down()
    {
        Schema::dropIfExists('gelombang');
    }
};
