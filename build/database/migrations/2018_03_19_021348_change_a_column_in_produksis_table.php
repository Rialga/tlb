<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class ChangeAColumnInProduksisTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('produksis', function (Blueprint $table) {
            $table->dropColumn('no_kendaraan');
            $table->integer('kendaraan_id')->unsigned();
            $table->foreign('kendaraan_id')
                  ->references('id')
                  ->on('kendaraans')
                  ->onDelete('cascade')
                  ->onUpdate('cascade');
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
            $table->string('no_kendaraan');
            $table->dropColumn('kendaraan_id');
        });
    }
}
