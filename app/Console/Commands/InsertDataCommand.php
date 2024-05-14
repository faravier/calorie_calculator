<?php

use Illuminate\Console\Command;
use Illuminate\Support\Facades\DB;

class InsertDataCommand extends Command
{
    protected $signature = 'insert:data';
    protected $description = 'Insert data into the database';

    public function handle()
    {
        $text = "Your provided text here";

        // Extract Activities and Calories using regular expressions
        $activity_pattern = '/(\d+) calories \(([^)]+)\)/';
        preg_match_all($activity_pattern, $text, $activityMatches);

        // Extract Food and Calories using regular expressions
        $food_pattern = '/(\d+) calories \(([^=]+) = (\d+) calories\)/';
        preg_match_all($food_pattern, $text, $foodMatches);

        // Iterate over activity data and insert into the Activity table
        foreach ($activityMatches[0] as $index => $match) {
            $calories = $activityMatches[1][$index];
            $description = $activityMatches[2][$index];

            // Insert data into the Activity table
            DB::table('activity')->insert([
                'calories_burned' => $calories,
                'description' => $description,
            ]);
        }

        // Iterate over food data and insert into the FoodIntake table
        foreach ($foodMatches[0] as $index => $match) {
            $calories = $foodMatches[1][$index];
            $food_item = $foodMatches[2][$index];
            $calories_per_serving = $foodMatches[3][$index];

            // Insert data into the FoodIntake table
            DB::table('food_intake')->insert([
                'calories_per_serving' => $calories_per_serving,
                'food_item' => $food_item,
                'quantity_consumed' => 1, // You can adjust this as needed
            ]);
        }

        $this->info('Data inserted successfully.');
    }
}
