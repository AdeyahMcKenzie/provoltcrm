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
        Schema::create('vehicles', function (Blueprint $table) {
            $table->string('registration_number', 20)->primary();
            $table->unsignedBigInteger('owner_id');//links a car to its owner
            $table->string('make', 100);
            $table->string('model', 100);
            $table->text('description')->nullable();
            $table->integer('year')->nullable();
            $table->string('colour', 50)->nullable();
            $table->string('vin_number', 50)->unique()->nullable();
            $table->string('engine_type', 100)->nullable();
            $table->integer('mileage')->nullable();
            $table->enum('fuel_type', ['petrol', 'diesel', 'electric', 'hybrid'])->nullable();
            $table->enum('transmission', ['manual', 'automatic'])->nullable();
            $table->boolean('is_active')->default(true);
            $table->string('created_by', 20)->nullable();
            $table->timestamps();
            
            $table->foreign('owner_id')->references('customer_id')->on('customers')->onDelete('cascade');
            $table->foreign('created_by')->references('employee_id')->on('users')->onDelete('set null');
            $table->index('owner_id');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('vehicles');
    }
};
