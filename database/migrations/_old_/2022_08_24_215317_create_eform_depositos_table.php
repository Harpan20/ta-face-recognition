<?php

use App\Enums\EformStatus;
use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

return new class extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('eform_depositos', function (Blueprint $table) {
            $table->id('id_eform_deposito');
            $table->string('jenis_identitas');
            $table->string('nama_lengkap');
            $table->string('email')->nullable();
            $table->string('jenis_kelamin');
            $table->string('pekerjaan');
            $table->string('rencana_nominal');
            $table->string('pendidikan_terakhir');
            $table->string('nomor_identitas');
            $table->string('nama_ibu');
            $table->string('nomor_telpon');
            $table->string('jenis_deposito');
            $table->string('jangka_waktu');
            $table->string('status')->default(EformStatus::Menunggu->value);
            // $table->string('status');
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
        Schema::dropIfExists('eform_depositos');
    }
};
