<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreatePibInvoicesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('pib_invoices', function (Blueprint $table) {
            $table->id();
            $table->string('no_approval');
            $table->string('no_register');
            $table->string('invoice');
            $table->date('date_invoice');
            $table->string('transaction');
            $table->date('date_transaction');
            $table->string('house_bl');
            $table->date('date_house_bl');
            $table->string('master_bl');
            $table->date('date_master_bl');
            $table->string('bc11');
            $table->date('date_bc11');
            $table->string('pos');
            $table->string('sub');
            $table->string('facility');
            $table->string('dump');
            $table->string('valuta');
            $table->integer('ndpbm');
            $table->integer('value');
            $table->integer('insurance');
            $table->integer('freight');
            $table->integer('pabean_value');
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
        Schema::dropIfExists('pib_invoices');
    }
}
