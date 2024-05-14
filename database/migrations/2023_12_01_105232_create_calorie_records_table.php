<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateCalorieRecordsTable extends Migration
{
    public function up()
    {
        Schema::create('calorie_records', function (Blueprint $table) {
            $table->id();
            $table->integer('age');
            $table->integer('height');
            $table->integer('weight');
            $table->string('gender');
            $table->string('food');
            $table->string('activities');
            $table->string('food_calories');
            $table->string('activity_calories');
            $table->string('bmr');
            $table->string('total_calories');
            $table->timestamps();
        });
    }

    public function down()
    {
        Schema::dropIfExists('calorie_records');
    }
}
