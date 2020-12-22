<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateArsitekTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('arsitek', function (Blueprint $table) {
            $table->id();
            $table->string('nik')->nullable();
            $table->string('nama_depan');
            $table->string('nama_belakang');
            $table->enum('jenis_kelamin', [
                'Pria',
                'Wanita'
            ]);
            $table->date('tanggal_lahir');
            $table->text('alamat');
            $table->string('no_hp');
            $table->string('no_rek')->nullable();
            $table->string('ktp')->nullable();
            $table->string('ijazah')->nullable();
            $table->foreignId('user_id')->constrained('users')->onDelete('cascade');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('arsitek');
    }
}
