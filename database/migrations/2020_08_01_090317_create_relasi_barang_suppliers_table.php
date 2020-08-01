<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateRelasiBarangSuppliersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('T10_RLS_BRG_SUPP', function (Blueprint $table) {
            $table->char('FK_BRG',7);
            $table->char('FK_RLS_BRG_SUP',25);
            $table->string('FK_PART_SUP',25);
            $table->string('FN_BRG_SUP',50);
            $table->string('FK_SUP',5);
            $table->double('FHARGA');
            $table->double('F_MARGIN');
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
        Schema::dropIfExists('T10_RLS_BRG_SUPP');
    }
}
