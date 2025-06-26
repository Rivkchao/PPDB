<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up()
    {
        Schema::table('pendaftar', function (Blueprint $table) {
            $table->text('catatan_penolakan')->nullable()->after('status_verifikasi');
        });
    }

    public function down()
    {
        Schema::table('pendaftar', function (Blueprint $table) {
            $table->dropColumn('catatan_penolakan');
        });
    }
};
