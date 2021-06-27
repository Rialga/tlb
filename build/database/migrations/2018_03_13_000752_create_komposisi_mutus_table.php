<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreateKomposisiMutusTable extends Migration
{

    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('komposisi_mutu', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('produk_id')->unsigned();
            $table->integer('bahan_baku_id')->unsigned();
            $table->double('volume');
            $table->timestamps();
            $table->softDeletes();
            $table->foreign('produk_id')->references('id')->on('produks');
            $table->foreign('bahan_baku_id')->references('id')->on('bahan_bakus');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::drop('komposisi_mutu');
    }
}
