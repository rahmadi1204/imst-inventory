<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreatePibContainersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('pib_containers', function (Blueprint $table) {
            $table->id();
            $table->string('code_pib');
            $table->string('no_approval')->nullable();
            $table->string('no_container')->nullable();
            $table->string('size_container')->nullable();
            $table->string('type_container')->nullable();
            $table->bigInteger('qty_container')->nullable();
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
        Schema::dropIfExists('pib_containers');
    }
}
