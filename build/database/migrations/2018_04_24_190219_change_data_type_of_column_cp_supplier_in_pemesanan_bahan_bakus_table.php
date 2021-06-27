<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class ChangeDataTypeOfColumnCpSupplierInPemesananBahanBakusTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('pemesanan_bahan_bakus', function (Blueprint $table) {
            $table->string('cp_supplier')->change();
            $table->datetime('tanggal_pemesanan')->change();
            $table->string('keterangan')->nullable()->change();
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
            $table->string('cp_supplier')->change();
            $table->date('tanggal_pemesanan')->change();
            $table->string('keterangan')->change();
        });
    }
}
