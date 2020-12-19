<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;

class SayembaraSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        \DB::statement('SET FOREIGN_KEY_CHECKS=0;');
        \DB::table('sayembara')->truncate();
        \DB::table('sayembara')->insert([
            [
                'nama'          => 'Rumah',
                'tanggal'       => '2020-12-31',
                'akhir'         => '2021-2-4',
                'luas_bangunan' => '150',
                'pelanggan_id'  => '1',
                'konsep_id'     => '1',
                'status'        => 'terverifikasi'
            ],
            [
                'nama'          => 'Apartemen',
                'tanggal'       => '2020-12-31',
                'akhir'         => '2021-2-4',
                'luas_bangunan' => '450',
                'pelanggan_id'  => '1',
                'konsep_id'     => '3',
                'status'        => 'terverifikasi'
            ],
            [
                'nama'          => 'Gedung',
                'tanggal'       => '2020-12-31',
                'akhir'         => '2021-2-4',
                'luas_bangunan' => '250',
                'pelanggan_id'  => '1',
                'konsep_id'     => '2',
                'status'        => 'terverifikasi'
            ],
        ]);
    }
}
