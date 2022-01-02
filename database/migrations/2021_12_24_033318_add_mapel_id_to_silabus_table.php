<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddMapelIdToSilabusTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('silabus', function (Blueprint $table) {
            $table->unsignedBigInteger('mapel_id');

            $table->foreign('mapel_id')->references('id')->on('mapel')
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
            $table->dropColumn('mapel_id');
        });
    }
}
