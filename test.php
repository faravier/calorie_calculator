<?php

$input = "\r\n\r\nFood: A bowl of bakso: (300) calories, an apple: (52) calories, 200 ml americano: (3) calories\r\nActivity: 15 push ups: (36) calories, 15 squats: (36) calories, 5 pull ups: (25) calories\r\nBasal Metabolic Rate: (1796.5) calories.";

// Use explode to separate the input into $foodtext, $activitytext, and $bmrtext
$input_parts = explode("\r\n", $input);
$foodtext = trim($input_parts[2]);
$activitytext = trim($input_parts[3]);
$bmrtext = trim($input_parts[4]);

echo "foodtext: \"$foodtext\"\n";
echo "activitytext: \"$activitytext\"\n";
echo "bmrtext: \"$bmrtext\"\n";

// Parse numbers inside parentheses
preg_match_all('/\(([\d.]+)\)\s*calories/', $foodtext, $food_matches);
$food_calories = implode(',', $food_matches[1]);

preg_match_all('/\(([\d.]+)\)\s*calories/', $activitytext, $activity_matches);
$activity_calories = implode(',', $activity_matches[1]);

preg_match('/\(([\d.]+)\)\s*calories/', $bmrtext, $bmr_matches);
$bmr = $bmr_matches[1];

echo "food_calories: \"$food_calories\"\n";
echo "activity_calories: \"$activity_calories\"\n";
echo "bmr: \"$bmr\"\n";

$array_food_calories = explode(",",$food_calories);
$int_array_food = array_map('intval', $array_food_calories);
$total_food_calories = array_sum($array_food_calories);

$array_activity_calories = explode(",",$activity_calories);
$int_array_activity = array_map('intval', $array_activity_calories);
$total_activity_calories = array_sum($array_activity_calories);

// Extracting numbers inside parentheses from Total calories
$total_calories = $total_food_calories - $total_activity_calories - $bmr; // Set a default value for Total calories


echo "total food calories: \"$total_food_calories\"";
echo "total activity calories: \"$total_activity_calories\"";
echo "total calories: \"$total_calories\"";