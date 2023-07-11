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
        Schema::create('mail_histories', function (Blueprint $table) {
            $table->id();
            $table->string('subject');
            $table->string('blade_file');
            $table->text('content')->nullable();
            $table->string('type');
            $table->bigInteger('object_id');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('mail_histories');
    }
};
