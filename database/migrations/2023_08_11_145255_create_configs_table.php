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
        Schema::create('config', function (Blueprint $table) {
            $table->id();
            $table->string('title')->nullable();
            $table->string('address')->nullable();
            $table->string('email')->nullable();
            $table->string('hotline')->nullable();
            $table->string('phone')->nullable();
            $table->string('zalo')->nullable();
            $table->string('website')->nullable();
            $table->string('fanpage')->nullable();
            $table->string('slogan')->nullable();
            $table->string('copyright')->nullable();
            $table->text('google_map')->nullable();
            $table->text('google_analytics')->nullable();
            $table->text('google_mastertool')->nullable();
            $table->text('head_js')->nullable();
            $table->text('body_js')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('config');
    }
};
