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
        Schema::table('onboarding_question', function (Blueprint $table) {
            $table->string('button')->default('continue')->after('type'); // Adjust the column order
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('onboarding_question', function (Blueprint $table) {
            $table->dropColumn('button');
        });
    }
};
