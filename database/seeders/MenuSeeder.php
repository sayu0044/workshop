<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class MenuSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('menus')->delete();

        DB::table('menus')->insert([
            ['id' => 1, 'nama_menu' => 'Menu', 'link_menu' => 'dashboard/menu'],
            ['id' => 2, 'nama_menu' => 'Setting Menu', 'link_menu' => 'dashboard/setting_menus'],
            ['id' => 3, 'nama_menu' => 'Kategori', 'link_menu' => 'dashboard/kategori_buku'],
            ['id' => 4, 'nama_menu' => 'Buku', 'link_menu' => 'dashboard/buku'],
            ['id' => 5, 'nama_menu' => 'Manajemen User', 'link_menu' => 'dashboard/users'],
            ['id' => 6, 'nama_menu' => 'Manajemen Jenis User', 'link_menu' => 'dashboard/jenis_user'],
        ]);
    }
}
