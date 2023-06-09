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
        Schema::create('promos', function (Blueprint $table) {
            $table->id('id_promo');
            $table->string('gambar');
            $table->string('nama_promo');
            $table->text('deskripsi_promo');
            $table->timestamp('mulai_promo')->nullable();
            $table->timestamp('akhir_promo')->nullable();
            $table->string('tag_promo');
            $table->string('status_promo');
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
        Schema::dropIfExists('promos');
    }
};
