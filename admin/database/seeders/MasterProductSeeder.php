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
                'code_product' => '518 50 6305',
                'name_product' => 'BRAKE SHOES COMPOSITE T',
                'type_product' => 'Bahan Baku',
                'qty_product' => 0,
                'status_product' => 'OK',
                'created_at' => now(),
            ], [
                'code_product' => '407 50 6350',
                'name_product' => 'BRAKE SHOES COMPOSITE M',
                'type_product' => 'Bahan Baku',
                'qty_product' => 0,
                'status_product' => 'OK',
                'created_at' => now(),
            ]
        ]);
    }
}
