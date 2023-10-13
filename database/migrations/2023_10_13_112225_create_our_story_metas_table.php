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
        Schema::create('our_story_metas', function (Blueprint $table) {
            $table->id();
            $table->text('banner_text')->nullable();
            $table->text('video_text')->nullable();
            $table->text('video_thumnail_image')->nullable();
            $table->text('video_link')->nullable();
            $table->string('profile_name')->nullable();
            $table->string('profile_position')->nullable();
            $table->string('profile_image')->nullable();
            $table->text('profile_text')->nullable();
            $table->text('message')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('our_story_metas');
    }
};
