<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreatePosTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('pos', function (Blueprint $table) {
            $table->id();
            $table->string('no_po')->unique();
            $table->string('code_po')->unique();
            $table->string('project');
            $table->date('date_po');
            $table->string('code_supplier');
            $table->string('send_address');
            $table->string('address_warehouse');
            $table->string('currency');
            $table->integer('total_amount_po');
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
        Schema::dropIfExists('pos');
    }
}
