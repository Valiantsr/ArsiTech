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
                'terverifikasi',
                'belum diverifikasi',
                'ditolak',
                'menunngu',
                'pending',
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
