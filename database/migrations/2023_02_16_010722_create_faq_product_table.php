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
        Schema::create('faq_product', function (Blueprint $table) {
            // $table->unsignedBigInteger('faq_id');
            // $table->unsignedBigInteger('product_id');

            // $table->foreign('faq_id')->references('id')->on('faqs')->onDelete('cascade');
            // $table->foreign('product_id')->references('id')->on('products')->onDelete('cascade');

            // $table->foreignId('faq_id')->constrained('faqs');
            // $table->foreignId('product_id')->constrained('products');
            // $table->primary(['faq_id', 'product_id']);
            $table->id();
            $table->foreignId('faq_id')->constrained();
            $table->foreignId('product_id')->constrained();
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
        Schema::dropIfExists('faq_product');
    }
};
