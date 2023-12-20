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
        Schema::create('evaluations', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('project_id');
            $table->unsignedBigInteger('evaluator_id');
            $table->integer('score');

            // Adding a check constraint for score between 1 and 10
            // $table->check('score >= 1 and score <= 10');

            
        $table->foreign('project_id')->references('id')->on('projects');
        $table->foreign('evaluator_id')->references('id')->on('evaluators');
        });

    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('evaluations');
    }
};
