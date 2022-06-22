<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateReportsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('foreign_students', function (Blueprint $table) {
            $table->id();
            $table->string('uid');
            $table->string('year');
            $table->string('name');
            $table->string('nationality');
            $table->string('program');
        });

        Schema::create('graduates', function (Blueprint $table) {
            $table->id();
            $table->string('uid');
            $table->string('year');
            $table->string('program');
            $table->integer('graduates');
        });

        Schema::create('scholarships', function (Blueprint $table) {
            $table->id();
            $table->string('uid');
            $table->string('year');
            $table->string('academic');
            $table->string('assistance');
            $table->string('government');
            $table->string('service');
            $table->string('private');
            $table->integer('scholars');
        });

        Schema::create('recogntion', function (Blueprint $table) {
            $table->id();
            $table->string('uid');
            $table->string('year');
            $table->string('award');
            $table->string('agency');
            $table->string('grantee');
        });

        Schema::create('competency_student', function (Blueprint $table) {
            $table->id();
            $table->string('uid');
            $table->string('year');
            $table->string('program');
            $table->string('competency');
            $table->integer('students');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('_reports');
    }
}
