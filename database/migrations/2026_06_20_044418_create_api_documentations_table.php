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
        Schema::create('api_documentations', function (Blueprint $table) {
            // Menggunakan UUID sebagai primary key
            $table->uuid('id')->primary();

            $table->string('module', 100);
            $table->string('name', 100);
            $table->string('method', 10);
            $table->string('endpoint');
            
            $table->text('description')->nullable();
            
            // Kolom JSON untuk request & response
            $table->json('request')->nullable();
            $table->json('response')->nullable();

            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('api_documentations');
    }
};