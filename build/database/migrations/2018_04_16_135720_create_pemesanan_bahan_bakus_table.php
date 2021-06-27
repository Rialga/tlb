<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreatePemesananBahanBakusTable extends Migration
{

    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('pemesanan_bahan_bakus', function (Blueprint $table) {
            $table->increments('id');
            $table->string('nama_supplier');
            $table->integer('cp_supplier');
            $table->integer('bahan_baku_id')->unsigned();
            $table->double('volume_pemesanan');
            $table->date('tanggal_pemesanan');
            $table->string('keterangan');
            $table->timestamps();
            $table->softDeletes();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::drop('pemesanan_bahan_bakus');
    }
}
