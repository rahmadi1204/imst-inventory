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
            [
                'name' => 'admin',
                'username' => 'admin',
                'email' => 'admin@gmail.com',
                'password' => bcrypt('1234'),
                'role' => 'admin',
            ], [
                'name' => 'developer',
                'username' => 'dev',
                'email' => 'dev@gmail.com',
                'password' => bcrypt('1234'),
                'role' => 'dev',
            ], [
                'name' => 'tamu',
                'username' => 'tamu',
                'email' => 'tamu@gmail.com',
                'password' => bcrypt('1234'),
                'role' => 'guest',
            ]
        ]);
    }
}
