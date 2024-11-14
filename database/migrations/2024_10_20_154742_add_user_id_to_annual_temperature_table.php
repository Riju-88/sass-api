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
        // Step 1: Add the `user_id` field as nullable first
        Schema::table('annual_temperature', function (Blueprint $table) {
            $table->unsignedBigInteger('user_id')->nullable();
        });

        // Step 2: Populate `user_id` with the admin's ID (assuming 31 is the admin's ID)
        DB::table('annual_temperature')->update(['user_id' => 31]);

        // Step 3: Add the foreign key constraint and make the field non-nullable
        Schema::table('annual_temperature', function (Blueprint $table) {
            $table->foreign('user_id')->references('id')->on('users')->onDelete('cascade')->onUpdate('cascade');
            $table->unsignedBigInteger('user_id')->nullable(false)->change();  // Make it non-nullable
        });

        // Step 4: Add `created_at` and `updated_at` columns as timestamps
        Schema::table('annual_temperature', function (Blueprint $table) {
            $table->timestamps();  // Adds created_at and updated_at columns
        });

        // Step 5: Set the created_at and updated_at columns to the current time
        DB::table('annual_temperature')->update([
            'created_at' => now(),
            'updated_at' => now(),
        ]);
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('annual_temperature', function (Blueprint $table) {
            //
            // Drop the foreign key and the user_id column
            $table->dropForeign(['user_id']);
            $table->dropColumn('user_id');
        });

        // Drop the timestamps
        Schema::table('annual_temperature', function (Blueprint $table) {
            $table->dropTimestamps();  // Drops created_at and updated_at columns
        });
    }
};
