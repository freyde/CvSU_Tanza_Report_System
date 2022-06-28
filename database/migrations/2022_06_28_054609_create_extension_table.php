<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateExtensionTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('extension_project', function (Blueprint $table) {
            $table->id();
            $table->string('uid');
            $table->string('year');
            $table->string('name');
        });

        Schema::create('extension_activities', function (Blueprint $table) {
            $table->id();
            $table->string('uid');
            $table->string('year');
            $table->string('activity');
            $table->timestamp('date');
            $table->string('extensionist');
            $table->string('clientle');
            $table->string('agency');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('extension_project');
        Schema::dropIfExists('extension_activities');
    }
}
