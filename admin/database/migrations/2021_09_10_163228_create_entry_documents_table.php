<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateEntryDocumentsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        // Schema::create('entry_documents', function (Blueprint $table) {
        //     $table->id();
        //     $table->string('entry_type');
        //     $table->date('date');
        //     $table->date('entry_date');
        //     $table->string('product_code');
        //     $table->string('product_type');
        //     $table->string('product_name');
        //     $table->string('product_unit');
        //     $table->integer('product_value');
        //     $table->integer('product_pabean');
        //     $table->timestamps();
        // });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('entry_documents');
    }
}
