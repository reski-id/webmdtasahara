<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateSiswabarusTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('tabel_siswabaru', function (Blueprint $table) {
            $table->id();
            $table->string('idpendaftaran');
            $table->string('Nama');
            $table->enum('JenisKelamin',['Laki-Laki','Perempuan']);
            $table->string('TempatLahir');
            $table->date('TanggalLahir');
            $table->string('Agama');
            $table->longText('Alamat');
            $table->string('namaOrtu');
            $table->string('nohpOrtu');
            $table->enum('Proses',['Y','N']);
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
        Schema::dropIfExists('tabel_siswabaru');
    }
}
