<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateTransaksiTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('transaksi', function (Blueprint $table) {
            $table->id();
            $table->foreignId('sayembara_id')->constrained('sayembara')->onDelete('cascade')->onUpdate('cascade');
            $table->foreignId('desain_id')->nullable()->constrained('desain')->onDelete('cascade')->onUpdate('cascade');
            $table->foreignId('arsitek_id')->constrained('arsitek')->onDelete('cascade')->onUpdate('cascade');
            $table->timestamps();
            $table->boolean('read')->default(false);
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('transaksi');
    }
}
