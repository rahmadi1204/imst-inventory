<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class importirSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('importirs')->insert([
            'nik_importir' => '735365504621000',
            'name_importir' => 'PT INKA MULTI SOLUSI TRADING',
            'address_importir' => 'JL DR SOETOMO',
            'status_importir' => "LAI",
            'apiu' => "131903073-P",
            'created_at' => now(),
        ]);
    }
}
