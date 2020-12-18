<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class TambahStatusDiSayembara extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('sayembara', function (Blueprint $table) {
            $table->enum('status', [
                'ditolak',
                'belum diverifikasi',
                'terverifikasi',
                'menunggu desain',
                'diproses',
                'menunggu pembayaran',
                'selesai'
            ])->default('belum diverifikasi');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('sayembara', function (Blueprint $table) {
            $table->dropColumn('status');
        });
    }
}
