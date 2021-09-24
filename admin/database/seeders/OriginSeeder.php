<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class OriginSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('origin_goods')->insert([
            [
                'code_origin' => 'ldp',
                'origin' => 'LUAR DAEARAH PABEAN',
            ], [
                'code_origin' => 'gbl',
                'origin' => 'GUDANG BERIKAT LAINNYA',
            ], [
                'code_origin' => 'plbl',
                'origin' => 'PUSAT LOGISTIK BERIKAT YANG BERASAL DARI LUAR DAERAH PABEAN',
            ], [
                'code_origin' => 'kbb',
                'origin' => 'KAWASAN BEBAS ATAS BARANG YANG BERASAL DARI LUAR DAERAH PABEAN',
            ], [
                'code_origin' => 'kekb',
                'origin' => 'KEK ATAS BARANG YANG BERASAL DARI LUAR DAERAH PABEAN',
            ], [
                'code_origin' => 'kel',
                'origin' => 'KAWASAN EKONOMI LAINNYA YANG DITETAPKAN OLEH PEMERINTAH ATAS BARANG YANG BERASAL DARI LUAR DAEARAH PABEAN',
            ], [
                'code_origin' => 'tld',
                'origin' => 'TEMPAT LAIN DALAM DAERAH PABEAN',
            ], [
                'code_origin' => 'kbe',
                'origin' => 'KAWASAN BERIKAT',
            ], [
                'code_origin' => 'plb',
                'origin' => 'PUSAT LOGISTIK BERIKAT',
            ], [
                'code_origin' => 'kbeb',
                'origin' => 'KAWASAN BEBAS',
            ], [
                'code_origin' => 'kek',
                'origin' => 'KAWASAN EKONOMU KHUSUS',
            ]
        ]);
    }
}
