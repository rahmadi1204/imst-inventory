<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class TypeProductSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('type_products')->insert([
            [
                'code_type_product' => 'bpe',
                'type_product' => 'Bahan Penolong',
            ], [
                //     'code_type_product' => 'bja',
                //     'type_product' => 'Barang Jadi',
                // ], [
                'code_type_product' => 'bba',
                'type_product' => 'Bahan Baku',
                // ], [
                //     'code_type_product' => 'wip',
                //     'type_product' => 'WIP',
                // ], [
                //     'code_type_product' => 'scr',
                //     'type_product' => 'Scrap',
                // ], [
                //     'code_type_product' => 'msn',
                //     'type_product' => 'Mesin',
                // ], [
                //     'code_type_product' => 'pka',
                //     'type_product' => 'Peralatan Kantor',
                // ], [
                //     'code_type_product' => 'spr',
                //     'type_product' => 'Sparepart',
            ]
        ]);
    }
}
