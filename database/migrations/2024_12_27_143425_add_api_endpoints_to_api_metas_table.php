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
            // add get_endpoint and post_endpoint columns
            $table->string('get_endpoint');
            $table->string('post_endpoint')->nullable();
            // add post_sample column
            $table->string('post_sample')->nullable();
            // add update_endpoint and delete_endpoint columns
            $table->string('update_endpoint')->nullable();
            $table->string('delete_endpoint')->nullable();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('api_metas', function (Blueprint $table) {
            //
            $table->dropColumn('get_endpoint');
            $table->dropColumn('post_endpoint');
            $table->dropColumn('post_sample');
            $table->dropColumn('update_endpoint');
            $table->dropColumn('delete_endpoint');
        });
    }
};
