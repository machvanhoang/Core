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
        Schema::create('seo', function (Blueprint $table) {
            $table->id();
            $table->string('table')->nullable();
            $table->string('parent_id')->nullable();
            $table->string('title')->nullable();
            $table->string('keyword')->nullable();
            $table->string('description')->nullable();
            $table->string('url')->nullable();
            $table->string('type')->nullable();
            $table->integer('image')->nullable();
            $table->integer('fb_image')->nullable();
            $table->integer('tw_image')->nullable();
            $table->integer('pr_image')->nullable();
            $table->integer('ig_image')->nullable();
            $table->integer('lk_image')->nullable();
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
