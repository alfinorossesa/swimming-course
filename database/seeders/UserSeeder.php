<?php

namespace Database\Seeders;

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
        DB::table('users')->insert([
            'nama' => 'admin',
            'username' => 'admin',
            'alamat' => 'alamat admin',
            'no_telp' => 999999999999,
            'password' => bcrypt('password'),
            'isAdmin' => true
        ]);
    }
}
