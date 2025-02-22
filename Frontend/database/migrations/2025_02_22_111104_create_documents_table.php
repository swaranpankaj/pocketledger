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
        Schema::create('documents', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->timestamps();
        });

        // Insert default values from the HTML
        \DB::table('documents')->insert([
            ['name' => 'Driver’s License', 'created_at' => now(), 'updated_at' => now()],
            ['name' => 'Passport', 'created_at' => now(), 'updated_at' => now()],
            ['name' => 'Voter ID Card', 'created_at' => now(), 'updated_at' => now()],
        ]);
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('documents');
    }
};
