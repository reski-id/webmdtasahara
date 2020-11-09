<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateGurusTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('tabel_guru', function (Blueprint $table) {
            $table->id();
            $table->string('Nama');
            $table->enum('JenisKelamin',['Laki-Laki','Perempuan']);
            $table->string('TempatLahir');
            $table->enum('Pendidikan',['SMA Sederajat','S1','S2','S3']);
            $table->date('TanggalLahir');
            $table->string('Agama');
            $table->longText('Alamat');
            $table->string('NoHp');
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
        Schema::dropIfExists('tabel_guru');
    }
}
