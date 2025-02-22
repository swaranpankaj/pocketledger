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
        Schema::create('onboarding_question', function (Blueprint $table) {
            $table->id();
            $table->text('question');
            $table->string('image')->nullable();
            $table->enum('input_type', ['checkbox', 'radio']);
            $table->text('description')->nullable();
            $table->string('title');
            $table->boolean('status')->default(1);
            $table->enum('type', ['onbording', 'property_assets']);
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('onboarding_question');
    }
};
