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
        Schema::create('features', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->text('description');
            $table->softDeletes();
            $table->timestamps();
        });

        Schema::create('feature_product', function (Blueprint $table) {
            $table->foreignId('feature_id')->constrained('features');
            $table->foreignId('product_id')->constrained('products');
            $table->primary(['feature_id', 'product_id']);
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
        Schema::dropIfExists('features');
    }
};
