<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateExitDocumentsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('exit_documents', function (Blueprint $table) {
            $table->id();
            $table->string('exit_type');
            $table->date('date');
            $table->date('exit_date');
            $table->string('product_code');
            $table->string('product_type');
            $table->string('product_name');
            $table->string('product_unit');
            $table->integer('product_value');
            $table->integer('product_pabean');
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
        Schema::dropIfExists('exit_documents');
    }
}
