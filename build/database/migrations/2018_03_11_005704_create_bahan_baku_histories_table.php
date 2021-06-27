<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreateBahanBakuHistoriesTable extends Migration
{

    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('bahan_baku_histories', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('bahan_baku_id')->unsigned();
            $table->integer('type');
            $table->integer('pengadaan_id')->unsigned()->nullable();
            $table->integer('produksi_id')->unsigned()->nullable();
            $table->integer('opname_id')->unsigned()->nullable();
            $table->double('total_sisa');
            $table->timestamps();
            $table->softDeletes();
            $table->foreign('bahan_baku_id')->references('id')->on('bahan_bakus');
            $table->foreign('pengadaan_id')->references('id')->on('pengadaans');
            $table->foreign('produksi_id')->references('id')->on('produksis');
            $table->foreign('opname_id')->references('id')->on('opnames');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::drop('bahan_baku_histories');
    }
}
