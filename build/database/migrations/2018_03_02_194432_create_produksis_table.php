<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreateProduksisTable extends Migration
{

    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('produksis', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('pemesanan_id')->unsigned();
            $table->double('volume');
            $table->integer('semen');
            $table->integer('pasir');
            $table->integer('split');
            $table->integer('addictive');
            $table->integer('air');
            $table->datetime('waktu_produksi');
            $table->integer('supir_id')->unsigned();
            $table->string('no_kendaraan');
            $table->integer('user_id')->unsigned();
            $table->timestamps();
            $table->softDeletes();
            $table->foreign('pemesanan_id')->references('id')->on('pemesanans')->onDelete('cascade');
            $table->foreign('supir_id')->references('id')->on('supirs')->onDelete('cascade');
            $table->foreign('user_id')->references('id')->on('users')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::drop('produksis');
    }
}
