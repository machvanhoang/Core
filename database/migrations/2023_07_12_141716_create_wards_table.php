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
        Schema::create('ward', function (Blueprint $table) {
            $table->id();
            $table->foreignId('province_id')->constrained('province', 'id');
            $table->foreignId('district_id')->constrained('district', 'id');
            $table->string('name')->nullable();
            $table->string('slug')->unique();
            $table->string('code')->unique();
            $table->string('level')->nullable();
            $table->string('status')->default('show');
            $table->integer('sort')->default(1);
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('ward');
    }
};