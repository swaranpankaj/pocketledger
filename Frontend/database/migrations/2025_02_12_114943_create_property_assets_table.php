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
        Schema::create('property_assets', function (Blueprint $table) {
            $table->id();
            $table->foreignId('user_id')->constrained('users')->onDelete('cascade'); // Foreign key to users table
            $table->string('type_of_assets')->nullable()->comment('Basic Info'); // Type of assets
            $table->string('label_your_property')->nullable()->comment('Basic Info'); // Label for the property
            $table->string('address_1')->nullable()->comment('Basic Info'); // Address line 1
            $table->string('address_2')->nullable()->comment('Basic Info'); // Address line 2
            $table->string('country')->default('India')->comment('Basic Info'); // Country, defaulting to India
            $table->string('state')->default('Haryana')->comment('Basic Info'); // State, defaulting to India
            $table->string('zip_code')->nullable()->comment('Basic Info'); // Zip code or postal code
            $table->enum('own_or_rent', ['own', 'rent'])->comment('Ownership');
            $table->string('deed_storage_location')->nullable()->comment('Ownership');
            $table->string('ownership_structure')->nullable()->comment('Ownership');
            $table->text('additional_notes')->nullable()->comment('Ownership');
            $table->string('document_image')->nullable()->comment('Ownership');
            $table->string('insurance_company_name')->comment('Insurance');
            $table->string('policy_number')->nullable()->comment('Insurance');
            $table->string('policy_document_location')->nullable()->comment('Insurance');
            $table->string('insurance_types')->nullable()->comment('Insurance');
            $table->string('security_company_name')->comment('Security');
            $table->string('account_number')->nullable()->comment('Security');
            $table->string('phone_safe_word')->nullable()->comment('Security');
            $table->string('extra_keys_location')->nullable()->comment('Security');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('property_assets');
    }
};
