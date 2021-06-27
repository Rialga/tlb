<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class EditProduksisTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('produksis', function (Blueprint $table) {
            $table->string('nomor_dokumen')->after('id');
            $table->string('nama_pengirim')->after('nomor_dokumen');
            $table->string('nama_penerima')->after('nama_pengirim');
            $table->unique('nomor_dokumen');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('produksis', function (Blueprint $table) {
            $table->dropUnique('nomor_dokumen');
            $table->dropColumn('nomor_dokumen');
            $table->dropColumn('nama_pengirim');
            $table->dropColumn('nama_penerima');
        });
    }
}
