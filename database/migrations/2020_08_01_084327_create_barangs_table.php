<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateBarangsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('T00_M_BRG', function (Blueprint $table) {
            $table->char('FK_BRG',7)->primary();
            $table->string('FN_BRG',50);
            $table->char('FK_SAT',3);
            $table->char('FK_JENIS',3);
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
        Schema::dropIfExists('T00_M_BRG');
    }
}
