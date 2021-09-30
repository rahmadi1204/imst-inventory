<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateReportDocumentsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('report_documents', function (Blueprint $table) {
            $table->id();
            $table->string('code_po')->nullable();
            $table->string('code_pib')->nullable();
            $table->string('code_ncrv')->nullable();
            $table->string('code_ncrc')->nullable();
            $table->string('type_in')->nullable();
            $table->string('no_in')->nullable();
            $table->date('date_in')->nullable();
            $table->date('data_product_in')->nullable();
            $table->string('code_product_in')->nullable();
            $table->string('type_product_in')->nullable();
            $table->string('name_product_in')->nullable();
            $table->string('unit_product_in')->nullable();
            $table->bigInteger('qty_product_in')->nullable();
            $table->double('value_product_in')->nullable();
            $table->string('type_out')->nullable();
            $table->string('no_out')->nullable();
            $table->date('date_out')->nullable();
            $table->date('data_product_out')->nullable();
            $table->string('code_product_out')->nullable();
            $table->string('type_product_out')->nullable();
            $table->string('name_product_out')->nullable();
            $table->string('unit_product_out')->nullable();
            $table->bigInteger('qty_product_out')->nullable();
            $table->double('value_product_out')->nullable();
            $table->string('unit_product_all')->nullable();
            $table->bigInteger('qty_product_all')->nullable();
            $table->double('value_product_all')->nullable();
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
        Schema::dropIfExists('report_documents');
    }
}
