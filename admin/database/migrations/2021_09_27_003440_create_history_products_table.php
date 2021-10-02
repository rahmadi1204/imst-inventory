<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateHistoryProductsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('history_products', function (Blueprint $table) {
            $table->id();
            $table->string('code_po')->nullable();
            $table->string('code_pib')->nullable();
            $table->string('code_ncrv')->nullable();
            $table->string('code_ncrc')->nullable();
            $table->string('code_po_product')->nullable();
            $table->string('code_pib_product')->nullable();
            $table->string('code_ncrv_product')->nullable();
            $table->string('code_ncrc_product')->nullable();
            $table->string('code_product');
            $table->string('date_product');
            $table->double('product_pabean')->nullable();
            $table->bigInteger('type_history');
            $table->bigInteger('qty_product');
            $table->string('unit_product');
            $table->string('from');
            $table->string('to');
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
        Schema::dropIfExists('history_products');
    }
}
