<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateNcrVendorsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('ncr_vendors', function (Blueprint $table) {
            $table->id();
            $table->string('code_ncrv')->unique();
            $table->integer('type_ncrv');
            $table->string('code_po');
            $table->string('no_ref');
            $table->date('date_ncrv');
            $table->string('supplier_id');
            // $table->string('name_supplier');
            $table->string('warehouse_id');
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
        Schema::dropIfExists('ncr_vendors');
    }
}
