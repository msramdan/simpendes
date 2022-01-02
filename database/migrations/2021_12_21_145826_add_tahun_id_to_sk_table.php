<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddTahunIdToSkTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('sk', function (Blueprint $table) {
            $table->unsignedBigInteger('tahun_id');

            $table->foreign('tahun_id')->references('id')->on('tahun_ajaran')
                    ->onUpdate('CASCADE')
                    ->onDelete('CASCADE');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('sk', function (Blueprint $table) {
            $table->dropColumn('tahun_id');
        });
    }
}
