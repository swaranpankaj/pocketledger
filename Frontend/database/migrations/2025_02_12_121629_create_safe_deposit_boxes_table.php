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
        Schema::create('safe_deposit_boxes', function (Blueprint $table) {
            $table->id();
            $table->foreignId('user_id')->constrained('users')->onDelete('cascade'); // Foreign key to users table
            $table->string('bank_name')->comment('Basic info');
            $table->string('deposit_account_number')->comment('Basic info');
            $table->string('branch_name')->comment('Basic info');
            $table->string('branch_address')->nullable()->comment('Basic info');
            $table->string('country')->default('India')->comment('Basic info');
            $table->string('state')->default('India')->comment('Basic info');
            $table->string('zip_code')->comment('Basic info');
            $table->string('safe_box_membership')->comment('Items');
            $table->text('safe_content')->comment('Items');
            $table->text('additional_notes')->nullable()->comment('Items');
            $table->string('image')->nullable()->comment('Items');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('safe_deposit_boxes');
    }
};
