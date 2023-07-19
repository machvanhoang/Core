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
        Schema::create('comment', function (Blueprint $table) {
            $table->id();
            $table->foreignId('customer_id')->constrained('customer', 'id');
            $table->text('content')->nullable();
            $table->integer('like')->nullable();
            $table->integer('dislike')->nullable();
            $table->integer('report')->nullable();
            $table->tinyInteger('start')->default(5);
            $table->integer('media_id')->nullable();
            $table->integer('view')->default(0);
            $table->string('status');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('comment');
    }
};