<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreatePibsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('pibs', function (Blueprint $table) {
            $table->id();
            $table->string('code_pib')->unique();
            $table->string('type_document_pabean')->nullable();
            $table->string('office_pabean')->nullable();
            $table->string('no_approval')->unique();
            $table->string('code_po')->nullable();
            $table->string('no_po')->nullable();
            $table->string('type_pib')->nullable();
            $table->string('type_import')->nullable();
            $table->string('payment_method')->nullable();
            $table->string('code_supplier')->nullable();
            $table->string('name_seller')->nullable();
            $table->string('address_seller')->nullable();
            $table->string('nik_importir')->nullable();
            $table->string('name_importir')->nullable();
            $table->string('address_importir')->nullable();
            $table->string('status_importir')->nullable();
            $table->string('apiu')->nullable();
            $table->string('name_owner')->nullable();
            $table->string('address_owner')->nullable();
            $table->string('name_ppjk')->nullable();
            $table->string('npwp_ppjk')->nullable();
            $table->string('np_ppjk')->nullable();
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
        Schema::dropIfExists('pibs');
    }
}
