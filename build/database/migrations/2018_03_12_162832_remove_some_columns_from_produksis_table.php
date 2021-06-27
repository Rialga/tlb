<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class RemoveSomeColumnsFromProduksisTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('produksis', function (Blueprint $table) {
            $table->dropColumn('semen');
            $table->dropColumn('pasir');
            $table->dropColumn('split');
            $table->dropColumn('addictive');
            $table->dropColumn('air');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('produksis', function (Blueprint $table) {
            $table->integer('semen');
            $table->integer('pasir');
            $table->integer('split');
            $table->integer('addictive');
            $table->integer('air');
        });
    }
}
