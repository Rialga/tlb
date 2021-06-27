<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class EditKendaraan extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('kendaraans', function (Blueprint $table) {
            $table->date('masa_pajak')->after('no_polisi');
            $table->date('masa_stnk')->after('masa_pajak');
            $table->date('masa_kir')->after('masa_stnk');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('kendaraans', function (Blueprint $table) {
            $table->dropColumn('masa_pajak');
            $table->dropColumn('masa_stnk');
            $table->dropColumn('masa_kir');
        });
    }
}
