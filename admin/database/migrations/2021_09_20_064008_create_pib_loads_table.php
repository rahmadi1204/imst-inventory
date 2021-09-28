<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreatePibLoadsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('pib_loads', function (Blueprint $table) {
            $table->id();
            $table->string('code_pib');
            $table->string('no_approval');
            $table->string('no_register')->nullable();
            $table->date('date_register')->nullable();
            $table->string('way_transport');
            $table->string('name_transport');
            $table->date('date_estimate');
            $table->string('load_place');
            $table->string('load_transit');
            $table->string('load_destination');
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
        Schema::dropIfExists('pib_loads');
    }
}
