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
        Schema::create('tahunans', function (Blueprint $table) {
            $table->id('id_tahunan');
            $table->string('nama_tahunan');
            $table->string('tahun');
            $table->string('dokumen_tahunan');
            $table->text('deskripsi');
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
        Schema::dropIfExists('tahunans');
    }
};
