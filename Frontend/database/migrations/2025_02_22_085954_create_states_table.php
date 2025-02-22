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
        Schema::create('states', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->integer('country_id'); // Foreign key for countries table
            $table->timestamps();
        });
           // States Data
           $states = [
            ['name' => 'Punjab', 'country_id' => 1,'created_at' => now(), 'updated_at' => now()],
            ['name' => 'Haryana', 'country_id' => 1,'created_at' => now(), 'updated_at' => now()],
            ['name' => 'Delhi', 'country_id' => 1,'created_at' => now(), 'updated_at' => now()],
            ['name' => 'Maharashtra', 'country_id' => 1,'created_at' => now(), 'updated_at' => now()],
            ['name' => 'Gujarat', 'country_id' => 1,'created_at' => now(), 'updated_at' => now()],
            ['name' => 'Karnataka', 'country_id' => 1,'created_at' => now(), 'updated_at' => now()],
            ['name' => 'Tamil Nadu', 'country_id' =>1,'created_at' => now(), 'updated_at' => now()],
            ['name' => 'Uttar Pradesh', 'country_id' => 1,'created_at' => now(), 'updated_at' => now()],

            ['name' => 'California', 'country_id' => 2,'created_at' => now(), 'updated_at' => now()],
            ['name' => 'Texas', 'country_id' => 2,'created_at' => now(), 'updated_at' => now()],
            ['name' => 'Florida', 'country_id' => 2,'created_at' => now(), 'updated_at' => now()],
            ['name' => 'New York', 'country_id' => 2,'created_at' => now(), 'updated_at' => now()],
            ['name' => 'Illinois', 'country_id' => 2,'created_at' => now(), 'updated_at' => now()],
        ];

        // Insert into database
        \DB::table('states')->insert($states);
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('states');
    }
};
