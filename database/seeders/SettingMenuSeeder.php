<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class SettingMenuSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('setting_menus')->delete();

        // Assign menus to the Admin (jenis_user_id = 1)
        DB::table('setting_menus')->insert([
            ['jenis_user_id' => 1, 'menu_id' => 1], // Menu
            ['jenis_user_id' => 1, 'menu_id' => 2], // Setting Menu
            ['jenis_user_id' => 1, 'menu_id' => 3], // Kategori
            ['jenis_user_id' => 1, 'menu_id' => 4], // Buku
            ['jenis_user_id' => 1, 'menu_id' => 5], // Manajemen User
            ['jenis_user_id' => 1, 'menu_id' => 6], // Manajemen Jenis User
        ]);

        // Assign menus to the User (jenis_user_id = 2)
        DB::table('setting_menus')->insert([
            ['jenis_user_id' => 2, 'menu_id' => 1], // Menu
            ['jenis_user_id' => 2, 'menu_id' => 3], // Kategori
            ['jenis_user_id' => 2, 'menu_id' => 4], // Buku
        ]);

        // Assign menus to the Mahasiswa (jenis_user_id = 3)
        DB::table('setting_menus')->insert([
            ['jenis_user_id' => 3, 'menu_id' => 1], // Menu
            ['jenis_user_id' => 3, 'menu_id' => 3], // Kategori
            ['jenis_user_id' => 3, 'menu_id' => 4], // Buku
        ]);
    }
}
