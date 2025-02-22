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
        Schema::create('user_answers', function (Blueprint $table) {
            $table->id();
            // Foreign key to the users table
            $table->unsignedBigInteger('user_id');
            $table->foreign('user_id')->references('id')->on('users')->onDelete('cascade');

            // Foreign key to the questions table
            $table->unsignedBigInteger('question_id');
            $table->foreign('question_id')->references('id')->on('onboarding_question')->onDelete('cascade');

            // Foreign key to the answers table
            $table->unsignedBigInteger('answer_id');
            $table->foreign('answer_id')->references('id')->on('onboarding_options')->onDelete('cascade');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('user_answers');
    }
};
