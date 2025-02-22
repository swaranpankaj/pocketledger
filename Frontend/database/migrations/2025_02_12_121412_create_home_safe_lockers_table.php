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
        Schema::create('home_safe_lockers', function (Blueprint $table) {
            $table->id();
            $table->foreignId('user_id')->constrained('users')->onDelete('cascade'); // Foreign key to users table
            $table->string('safe_location')->comment('Basic Info');
            $table->string('property_select')->comment('Basic Info');
            $table->text('safe_content')->comment('Items');
            $table->text('additional_notes')->nullable()->comment('Itemse');
            $table->string('image')->nullable()->comment('Items');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('home_safe_lockers');
    }
};
