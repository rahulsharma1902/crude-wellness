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
        Schema::create('payment_collections', function (Blueprint $table) {
            $table->id();
            $table->integer('order_id');
            $table->integer('order_meta_id')->nullable();
            $table->string('inovice_id');
            $table->string('payment_intent');
            $table->string('payment_amount');
            $table->string('payment_type');
            $table->string('period_start')->nullable();
            $table->string('period_end')->nullable();
            $table->text('invoice_url')->nullable();
            $table->text('invoice_pdf')->nullable();
            $table->string('payment_status');
            $table->integer('delivery_status')->default(0);   ///0 for  pending 1 for confirmed 2 for shipped 3 for delivered.
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('payment_collections');
    }
};
