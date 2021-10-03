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
            $table->date('date_ncrc');
            $table->string('no_ncrc')->nullable();
            $table->string('name_warehouse');
            $table->string('name_customer');
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
