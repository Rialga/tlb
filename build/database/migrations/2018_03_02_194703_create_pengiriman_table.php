<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreatePengirimanTable extends Migration
{

    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        // Schema::create('pengiriman', function (Blueprint $table) {
        //     $table->increments('id');
        //     $table->integer('produksi_id')->unsigned();
        //     $table->integer('status');
        //     $table->integer('user_id')->unsigned();
        //     $table->timestamps();
        //     $table->softDeletes();
        //     $table->foreign('produksi_id')->references('id')->on('produksis')->onDelete('cascade');
        //     $table->foreign('user_id')->references('id')->on('users')->onDelete('cascade');
        // });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        // Schema::drop('pengiriman');
    }
}
