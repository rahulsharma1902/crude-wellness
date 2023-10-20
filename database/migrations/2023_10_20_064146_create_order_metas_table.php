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
        Schema::create('order_metas', function (Blueprint $table) {
            $table->id();
            $table->integer('order_id');
            $table->integer('price');
            $table->integer('quantity');
            $table->integer('total_price');
            $table->string('stripe_price_id')->nullable();
            $table->string('order_type');
            $table->string('variation_id');
            $table->string('product_id');
            $table->integer('status')->default(1);
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('order_metas');
    }
};
