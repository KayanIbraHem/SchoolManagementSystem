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
        Schema::create('promotions', function (Blueprint $table) {
            $table->id();
            $table->foreignId('student_id')->references('id')->on('students')->onDelete('cascade');
            $table->foreignId('from_grade')->references('id')->on('grades')->onDelete('cascade');
            $table->foreignId('from_classgrade')->references('id')->on('classgrades')->onDelete('cascade');
            $table->foreignId('from_section')->references('id')->on('sections')->onDelete('cascade');
            $table->foreignId('to_grade')->references('id')->on('grades')->onDelete('cascade');
            $table->foreignId('to_classgrade')->references('id')->on('classgrades')->onDelete('cascade');
            $table->foreignId('to_section')->references('id')->on('sections')->onDelete('cascade');
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
        Schema::dropIfExists('promotions');
    }
};
