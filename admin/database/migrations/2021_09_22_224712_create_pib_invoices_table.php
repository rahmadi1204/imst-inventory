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
            $table->string('code_pib');
            $table->string('no_approval');
            $table->string('invoice');
            $table->date('date_invoice');
            $table->string('transaction');
            $table->date('date_transaction');
            $table->string('house_bl')->nullable();
            $table->date('date_house_bl')->nullable();
            $table->string('master_bl')->nullable();
            $table->date('date_master_bl')->nullable();
            $table->string('bc11')->nullable();
            $table->date('date_bc11')->nullable();
            $table->string('pos')->nullable();
            $table->string('sub')->nullable();
            $table->string('facility')->nullable();
            $table->string('dump')->nullable();
            $table->string('valuta')->nullable();
            $table->double('ndpbm');
            $table->double('value');
            $table->double('insurance');
            $table->double('freight');
            $table->double('pabean_value');
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
