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
            ['jenis_user_id' => 1, 'menu_id' => 7],  // Akses ke inbox
            ['jenis_user_id' => 1, 'menu_id' => 8],  // Akses ke pesan terkirim (sent)

            // Akses untuk User (jenis_user_id = 2)
            ['jenis_user_id' => 2, 'menu_id' => 1],
            ['jenis_user_id' => 2, 'menu_id' => 3],
            ['jenis_user_id' => 2, 'menu_id' => 4],
            ['jenis_user_id' => 2, 'menu_id' => 7],  // Akses ke inbox
            ['jenis_user_id' => 2, 'menu_id' => 8],  // Akses ke pesan terkirim (sent)

            // Akses untuk Mahasiswa (jenis_user_id = 3)
            ['jenis_user_id' => 3, 'menu_id' => 1],
            ['jenis_user_id' => 3, 'menu_id' => 3],
            ['jenis_user_id' => 3, 'menu_id' => 4],
            ['jenis_user_id' => 3, 'menu_id' => 7],  // Akses ke inbox
            ['jenis_user_id' => 3, 'menu_id' => 8],  // Akses ke pesan terkirim (sent)
        ]);
    }
}
