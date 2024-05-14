<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class ChangeBmrAndTotalCaloriesColumns extends Migration
{
    public function up()
    {
        Schema::table('calorie_records', function (Blueprint $table) {
            $table->string('bmr')->change();
            $table->string('total_calories')->change();
        });
    }

    public function down()
    {
        Schema::table('calorie_records', function (Blueprint $table) {
            
        });
    }
}
