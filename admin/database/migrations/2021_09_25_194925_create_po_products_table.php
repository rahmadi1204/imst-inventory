<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreatePoProductsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('po_products', function (Blueprint $table) {
            $table->id();
            $table->string('no_po');
            $table->string('code_product');
            $table->string('type_product');
            $table->string('name_product');
            $table->string('description')->nullable();
            $table->date('latest');
            $table->bigInteger('qty_product');
            $table->bigInteger('qty_recived');
            $table->double('unit_price');
            $table->double('total_amount');
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
        Schema::dropIfExists('po_products');
    }
}
