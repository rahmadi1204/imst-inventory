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
            $table->integer('bm_paid')->nullable();
            $table->integer('bm_borne')->nullable();
            $table->integer('bm_delay')->nullable();
            $table->integer('bm_taxfree')->nullable();
            $table->integer('bm_free')->nullable();
            $table->integer('bm_paidoff')->nullable();
            $table->integer('bmt_paid')->nullable();
            $table->integer('bmt_borne')->nullable();
            $table->integer('bmt_delay')->nullable();
            $table->integer('bmt_taxfree')->nullable();
            $table->integer('bmt_free')->nullable();
            $table->integer('bmt_paidoff')->nullable();
            $table->integer('cukai_paid')->nullable();
            $table->integer('cukai_borne')->nullable();
            $table->integer('cukai_delay')->nullable();
            $table->integer('cukai_taxfree')->nullable();
            $table->integer('cukai_free')->nullable();
            $table->integer('cukai_paidoff')->nullable();
            $table->integer('ppn_paid')->nullable();
            $table->integer('ppn_borne')->nullable();
            $table->integer('ppn_delay')->nullable();
            $table->integer('ppn_taxfree')->nullable();
            $table->integer('ppn_free')->nullable();
            $table->integer('ppn_paidoff')->nullable();
            $table->integer('ppnbm_paid')->nullable();
            $table->integer('ppnbm_borne')->nullable();
            $table->integer('ppnbm_delay')->nullable();
            $table->integer('ppnbm_taxfree')->nullable();
            $table->integer('ppnbm_free')->nullable();
            $table->integer('ppnbm_paidoff')->nullable();
            $table->integer('pph_paid')->nullable();
            $table->integer('pph_borne')->nullable();
            $table->integer('pph_delay')->nullable();
            $table->integer('pph_taxfree')->nullable();
            $table->integer('pph_free')->nullable();
            $table->integer('pph_paidoff')->nullable();
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
