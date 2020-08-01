<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateDetailpobelisTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('T20_D_PO_BELI', function (Blueprint $table) {
            $table->char('FK_PO_BELI',10)->primary();
            $table->char('FK_RLS_BRG_SUP',7);
            $table->integer('FQT_PO_BELI');
            $table->double('FHARGA_PO_BELI');
            $table->softDeletes();
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
        Schema::dropIfExists('T20_D_PO_BELI');
    }
}
