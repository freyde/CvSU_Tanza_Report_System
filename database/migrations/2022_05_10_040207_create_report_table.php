<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateReportTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('seminar', function (Blueprint $table) {
            $table->id();
            $table->string('uid');
            $table->string('year');
            $table->string('type');
            $table->string('title');
            $table->string('venue');
            $table->timestamp('date');
        });

        Schema::create('recognition', function (Blueprint $table) {
            $table->id();
            $table->string('uid');
            $table->string('year');
            $table->string('type');
            $table->string('award');
            $table->string('agency');
            $table->string('venue');
            $table->timestamp('date');
        });

        Schema::create('competency', function (Blueprint $table) {
            $table->id();
            $table->string('uid');
            $table->string('year');
            $table->string('type');
        });

        Schema::create('presentation', function (Blueprint $table) {
            $table->id();
            $table->string('uid');
            $table->string('year');
            $table->string('type');
            $table->string('name');
            $table->string('title');
            $table->string('venue');
            $table->timestamp('date');
        });

        Schema::create('publication', function (Blueprint $table) {
            $table->id();
            $table->string('uid');
            $table->string('year');
            $table->string('title');
            $table->string('article');
            $table->string('publisher');
            $table->string('number');
        });

        Schema::create('enrolment', function (Blueprint $table) {
            $table->id();
            $table->string('uid');
            $table->string('year');
            $table->string('program');
            $table->string('major');
            $table->string('enrollee');
        });

        Schema::create('accreditation', function (Blueprint $table) {
            $table->id();
            $table->string('uid');
            $table->string('year');
            $table->string('program');
            $table->timestamp('date');
            $table->string('level');
        });

        Schema::create('government', function (Blueprint $table) {
            $table->id();
            $table->string('uid');
            $table->string('year');
            $table->string('program');
            $table->timestamp('date');
        });

        Schema::create('licensure', function (Blueprint $table) {
            $table->id();
            $table->string('uid');
            $table->string('year');
            $table->string('examination');
            $table->string('cvsu');
            $table->string('national');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('seminar');
        Schema::dropIfExists('recognition');
        Schema::dropIfExists('licensure');
        Schema::dropIfExists('government');
        Schema::dropIfExists('accreditation');
        Schema::dropIfExists('competency');
        Schema::dropIfExists('presentation');
        Schema::dropIfExists('publication');
        Schema::dropIfExists('enrolment');
    }
}
