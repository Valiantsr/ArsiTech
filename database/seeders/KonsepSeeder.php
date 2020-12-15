<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;

class KonsepSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        \DB::statement('SET FOREIGN_KEY_CHECKS=0;');
        \DB::table('konsep')->truncate();
        \DB::table('konsep')->insert([
            [
                'nama'  => 'mediterania',
                'harga' => '70000',
            ],
            [
                'nama'  => 'klasik',
                'harga' => '30000',
            ],
            [
                'nama'  => 'modern',
                'harga' => '40000',
            ],
            [
                'nama'  => 'minimalis',
                'harga' => '30000',
            ]

        ]);
    }
}
