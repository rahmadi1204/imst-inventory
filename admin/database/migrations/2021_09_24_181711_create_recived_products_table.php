<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateRecivedProductsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('recived_products', function (Blueprint $table) {
            $table->id();
            $table->string('no_po');
            $table->string('code_product');
            $table->string('name_product');
            $table->string('type_product');
            $table->integer('qty_po')->nullable();
            $table->integer('qty_pib')->nullable();
            $table->integer('qty_less')->nullable();
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
        Schema::dropIfExists('recived_products');
    }
}
