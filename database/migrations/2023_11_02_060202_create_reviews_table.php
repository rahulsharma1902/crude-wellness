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
        Schema::create('reviews', function (Blueprint $table) {
            $table->id();
            $table->string('review_by');
            $table->string('position');
            $table->string('image');
            $table->string('text');
<<<<<<< HEAD
            $table->string('category_id');
=======
            $table->integer('category_id');
>>>>>>> 618a5d75542e373171a05aab14e18b68645b1a18
            $table->integer('status')->default(1);
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('reviews');
    }
};
