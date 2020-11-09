<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreatePelanggaransTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('tabel_pelanggaran', function (Blueprint $table) {
            $table->id();
            $table->date('tanggal');
            $table->enum('jenispelanggara',['BERAT','SEDANG','RINGAN']);
            $table->string('nis');
            $table->longText('keterangan');
            $table->longText('solusi');
            $table->enum('proses',['Y','N']);
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
        Schema::dropIfExists('tabel_pelanggaran');
    }
}
