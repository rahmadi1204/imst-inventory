<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreatePibPaymentsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('pib_payments', function (Blueprint $table) {
            $table->id();
            $table->string('no_approval');
            $table->string('no_register');
            $table->date('date_payment');
            $table->string('payment');
            $table->string('guarentee');
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
        Schema::dropIfExists('pib_payments');
    }
}
