<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateImportirsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('importirs', function (Blueprint $table) {
            $table->id();
            $table->string('nik_importir');
            $table->string('name_importir');
            $table->string('address_importir');
            $table->string('status_importir');
            $table->string('apiu');
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
        Schema::dropIfExists('importirs');
    }
}
