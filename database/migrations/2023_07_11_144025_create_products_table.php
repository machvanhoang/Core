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
        Schema::create('product', function (Blueprint $table) {
            $table->id();
            $table->foreignId('user_id')->nullable()->constrained('user', 'id');
            $table->string('name')->nullable();
            $table->string('slug')->unique()->nullable();
            $table->text('description')->nullable();
            $table->text('content')->nullable();
            $table->string('sku')->nullable();
            $table->double('regular_price')->default(0);
            $table->double('sale_price')->default(0);
            $table->integer('inventory')->nullable();
            $table->integer('media_id')->nullable();
            $table->string('type')->nullable();
            $table->string('status')->default(PRIVATED);
            $table->softDeletes();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('product');
    }
};
