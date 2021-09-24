<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class UnitSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('units')->insert([
            [
                'unit' => "Pcs"
            ],
            [
                'unit' => "Box"
            ],
            [
                'unit' => "Kg"
            ],
            [
                'unit' => "Container"
            ],
            [
                'unit' => "Unit"
            ],
        ]);
    }
}
