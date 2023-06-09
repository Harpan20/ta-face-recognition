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
        Schema::create('karirs', function (Blueprint $table) {
            $table->id('id_karir');
            $table->string('judul_karir');
            $table->string('posisi_karir');
            $table->string('gambar');
            $table->string('tingkat_pengalaman');
            $table->text('deskripsi_karir');
            $table->string('tag_karir');
            $table->string('status_karir')->default('Publish');
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
        Schema::dropIfExists('karirs');
    }
};
