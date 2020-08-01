<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateSuppliersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('T00_M_SUPP', function (Blueprint $table) {
					$table->char('FK_SUP', 5)->primary();
					$table->string('FN_SUP', 50);
					$table->string('FTELP', 12);
					$table->string('FKONTAK_SUP', 20);
					$table->char('FK_PROV', 2);
					$table->char('FK_KO_KAB', 4);
					$table->char('FK_KEC', 7);
					$table->char('FK_KEL_DES', 10);
					$table->char('FK_RT', 3);
					$table->char('FK_RW', 3);
					$table->char('FKODE_POS', 5);
					$table->text('FN_ALAMAT');
					$table->char('FN_NPWP', 15);
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
        Schema::dropIfExists('T00_M_SUPP');
    }
}
