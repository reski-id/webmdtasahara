<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateTunggakansiswasTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('tabel_tunggakan', function (Blueprint $table) {
            $table->id();
            $table->string('idtunggakan');
            $table->date('tanggal');
            $table->string('NIS');
            $table->integer('jumlah');
            $table->string('idkategori');
            $table->string('kettungakan');
            $table->date('tgl_jatuhtempo');
            $table->date('tgl_bayar');
            $table->enum('jenis_pembayaran',['Cash','Transfer']);
            $table->enum('proses',['Y','N','O']);
            $table->longText('pesan');
            $table->longText('bukti_bayar');
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
        Schema::dropIfExists('tabel_tunggakan');
    }
}
