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
        Schema::create('produks', function (Blueprint $table) {
            $table->id('id_produk');
            $table->string('thumbnail_produk');
            $table->string('banner_produk');
            $table->string('nama_produk');
            $table->text('deskripsi_produk');
            $table->string('bunga_produk');
            $table->string('nominal_min');
            $table->string('nominal_max');
            $table->string('range_min');
            $table->string('range_max');
            $table->string('range');
            $table->string('jangka_min');
            $table->string('jangka_max');
            $table->integer('kelipatan');
            $table->integer('nominal_kelipatan');
            $table->string('kategori_produk');
            $table->string('tag_produk');
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
        Schema::dropIfExists('produks');
    }
};
