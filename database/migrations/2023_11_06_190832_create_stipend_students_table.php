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
        Schema::create('stipend_students', function (Blueprint $table) {
            $table->id();
            $table->unsignedTinyInteger('class_name');
            $table->unsignedInteger('gov_stipend_male');
            $table->unsignedInteger('gov_stipend_female'); 
            $table->unsignedInteger('sub_stipend_male');
            $table->unsignedInteger('sub_stipend_female');
            $table->unsignedTinyInteger('added_by')->default(1);
            $table->boolean('status')->default(true);
            $table->timestamps();
        });        
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('stipend_students');
    }
};
