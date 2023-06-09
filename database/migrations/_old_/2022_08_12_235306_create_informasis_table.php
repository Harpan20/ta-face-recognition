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
        Schema::create('informasis', function (Blueprint $table) {
            $table->id('id_informasi');
            $table->string('nama_kantor');
            $table->text('deskripsi_informasi');
            $table->text('alamat_kantor');
            $table->string('no_telpon');
            $table->string('nomor_wa');
            $table->string('instagram');
            $table->string('facebook');
            $table->string('youtube');
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
        Schema::dropIfExists('informasis');
    }
};
