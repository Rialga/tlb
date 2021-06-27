<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreateBatasPengadaansTable extends Migration
{

    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        // Schema::create('batas_pengadaans', function (Blueprint $table) {
        //     $table->increments('id');
        //     $table->integer('bahan_baku_id')->unsigned();
        //     $table->integer('maks_pengadaan');
        //     $table->timestamps();
        //     $table->softDeletes();
        //     $table->foreign('bahan_baku_id')->references('id')->on('bahan_bakus');
        //     $table->unique(['bahan_baku_id']);
        // });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        // Schema::drop('batas_pengadaans');
    }
}
