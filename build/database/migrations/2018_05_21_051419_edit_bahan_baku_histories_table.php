<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class EditBahanBakuHistoriesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('bahan_baku_histories', function (Blueprint $table) {
            $table->datetime('waktu')->after('total_sisa');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('bahan_baku_histories', function (Blueprint $table) {
            $table->dropColumn('waktu');
        });
    }
}
