<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('students', function (Blueprint $table) {
            $table->id();
            $table->text('name');
            $table->string('email')->unique();
            $table->string('password');
            $table->foreignId('gender_id')->references('id')->on('genders')->onDelete('cascade');            
            $table->foreignId('nationality_id')->references('id')->on('nationalities')->onDelete('cascade');            
            $table->foreignId('blood_id')->references('id')->on('bloods')->onDelete('cascade');
            $table->foreignId('grade_id')->references('id')->on('grades')->onDelete('cascade');            
            $table->foreignId('classgrade_id')->references('id')->on('classgrades')->onDelete('cascade');            
            $table->foreignId('section_id')->references('id')->on('sections')->onDelete('cascade');            
            $table->foreignId('parent_id')->references('id')->on('student_parents')->onDelete('cascade');
            $table->date('date_birth');  
            $table->string('academic_year');
            $table->softDeletes();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('students');
    }
};
