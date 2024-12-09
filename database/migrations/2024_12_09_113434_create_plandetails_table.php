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
        Schema::create('plandetails', function (Blueprint $table) {
            $table->id();  // Primary key
            $table
                ->foreignId('plan_id')  // Foreign key for plans
                ->constrained('plans')
                ->onDelete('cascade');  // Optional, depends on desired behavior
            $table->text('description');  // Plan description
            $table->decimal('price', 10, 2);  // Plan price
            $table->timestamps();  // created_at and updated_at
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('plandetails');
    }
};
