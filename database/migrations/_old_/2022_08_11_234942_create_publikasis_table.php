<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('publikasis', function (Blueprint $table) {
            $table->id('id_publikasi');
            $table->string('nama_laporan');
            $table->string('bulan_awal');
            $table->string('bulan_akhir');
            $table->string('tahun');
            $table->string('dokumen_publikasi');
            $table->text('deskripsi_publikasi');
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
        Schema::dropIfExists('publikasis');
    }
};
