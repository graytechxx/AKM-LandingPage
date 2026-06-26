<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;
use Illuminate\Support\Facades\DB;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        // Update all draft portfolios to published
        DB::table('portfolios')
            ->where('status', 'draft')
            ->update(['status' => 'published']);
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        // Revert back: This would revert all portfolios back to draft
        // Commented out to prevent accidental data loss
        // DB::table('portfolios')
        //     ->where('status', 'published')
        //     ->update(['status' => 'draft']);
    }
};
