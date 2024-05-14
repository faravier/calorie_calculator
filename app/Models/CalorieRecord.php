<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class CalorieRecord extends Model
{
    protected $fillable = [
        'age',
        'height',
        'weight',
        'gender',
        'food',
        'activities',
        'food_calories',
        'activity_calories',
        'bmr',
        'total_calories',
    ];
}
