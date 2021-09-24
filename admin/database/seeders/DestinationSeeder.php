<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class DestinationSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('destinations')->insert([
            [
                'code_destination' => 'ldp',
                'destination' => 'Luar Daerah Pabean',
            ], [
                'code_destination' => 'tdp',
                'destination' => 'Tempat Lain Daerah Pabean',
            ], [
                'code_destination' => 'gbl',
                'destination' => 'Gudang Berikat lainnya',
            ], [
                'code_destination' => 'kbt',
                'destination' => 'Kawasan Berikat',
            ], [
                'code_destination' => 'plb',
                'destination' => 'Pusat Logistik Berikat',
            ], [
                'code_destination' => 'kbs',
                'destination' => 'Industri Dalam Kawasan Bebas',
            ], [
                'code_destination' => 'kek',
                'destination' => 'Industri Dalam Kawasan Khusus',
            ], [
                'code_destination' => 'kel',
                'destination' => 'Industri Dalam Kawasan Ekonomi',
            ], [
                'code_destination' => 'idp',
                'destination' => 'Industri Dalam Pebean',
            ], [
                'code_destination' => 'tpb',
                'destination' => 'Tempaat Penimbunan Berikat',
            ], [
                'code_destination' => 'kdp',
                'destination' => 'Kawasan Lainnya Ditetapkan Pemerintah',
            ]
        ]);
    }
}
