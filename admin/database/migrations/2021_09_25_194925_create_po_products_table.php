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
            $table->string('code_po');
            $table->string('code_po_product');
            $table->string('product_id');
            $table->string('description')->nullable();
            $table->date('latest')->nullable();
            $table->bigInteger('qty_product')->default(0);
            $table->bigInteger('qty_recived')->default(0);
            $table->double('unit_price')->default(0);
            $table->double('total_amount')->default(0);
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
