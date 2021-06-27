<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreateKendaraanDetailsTable extends Migration
{

    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('kendaraan_details', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('kendaraan_id')->unsigned();
            $table->integer('status');
            $table->datetime('waktu');
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
        Schema::drop('kendaraan_details');
    }
}
