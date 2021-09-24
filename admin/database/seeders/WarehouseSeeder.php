<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class WarehouseSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('warehouses')->insert([
            'code_warehouse' => 'GBR',
            'name_warehouse' => 'GUDANG BERIKAT RINGROAD',
            'address_warehouse' => 'JALAN RINGROAD MADIUN',
            'date' => now(),
        ]);
    }
}
