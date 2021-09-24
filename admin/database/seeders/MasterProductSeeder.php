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
            'code_product' => 'A1',
            'type_product' => 'Bahan Baku',
            'name_product' => 'Wheel',
            'status_product' => 'Aktif',
            'created_at' => now(),
        ]);
    }
}
