<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('users')->delete();
        User::create([
            'name' => 'Administrator',
            'email' => 'admin@admin',
            'password' => bcrypt('admin@admin'),
            'no_hp' => '081359528944',
            'wa' => '081359528944',
            'pin' => 'PIN',
            'is_admin' => true,
        ]);
    }
}