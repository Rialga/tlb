<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class ChangePemesanansTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('pemesanans', function (Blueprint $table) {
            $table->renameColumn('tanggal_kirim', 'tanggal_kirim_dari');
            $table->datetime('tanggal_kirim_sampai')->after('tanggal_kirim')->nullable();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('pemesanans', function (Blueprint $table) {
            $table->renameColumn('tanggal_kirim_dari', 'tanggal_kirim');
            $table->dropColumn('tanggal_kirim_sampai');
        });
    }
}
