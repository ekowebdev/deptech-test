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
        Schema::create('leave', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('employee_id');
            $table->text('reason')->nullable();
            $table->date('start_date');
            $table->date('end_date');
            $table->timestamps();
 
            $table->foreign('employee_id')->references('id')->on('employees');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('leave');
    }
};
