<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        $this->call(UserSeeder::class);
        $this->call(OriginSeeder::class);
        $this->call(TypeProductSeeder::class);
        $this->call(UnitSeeder::class);
        $this->call(DestinationSeeder::class);
        $this->call(WarehouseSeeder::class);
        $this->call(SupplierSeeder::class);
        $this->call(ImportirSeeder::class);
        $this->call(MasterProductSeeder::class);
        $this->call(CurrencySeeder::class);
    }
}
