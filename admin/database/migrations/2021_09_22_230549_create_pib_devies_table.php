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
            $table->double('bm_paid')->nullable();
            $table->double('bm_borne')->nullable();
            $table->double('bm_delay')->nullable();
            $table->double('bm_taxfree')->nullable();
            $table->double('bm_free')->nullable();
            $table->double('bm_paidoff')->nullable();
            $table->double('bmt_paid')->nullable();
            $table->double('bmt_borne')->nullable();
            $table->double('bmt_delay')->nullable();
            $table->double('bmt_taxfree')->nullable();
            $table->double('bmt_free')->nullable();
            $table->double('bmt_paidoff')->nullable();
            $table->double('cukai_paid')->nullable();
            $table->double('cukai_borne')->nullable();
            $table->double('cukai_delay')->nullable();
            $table->double('cukai_taxfree')->nullable();
            $table->double('cukai_free')->nullable();
            $table->double('cukai_paidoff')->nullable();
            $table->double('ppn_paid')->nullable();
            $table->double('ppn_borne')->nullable();
            $table->double('ppn_delay')->nullable();
            $table->double('ppn_taxfree')->nullable();
            $table->double('ppn_free')->nullable();
            $table->double('ppn_paidoff')->nullable();
            $table->double('ppnbm_paid')->nullable();
            $table->double('ppnbm_borne')->nullable();
            $table->double('ppnbm_delay')->nullable();
            $table->double('ppnbm_taxfree')->nullable();
            $table->double('ppnbm_free')->nullable();
            $table->double('ppnbm_paidoff')->nullable();
            $table->double('pph_paid')->nullable();
            $table->double('pph_borne')->nullable();
            $table->double('pph_delay')->nullable();
            $table->double('pph_taxfree')->nullable();
            $table->double('pph_free')->nullable();
            $table->double('pph_paidoff')->nullable();
            $table->double('total_paid');
            $table->double('total_borne');
            $table->double('total_delay');
            $table->double('total_taxfree');
            $table->double('total_free');
            $table->double('total_paidoff');
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
