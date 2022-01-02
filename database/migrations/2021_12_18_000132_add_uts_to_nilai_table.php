<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddUtsToNilaiTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('nilai', function (Blueprint $table) {
            $table->integer('uts')->after('uas');
            $table->integer('uh1')->after('uts');
            $table->integer('uh2')->after('uh1');
            $table->integer('uh3')->after('uh2');
            $table->integer('uh4')->after('uh3');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('nilai', function (Blueprint $table) {
            $table->dropColumn('uts');
            $table->dropColumn('uh1');
            $table->dropColumn('uh2');
            $table->dropColumn('uh3');
            $table->dropColumn('uh4');
        });
    }
}
