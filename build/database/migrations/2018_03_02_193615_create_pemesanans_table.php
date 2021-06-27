<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreatePemesanansTable extends Migration
{

    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('pemesanans', function (Blueprint $table) {
            $table->increments('id');
            $table->string('nama_pemesanan');
            $table->integer('produk_id')->unsigned();
            $table->double('volume_pesanan');
            $table->date('tanggal_pesanan');
            $table->date('tanggal_kirim');
            $table->string('lokasi_proyek');
            $table->integer('jenis_pesanan');
            $table->string('cp_pesanan');
            $table->integer('user_id')->unsigned();
            $table->string('keterangan');
            $table->integer('status');
            $table->timestamps();
            $table->softDeletes();
            $table->foreign('produk_id')->references('id')->on('produks')->onDelete('cascade');
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
        Schema::drop('pemesanans');
    }
}
