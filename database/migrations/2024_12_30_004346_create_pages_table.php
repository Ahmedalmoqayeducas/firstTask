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
        Schema::create('pages', function (Blueprint $table) {
            $table->id();
            $table->foreignId('posts')->constrained('posts')->cascadeOnDelete();
            $table->longText('content');
            
            $table->timestamps();
        });
    }

    /**
     * to make user can add pages in dashboard
     * 1-make a page that extends header and footer names (other-page)
     * 2-make a dropdown to all pages make from dashboard
     * 3-store page content in table names page with column content
     * 4-when user click on page, call the show function from controller
     */
    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('pages');
    }
};
