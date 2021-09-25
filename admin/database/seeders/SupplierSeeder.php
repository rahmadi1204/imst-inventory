<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class SupplierSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('suppliers')->insert([
            [
                'code_supplier' => 'JT',
                'name_supplier' => 'JIANGSU TEDRAIL',
                'address_supplier' => 'NO.8 GANG AO ROAD, ZHANGJIAGANG',
                'date' => now(),
            ], [
                'code_supplier' => 'WC',
                'name_supplier' => 'WABTEC CORPORATION',
                'address_supplier' => 'FBO STANDART',
                'date' => now(),
            ]
        ]);
    }
}
