<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateNcrCustomersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('ncr_customers', function (Blueprint $table) {
            $table->id();
            $table->string('code_ncrc')->unique();
            $table->string('code_po')->nullable();
            $table->integer('type_ncrc');
            $table->date('date_ncrc');
            $table->string('no_ref')->nullable();
            $table->string('warehouse_id');
            $table->string('customer_id');
            $table->string('way_transport');
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
        Schema::dropIfExists('ncr_customers');
    }
}
