<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateIdentitassekolahsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('identitassekolah', function (Blueprint $table) {
            $table->id();
            $table->string('npsn', 10);
            $table->string('nama_sekolah', 50);
            $table->string('nama_kepsek', 50);
            $table->string('alamat', 100);
            $table->string('kabupaten', 25);
            $table->char('kode_pos', 10);
            $table->string('logo', 100);
            $table->char('no_telp', 15);
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('identitassekolah');
    }
}
