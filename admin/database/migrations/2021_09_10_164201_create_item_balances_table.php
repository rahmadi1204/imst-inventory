<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateItemBalancesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        // Schema::create('item_balances', function (Blueprint $table) {
        //     $table->id();
        //     $table->string('product_code');
        //     $table->string('product_name');
        //     $table->integer('product_value');
        //     $table->string('product_unit');
        //     $table->integer('product_pabean');
        //     $table->timestamps();
        // });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('item_balances');
    }
}
