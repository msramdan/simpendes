<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateKaryawanTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('karyawan', function (Blueprint $table) {
            $table->bigIncrements('nip');
            $table->unsignedBigInteger('role_id');
            $table->string('nama_karyawan');
            $table->string('telp_karyawan');
            $table->string('email');
            $table->string('status');
            $table->timestamps();

            $table->foreign('role_id')->references('id')->on('role')
                    ->onUpdate('CASCADE')
                    ->onDelete('CASCADE');        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('karyawan');
    }
}
