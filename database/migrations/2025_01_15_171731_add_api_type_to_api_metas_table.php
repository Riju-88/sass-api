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
        Schema::table('api_metas', function (Blueprint $table) {
            // add 1st Party column
            $table->string('api_type')->default('1st party');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('api_metas', function (Blueprint $table) {
            //
            $table->dropColumn('api_type');
        });
    }
};
