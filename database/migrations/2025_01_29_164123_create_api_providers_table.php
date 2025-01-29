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
        Schema::create('api_providers', function (Blueprint $table) {
            $table->id();
            $table->foreignId('user_id')->constrained()->cascadeOnDelete();  // Foreign key to users table
            $table->string('name')->unique();  // Name of the provider
            $table->string('company')->nullable();  // Optional company name
            $table->string('contact_email')->nullable();  // Optional contact email
            $table->string('website')->nullable();  // Optional website link
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('api_providers');
    }
};
