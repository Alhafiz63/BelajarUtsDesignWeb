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
            $table->id();
            $table->string('full_name', 100);
            $table->date('date_of_birth');
            $table->enum('gender', ['male', 'female']);
            $table->text('address');
            $table->string('phone', 15)->nullable();
            $table->string('email', 100)->unique();
            $table->string('previous_school', 100);
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
