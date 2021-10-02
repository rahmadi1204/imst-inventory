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
            $table->string('code_pib');
            $table->string('code_po');
            $table->string('code_po_product');
            $table->string('code_pib_product');
            $table->string('no_approval');
            $table->string('no_po');
            $table->date('date_product');
            $table->bigInteger('pos_product');
            $table->string('code_product');
            $table->string('country_product');
            $table->bigInteger('qty_product');
            $table->string('unit_product')->nullable();
            $table->double('netto_product')->nullable();
            $table->bigInteger('qty_pack')->nullable();
            $table->string('type_pack')->nullable();
            $table->double('product_pabean')->nullable();
            $table->bigInteger('qty_type_product')->nullable();
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
