<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class MasterProductSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('master_products')->insert([
            [
                'code_product' => 'BB-W',
                'type_product' => 'Bahan Baku',
                'name_product' => 'Wheel',
                'status_product' => 'OK',
                'created_at' => now(),
            ],   [
                'code_product' => 'BB-B',
                'type_product' => 'Bahan Baku',
                'name_product' => 'Baja',
                'status_product' => 'OK',
                'created_at' => now(),
            ],   [
                'code_product' => 'BP-M',
                'type_product' => 'Bahan Penolong',
                'name_product' => 'Minyak',
                'status_product' => 'OK',
                'created_at' => now(),
            ]
        ]);
    }
}
