<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up()
{
    Schema::create('students', function (Blueprint $table) {
        $table->id();
        $table->unsignedTinyInteger('class_name');
        $table->string('class_section', 20);
        $table->unsignedInteger('male_students');
        $table->unsignedInteger('female_students');
        $table->unsignedInteger('hindu_students');
        $table->unsignedInteger('buddhist_students');
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
        Schema::dropIfExists('students');
    }
};
