<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateKasTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('tabel_kas', function (Blueprint $table) {
            $table->bigIncrements('id');

            $table->text('keterangan');
            $table->date('tgl');
            $table->integer('jumlah');
            $table->enum('jenis',['Uang_Masuk','Uang_Keluar']);

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
        Schema::dropIfExists('tabel_kas');
    }
}
