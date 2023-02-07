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
        Schema::create('student_parents', function (Blueprint $table) {

            $table->id();
            $table->string('email')->unique();
            $table->string('password');

            //Fatherinformation
            $table->string('father_name');
            $table->string('father_nationaid');
            $table->string('father_passportid');
            $table->string('father_phone');
            $table->string('father_job');
            $table->foreignId('fathernationality_id')->references('id')->on('nationalities');
            $table->foreignId('fatherbloodtype_id')->references('id')->on('bloods');
            $table->foreignId('fatherreligion_id')->references('id')->on('religions');
            $table->string('father_address');

            //Mother information
            $table->string('mother_name');
            $table->string('mother_nationaid');
            $table->string('mother_passportid');
            $table->string('mother_phone');
            $table->string('mother_job');
            $table->foreignId('mothernationality_id')->references('id')->on('nationalities');
            $table->foreignId('motherbloodtype_id')->references('id')->on('bloods');
            $table->foreignId('motherreligion_id')->references('id')->on('religions');
            $table->string('mother_address');
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
        Schema::dropIfExists('student_parents');
    }
};
