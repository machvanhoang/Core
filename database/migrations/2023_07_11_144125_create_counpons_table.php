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
        Schema::create('counpon', function (Blueprint $table) {
            $table->id();
            $table->string('code')->unique();
            $table->date('start_date');
            $table->date('end_date');
            $table->double('percentage')->default(0);
            $table->integer('usage_limit')->nullable();
            $table->integer('usage_limit_user')->nullable();
            $table->string('conditions')->nullable();
            $table->string('description')->nullable();
            $table->integer('usage_count')->default(0);
            $table->string('status')->default('privated');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('counpon');
    }
};