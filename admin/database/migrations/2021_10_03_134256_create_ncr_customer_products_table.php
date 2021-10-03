<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateNcrCustomerProductsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('ncr_customer_products', function (Blueprint $table) {
            $table->id();
            $table->string('code_po')->nullable();
            $table->string('code_ncrc');
            $table->string('code_ncrc_product');
            $table->string('code_product');
            $table->bigInteger('qty_product');
            $table->string('unit_product');
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
        Schema::dropIfExists('ncr_customer_products');
    }
}
