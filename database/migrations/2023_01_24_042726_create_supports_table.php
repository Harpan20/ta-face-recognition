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
        Schema::create('supports', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->string('icon');
            $table->softDeletes();
            $table->timestamps();
        });

        Schema::create('product_support', function (Blueprint $table) {
            $table->foreignId('product_id')->constrained('products');
            $table->foreignId('support_id')->constrained('supports');
            $table->primary(['product_id', 'support_id']);
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
        Schema::dropIfExists('supports');
    }
};
