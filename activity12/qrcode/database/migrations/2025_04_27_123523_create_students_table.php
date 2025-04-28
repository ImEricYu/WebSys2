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
        Schema::create('students', function (Blueprint $table) {
            $table->id(); // Primary key
            $table->string('student_id')->unique(); 
            $table->string('full_name');
            $table->date('birthdate');
            $table->integer('age');
            $table->string('email')->unique();
            $table->string('phone_number')->nullable();
            $table->text('address')->nullable();
            $table->timestamps(); 
        });
    }


    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('students');
    }
};
