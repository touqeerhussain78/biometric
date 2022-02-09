<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateHandOnExperiencesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('hand_on_experiences', function (Blueprint $table) {
            $table->id();
            $table->string('first_name')->nullable();
            $table->string('last_name')->nullable();
            $table->string('email')->nullable();
            $table->string('institute')->nullable();
            $table->string('degree_title')->nullable();
            $table->date('from')->nullable();
            $table->date('to')->nullable();
            $table->string('work_experience')->nullable();
            $table->text('designation')->nullable();
            $table->date('work_from')->nullable();
            $table->date('work_to')->nullable();
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
        Schema::dropIfExists('hand_on_experiences');
    }
}
