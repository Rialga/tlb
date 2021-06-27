<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class AddVolumeColumnToBahanBakuHistoriesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('bahan_baku_histories', function (Blueprint $table) {
            $table->double('volume')->after('opname_id');
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
            $table->dropColumn('volume');
        });
    }
}
