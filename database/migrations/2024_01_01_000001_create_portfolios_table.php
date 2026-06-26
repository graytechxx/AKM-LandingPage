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
        Schema::create('portfolios', function (Blueprint $table) {
            $table->id();
            $table->string('title_id');
            $table->string('title_en');
            $table->string('slug')->unique();
            $table->text('description_id')->nullable();
            $table->text('description_en')->nullable();
            $table->enum('category', ['living_room', 'bedroom', 'kitchen', 'office', 'commercial'])->default('living_room');
            $table->string('client')->nullable();
            $table->string('location')->nullable();
            $table->decimal('area_sqm', 10, 2)->nullable();
            $table->string('duration')->nullable();
            $table->string('budget_range')->nullable();
            $table->string('featured_image')->nullable();
            $table->json('gallery_images')->nullable();
            $table->boolean('is_featured')->default(false);
            $table->enum('status', ['published', 'draft'])->default('draft');
            $table->timestamps();
            
            $table->index('category');
            $table->index('status');
            $table->index('is_featured');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('portfolios');
    }
};
