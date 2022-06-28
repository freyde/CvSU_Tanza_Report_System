<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateResearchTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('ongoing_research', function (Blueprint $table) {
            $table->id();
            $table->string('uid');
            $table->string('year');
            $table->string('title');
            $table->timestamp('date');
        });

        Schema::create('completed_research', function (Blueprint $table) {
            $table->id();
            $table->string('uid');
            $table->string('year');
            $table->string('title');
            $table->timestamp('date');
        });

        Schema::create('outside_research', function (Blueprint $table) {
            $table->id();
            $table->string('uid');
            $table->string('year');
            $table->string('title');
            $table->string('sponsor');
            $table->timestamp('date');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('ongoing_researcharch');
        Schema::dropIfExists('completed_researcharch');
        Schema::dropIfExists('outside_researcharch');
    }
}
