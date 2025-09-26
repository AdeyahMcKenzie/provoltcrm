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
        Schema::create('jobs', function (Blueprint $table) {
            $table->id('job_id');
            $table->string('registration_number', 20);
            $table->unsignedBigInteger('customer_id');
            $table->string('technician', 20);
            $table->date('date');
            $table->integer('visit_number')->nullable();
            $table->enum('status', ['scheduled', 'in_progress', 'completed', 'cancelled'])->default('scheduled');
            //$table->time('arrival_time')->nullable();
            $table->date('completion_date')->nullable();
            //$table->time('completion_time')->nullable();
            $table->text('customer_complaint')->nullable();
            $table->text('diagnosis_notes')->nullable();
            $table->text('resolution_notes')->nullable();
            $table->decimal('total_cost', 8, 2)->nullable();
            $table->integer('mileage_at_visit')->nullable();
            $table->enum('priority', ['low', 'medium', 'high', 'urgent'])->default('medium');
            $table->text('customer_parts_provided')->nullable();
            $table->string('created_by', 20)->nullable();
            $table->timestamps();
            
            $table->foreign('registration_number')->references('registration_number')->on('vehicles')->onDelete('cascade');//links to vehicle registration number
            $table->foreign('customer_id')->references('customer_id')->on('customers')->onDelete('cascade');
            $table->foreign('technician')->references('employee_id')->on('users')->onDelete('restrict');
            $table->foreign('created_by')->references('employee_id')->on('users')->onDelete('set null');
            
            $table->index('registration_number');
            $table->index('customer_id');
            $table->index('technician');
            $table->index('date');
            $table->index('status');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('jobs');
    }
};
