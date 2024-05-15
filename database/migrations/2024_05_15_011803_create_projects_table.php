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
        Schema::create('projects', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->date('start_date');
            $table->date('end_date');
            $table->enum('status', ['initiated', 'in_progress', 'cancelled', 'completed'])->default('initiated');
            $table->float('progress_percentage')->default(0);
            $table->unsignedBigInteger('client_id');
            $table->unsignedBigInteger('interview_id');
            $table->timestamps();

            // foreign key
            $table->foreign('client_id')->references('id')->on('clients')->onDelete('cascade');
            $table->foreign('interview_id')->references('id')->on('interviews')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('projects');
    }
};
