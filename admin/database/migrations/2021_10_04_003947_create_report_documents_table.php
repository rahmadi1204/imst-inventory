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
            $table->string('product_id')->unique();
            $table->bigInteger('qty_product_in')->nullable();
            $table->bigInteger('qty_product_out')->nullable();
            $table->double('product_pabean_in')->nullable();
            $table->double('product_pabean_out')->nullable();
            $table->string('unit_product_in')->nullable();
            $table->string('unit_product_out')->nullable();
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
