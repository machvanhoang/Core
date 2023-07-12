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
        Schema::create('order', function (Blueprint $table) {
            $table->id();
            $table->foreignId('order_status_id')->constrained('order_status', 'id');
            $table->foreignId('payment_method_id')->constrained('payment_method', 'id');
            $table->foreignId('customer_id')->constrained('customer', 'id');
            $table->foreignId('counpon_id')->nullable()->constrained('counpon', 'id');
            $table->foreignId('province_id')->nullable()->constrained('province', 'id');
            $table->foreignId('district_id')->nullable()->constrained('district', 'id');
            $table->foreignId('ward_id')->nullable()->constrained('ward', 'id');
            $table->string('code')->unique();
            $table->string('full_name')->nullable();
            $table->string('address')->nullable();
            $table->string('phone', 15)->nullable();
            $table->string('email', 50)->nullable();
            $table->string('requirements')->nullable();
            $table->string('notes')->nullable();
            $table->date('date_complete');
            $table->integer('point')->default(0);
            $table->double('ship', 12, 2)->default(0);
            $table->double('temp_price', 12, 2)->default(0);
            $table->double('total_price', 12, 2)->default(0);
            $table->integer('sort')->default(1);
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('order');
    }
};