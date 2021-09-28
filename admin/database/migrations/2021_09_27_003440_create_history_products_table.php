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
            $table->string('no_approval');
            $table->string('code_pib');
            $table->string('code_product');
            $table->string('name_product');
            $table->string('date_product');
            $table->bigInteger('type_history');
            $table->string('from');
            $table->string('to');
            $table->bigInteger('qty_product');
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
