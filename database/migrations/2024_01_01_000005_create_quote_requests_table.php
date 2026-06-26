<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('quote_requests', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->string('email');
            $table->string('phone');
            $table->enum('project_type', ['new_build', 'renovation', 'interior', 'landscape']);
            $table->string('location');
            $table->decimal('area_sqm', 10, 2);
            $table->enum('budget_range', ['under_100k', '100k_250k', '250k_500k', '500k_1m', 'above_1m']);
            $table->enum('timeline', ['immediate', '1_3_months', '3_6_months', '6_12_months', 'flexible']);
            $table->text('description');
            $table->json('reference_images')->nullable();
            $table->enum('status', ['pending', 'in_review', 'quoted', 'accepted', 'rejected'])->default('pending');
            $table->text('admin_notes')->nullable();
            $table->decimal('quoted_price', 15, 2)->nullable();
            $table->timestamps();
            
            $table->index('status');
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('quote_requests');
    }
};