<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateNcrVendorProductsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('ncr_vendor_products', function (Blueprint $table) {
            $table->id();
            $table->string('code_po');
            $table->integer('type_ncrv');
            $table->string('code_ncrv');
            $table->string('code_ncrv_product');
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
        Schema::dropIfExists('ncr_vendor_products');
    }
}
