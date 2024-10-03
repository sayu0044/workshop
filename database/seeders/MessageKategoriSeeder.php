<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class MessageKategoriSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('message_kategori')->delete();

        DB::table('message_kategori')->insert([
            ['nama_kategori' => 'Umum'],
            ['nama_kategori' => 'Privat'],
            ['nama_kategori' => 'Notifikasi'],
        ]);
    }
}
