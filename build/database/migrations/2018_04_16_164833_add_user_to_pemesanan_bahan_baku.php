<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class AddUserToPemesananBahanBaku extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('pemesanan_bahan_bakus', function (Blueprint $table) {
            $table->integer('user_id')->unsigned()->after('keterangan');

            $table->foreign('user_id')->references('id')->on('users')->onDelete('cascade');
            $table->foreign('bahan_baku_id')->references('id')->on('bahan_bakus')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('pemesanan_bahan_bakus', function (Blueprint $table) {
            $table->dropColumn('user_id');
            $table->dropForeign(['user_id', 'bahan_baku_id']);
        });
    }
}
