<?php
namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class MenuSeeder extends Seeder
{
    public function run(): void
    {
        DB::table('menus')->delete();

        DB::table('menus')->insert([
            ['id' => 1, 'nama_menu' => 'Menu', 'link_menu' => 'menu', 'icon_menu' => 'fas fa-bars'],
            ['id' => 2, 'nama_menu' => 'Setting Menu', 'link_menu' => 'setting_menus', 'icon_menu' => 'fas fa-cogs'],
            ['id' => 3, 'nama_menu' => 'Kategori', 'link_menu' => 'kategori_buku', 'icon_menu' => 'fas fa-tags'],
            ['id' => 4, 'nama_menu' => 'Buku', 'link_menu' => 'buku', 'icon_menu' => 'fas fa-book'],
            ['id' => 5, 'nama_menu' => 'Manajemen User', 'link_menu' => 'users', 'icon_menu' => 'fas fa-users'],
            ['id' => 6, 'nama_menu' => 'Manajemen Jenis User', 'link_menu' => 'jenis_user', 'icon_menu' => 'fas fa-user-cog'],
            ['id' => 7, 'nama_menu' => 'Inbox', 'link_menu' => 'inbox', 'icon_menu' => 'fas fa-inbox'],
            ['id' => 8, 'nama_menu' => 'Pesan Terkirim', 'link_menu' => 'sent', 'icon_menu' => 'fas fa-paper-plane'],
            ['id' => 9, 'nama_menu' => 'Postingan', 'link_menu' => 'postingan', 'icon_menu' => 'fas fa-edit'],
            ['id' => 10, 'nama_menu' => 'Informasi Gempa', 'link_menu' => 'gempa', 'icon_menu' => 'fas fa-exclamation-triangle'], // Menambahkan Informasi Gempa
            ['id' => 11, 'nama_menu' => 'Informasi Map', 'link_menu' => 'map', 'icon_menu' => 'fas fa-map'], // Menambahkan Informasi Map
        ]);
    }
}

