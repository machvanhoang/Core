<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('product_favorite', function (Blueprint $table) {
            $table->id();
            $table->foreignId('customer_id')->constrained('customer', 'id');
            $table->foreignId('product_id')->constrained('product', 'id');
            $table->string('status')->default('privated');
            $table->integer('sort')->default(1);
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('product_favorite');
    }
};