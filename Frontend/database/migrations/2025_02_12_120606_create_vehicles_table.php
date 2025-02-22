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
        Schema::create('vehicles', function (Blueprint $table) {
            $table->id();
            $table->foreignId('user_id')->constrained('users')->onDelete('cascade'); // Foreign key to users table
            $table->string('vehicle_type')->comment('Basic Info');
            $table->string('vehicle_model_year')->comment('Basic Info');
            $table->string('address_1')->comment('Basic Info');
            $table->string('address_2')->nullable()->comment('Basic Info');
            $table->string('country')->default('India')->comment('Basic Info');
            $table->string('state')->default('India')->comment('Basic Info');
            $table->string('zip_code')->comment('Basic Info');
            $table->boolean('is_loan_on_vehicle')->default(false)->comment('Ownership');
            $table->string('registration_number')->comment('Ownership');
            $table->string('vin_number')->comment('Ownership)');
            $table->text('additional_notes')->nullable()->comment('Ownership');
            $table->string('image')->nullable()->comment('Ownership');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('vehicles');
    }
};
