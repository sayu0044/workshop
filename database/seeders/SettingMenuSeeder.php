<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class SettingMenuSeeder extends Seeder
{
    public function run(): void
    {
        DB::table('setting_menus')->delete();

        DB::table('setting_menus')->insert([
            // Akses untuk Admin (jenis_user_id = 1)
            ['jenis_user_id' => 1, 'menu_id' => 1],
            ['jenis_user_id' => 1, 'menu_id' => 2],
            ['jenis_user_id' => 1, 'menu_id' => 3],
            ['jenis_user_id' => 1, 'menu_id' => 4],
            ['jenis_user_id' => 1, 'menu_id' => 5],
            ['jenis_user_id' => 1, 'menu_id' => 6],
            ['jenis_user_id' => 1, 'menu_id' => 7],
            ['jenis_user_id' => 1, 'menu_id' => 8],
            ['jenis_user_id' => 1, 'menu_id' => 9],
            ['jenis_user_id' => 1, 'menu_id' => 10],  // Akses ke Informasi Gempa
            ['jenis_user_id' => 1, 'menu_id' => 11],  // Akses ke Informasi Map

            // Akses untuk User (jenis_user_id = 2)
            ['jenis_user_id' => 2, 'menu_id' => 1],
            ['jenis_user_id' => 2, 'menu_id' => 3],
            ['jenis_user_id' => 2, 'menu_id' => 4],
            ['jenis_user_id' => 2, 'menu_id' => 7],
            ['jenis_user_id' => 2, 'menu_id' => 8],
            ['jenis_user_id' => 2, 'menu_id' => 9],
            ['jenis_user_id' => 2, 'menu_id' => 10],  // Akses ke Informasi Gempa
            ['jenis_user_id' => 2, 'menu_id' => 11],  // Akses ke Informasi Map

            // Akses untuk Mahasiswa (jenis_user_id = 3)
            ['jenis_user_id' => 3, 'menu_id' => 1],
            ['jenis_user_id' => 3, 'menu_id' => 3],
            ['jenis_user_id' => 3, 'menu_id' => 4],
            ['jenis_user_id' => 3, 'menu_id' => 7],
            ['jenis_user_id' => 3, 'menu_id' => 8],
            ['jenis_user_id' => 3, 'menu_id' => 9],
            ['jenis_user_id' => 3, 'menu_id' => 10],  // Akses ke Informasi Gempa
            ['jenis_user_id' => 3, 'menu_id' => 11],  // Akses ke Informasi Map
        ]);
    }
}
