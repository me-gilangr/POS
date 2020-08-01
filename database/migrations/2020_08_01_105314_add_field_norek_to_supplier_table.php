<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddFieldNorekToSupplierTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('T00_M_SUPP', function (Blueprint $table) {
					$table->string('FNO_REK', 25)->after('FN_NPWP');
				});
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('T00_M_SUPP', function (Blueprint $table) {
					$table->dropColumn('FNO_REK');
				});
    }
}
