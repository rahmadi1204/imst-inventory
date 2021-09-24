<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreatePibProductsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('pib_products', function (Blueprint $table) {
            $table->id();
            $table->string('no_approval');
            $table->string('no_register');
            $table->date('date_product');
            $table->integer('pos_product');
            $table->string('code_product');
            $table->string('type_product');
            $table->string('name_product');
            $table->string('brand_product')->nullable();
            $table->string('spec_product')->nullable();
            $table->string('country_product');
            $table->integer('qty_product');
            $table->string('unit_product')->nullable();
            $table->integer('netto_product')->nullable();
            $table->integer('qty_pack')->nullable();
            $table->string('type_pack')->nullable();
            $table->integer('value_pabean')->nullable();
            $table->string('type_pabean')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('pib_products');
    }
}
