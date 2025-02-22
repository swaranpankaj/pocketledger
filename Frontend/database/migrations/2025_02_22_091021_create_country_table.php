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
        Schema::create('countries', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->string('code');
            $table->string('phonecode');
            $table->timestamps();
        });
                 // Insert default values from the HTML
                 \DB::table('countries')->insert([
                    ['name' => 'INDIA','code'=>'IND','phonecode'=>91, 'created_at' => now(), 'updated_at' => now()],
                    ['name' => 'UNITED STATES','code'=>'USA','phonecode'=>1, 'created_at' => now(), 'updated_at' => now()],
                ]);
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('countries');
    }
};
