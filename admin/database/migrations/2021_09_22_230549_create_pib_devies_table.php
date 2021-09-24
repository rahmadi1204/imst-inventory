<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreatePibDeviesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('pib_devies', function (Blueprint $table) {
            $table->id();
            $table->string('no_approval');
            $table->string('no_register');
            $table->integer('bm_paid');
            $table->integer('bm_borne');
            $table->integer('bm_delay');
            $table->integer('bm_taxfree');
            $table->integer('bm_free');
            $table->integer('bm_paidoff');
            $table->integer('bmt_paid');
            $table->integer('bmt_borne');
            $table->integer('bmt_delay');
            $table->integer('bmt_taxfree');
            $table->integer('bmt_free');
            $table->integer('bmt_paidoff');
            $table->integer('cukai_paid');
            $table->integer('cukai_borne');
            $table->integer('cukai_delay');
            $table->integer('cukai_taxfree');
            $table->integer('cukai_free');
            $table->integer('cukai_paidoff');
            $table->integer('ppn_paid');
            $table->integer('ppn_borne');
            $table->integer('ppn_delay');
            $table->integer('ppn_taxfree');
            $table->integer('ppn_free');
            $table->integer('ppn_paidoff');
            $table->integer('ppnbm_paid');
            $table->integer('ppnbm_borne');
            $table->integer('ppnbm_delay');
            $table->integer('ppnbm_taxfree');
            $table->integer('ppnbm_free');
            $table->integer('ppnbm_paidoff');
            $table->integer('pph_paid');
            $table->integer('pph_borne');
            $table->integer('pph_delay');
            $table->integer('pph_taxfree');
            $table->integer('pph_free');
            $table->integer('pph_paidoff');
            $table->integer('total_paid');
            $table->integer('total_borne');
            $table->integer('total_delay');
            $table->integer('total_taxfree');
            $table->integer('total_free');
            $table->integer('total_paidoff');
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
        Schema::dropIfExists('pib_devies');
    }
}
