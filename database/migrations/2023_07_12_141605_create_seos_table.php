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
        Schema::create('seo', function (Blueprint $table) {
            $table->id();
            $table->string('title')->nullable();
            $table->string('keyword')->nullable();
            $table->string('description')->nullable();
            $table->string('url')->nullable();
            $table->string('type')->nullable();
            $table->integer('image')->default(0);
            $table->integer('fb_image')->default(0);
            $table->integer('tw_image')->default(0);
            $table->integer('pr_image')->default(0);
            $table->integer('ig_image')->default(0);
            $table->integer('lk_image')->default(0);
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('seo');
    }
};