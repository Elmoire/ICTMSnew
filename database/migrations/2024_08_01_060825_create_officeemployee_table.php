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
        Schema::create('offices', function (Blueprint $table) {
            $table->string('OfficeID', 10)->primary();
            $table->string('OfficeName', 50);
            $table->string('OfficeLocation', 30);
            $table->timestamps();
        });

        Schema::create('employees', function (Blueprint $table) {
            $table->string('EmployeeID', 10)->primary();
            $table->string('EmployeeName', 50);
            $table->string('EmployeeEmail', 20);
            $table->string('OfficeID');
            $table->timestamps();

            // FK
            $table->foreign('OfficeID')->references('OfficeID')->on('offices');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('employees');
        Schema::dropIfExists('offices');
    }
};
