<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddTahunIdToSilabusTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('silabus', function (Blueprint $table) {
            //$table->string('keterangan')->after('file_silabus');
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
        Schema::table('silabus', function (Blueprint $table) {
            $table->dropColumn('keterangan');
            $table->dropColumn('tahun_id');
        });
    }
}
