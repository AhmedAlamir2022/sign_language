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
        Schema::create('h_solutions', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->foreignId('stud_id')->constrained('users')->cascadeOnDelete();
            $table->foreignId('inst_id')->constrained('instructors')->cascadeOnDelete();
            $table->foreignId('homework_id')->constrained('homework')->cascadeOnDelete();
            $table->text('hs_file');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('h_solutions');
    }
};
