<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddKaryawanIdToKelasTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('kelas', function (Blueprint $table) {
            $table->unsignedBigInteger('karyawan_id')->after('tahun_id');

            $table->foreign('karyawan_id')->references('nip')->on('karyawan')
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
        Schema::table('kelas', function (Blueprint $table) {
            $table->dropColumn('karyawan_id');
        });
    }
}
