<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class AddRelationToTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('pengadaans', function (Blueprint $table) {
            switch (env('DB_CONNECTION')) {
            case 'mysql':
              DB::statement('SET FOREIGN_KEY_CHECKS=0;');
              $table->dropColumn('supplier');
              $table->integer('pemesanan_bahan_baku_id')->after('berat')->unsigned();
              $table->foreign('pemesanan_bahan_baku_id')->references('id')->on('pemesanan_bahan_bakus')->onDelete('cascade');
              DB::statement('SET FOREIGN_KEY_CHECKS=1;');
              break;
            default:
              $table->dropColumn('supplier');
              $table->integer('pemesanan_bahan_baku_id')->after('berat')->unsigned();
              $table->foreign('pemesanan_bahan_baku_id')->references('id')->on('pemesanan_bahan_bakus')->onDelete('cascade');
              break;
          }
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        $table->string('supplier');
        $table->dropForeign(['pemesanan_bahan_baku_id']);
        $table->dropColumn(pemesanan_bahan_baku_id);
    }
}
