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
        Schema::table('users', function (Blueprint $table) {
            // Rename the 'name' column to 'first_name'
            $table->renameColumn('name', 'first_name');
            
            // Add 'last_name' column
            $table->string('last_name')->after('first_name'); // or place it where you'd prefer
        });

    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('users', function (Blueprint $table) {
            // Rollback column renaming
            $table->renameColumn('first_name', 'name');
            
            // Drop 'last_name' column
            $table->dropColumn('last_name');
        });
    }
};
