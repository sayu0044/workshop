<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class JenisUserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('jenis_users')->delete(); // Perbaiki nama tabel di sini

        DB::table('jenis_users')->insert([ // Perbaiki nama tabel di sini
            ['id' => 1, 'nama_jenis_user' => 'admin'],
            ['id' => 2, 'nama_jenis_user' => 'user'],
            ['id' => 3, 'nama_jenis_user' => 'mahasiswa'],
        ]);
    }
}
