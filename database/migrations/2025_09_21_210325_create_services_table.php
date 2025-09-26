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
        Schema::create('services', function (Blueprint $table) {
            $table->id('service_id');
            $table->string('service_name');
            $table->decimal('service_price', 8, 2);
            $table->text('description')->nullable();
            $table->string('category', 100)->nullable();
            $table->decimal('estimated_time_hours', 4, 2)->nullable();
            $table->boolean('is_active')->default(true);
            $table->integer('warranty_period_days')->default(30);
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('services');
    }
};
