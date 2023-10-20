<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('products', function (Blueprint $table) {
            $table->id();
            $table->string('stripe_product_id');
            $table->string('name');
            $table->string('slug');
            $table->string('featured_img');
            $table->string('images')->nullable();
            $table->string('category_id');
            $table->text('description');
            $table->text('direction');
            $table->text('ingredients');
            $table->text('lab_results');
            $table->integer('home_page_status')->default(0);
            $table->integer('status')->default(1);
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('products');
    }
};
