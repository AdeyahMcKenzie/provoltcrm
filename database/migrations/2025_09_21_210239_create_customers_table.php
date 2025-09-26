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
        Schema::create('customers', function (Blueprint $table) {
            $table->id('customer_id');
            $table->string('first_name', 100);
            $table->string('surname', 100);
            $table->string('contact_number', 20);
            $table->string('email_address')->nullable();
            $table->string('street_address')->nullable();
            $table->string('province')->nullable();
            $table->string('parish', 100)->nullable();
            $table->string('alternative_contact', 20)->nullable();
            $table->enum('preferred_contact_method', ['phone', 'email', 'sms'])->default('phone');
            $table->text('notes')->nullable();
            $table->boolean('is_active')->default(true);
            $table->string('created_by', 20)->nullable();
            $table->timestamps();
            
            $table->foreign('created_by')->references('employee_id')->on('users')->onDelete('set null');//for logging purposes
            $table->index(['first_name', 'surname']);
            $table->index('contact_number');
            $table->index('email_address');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('customers');
    }
};
