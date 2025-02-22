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
        Schema::create('assets', function (Blueprint $table) {
            $table->id();
            $table->string('name'); // Stores the span content
            $table->timestamps();
        });
         // Insert default values from the HTML
         \DB::table('assets')->insert([
            ['name' => 'Home', 'created_at' => now(), 'updated_at' => now()],
            ['name' => 'Other Real Estate', 'created_at' => now(), 'updated_at' => now()],
            ['name' => 'Vehicles', 'created_at' => now(), 'updated_at' => now()],
            ['name' => 'Safe Deposit Boxes', 'created_at' => now(), 'updated_at' => now()],
            ['name' => 'Home Safes', 'created_at' => now(), 'updated_at' => now()],
            ['name' => 'Other Important Possessions', 'created_at' => now(), 'updated_at' => now()],
        ]);
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('assets');
    }
};
