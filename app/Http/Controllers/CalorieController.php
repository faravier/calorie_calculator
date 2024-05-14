<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use GuzzleHttp\Client;
use App\Models\CalorieRecord;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\DB;
use Carbon\Carbon;

class CalorieController extends Controller
{
    public function index()
    {
        return view('calorie.index');
    }

    public function calculateCalories(Request $request)
    {
        try {
        $rules = [
            //'name' => 'required|string|max:255',
            'age' => 'required|integer',
            'height' => 'required|numeric',
            'weight' => 'required|numeric',
            'gender' => 'required|in:male,female',
            'food' => 'required|string',
            'activities' => 'required|string',
        ];

        $request->validate($rules);

        //ambil data untuk form
        //$name = $request->input('name');
        $age = $request->input('age');
        $height = $request->input('height');
        $weight = $request->input('weight');
        $gender = $request->input('gender');
        $food = $request->input('food');
        $activities = $request->input('activities');

        $prompt = "When you are asked to calculate calories, you MUST adhere these Rules: 
        - Make a consistent output all the time.
        - Put all calories amount inside parentheses.
        - Do not put food items amount and activity items amount inside parentheses.
        - Do not put any letters inside parentheses

 I am $age years old, $height cm tall, weight of $weight kg, and I am a $gender. Today, I ate $food and did $activities.
Total calories is food calories - basal metabolic rate - activity calories.        
You should ONLY write the response into exact specific format. 
-- BEGIN TEMPLATE --
{Food}: {foodname1: (foodcalorie1) calories} followed by (if any), {foodname2: (foodcalorie2) calories}, and so on
{Activity}: {activityname1: (activitycalorie1) calories} followed by (if any), {activityname2: (activitycalorie2) calories}, and so on
{Basal Metabolic Rate}: (bmrcalories) calories.
{Total Calorie}: (totalcalories) calories.
-- END TEMPLATE --";
        
        $apiKey = env('OPENAI_API_KEY'); 
        $apiBaseUrl = 'https://api.openai.com/v1/engines/gpt-3.5-turbo-instruct/completions';

        $client = new Client([
            'base_uri' => $apiBaseUrl,
            'headers' => [
                'Authorization' => 'Bearer ' . $apiKey,
            ],
        ]);

        $response = $client->request('POST', '', [
            'json' => [
                'prompt' => $prompt,
                'temperature' => 0,
                'max_tokens' => 2407,
                'top_p' => 1,
                'frequency_penalty' => 0,
                'presence_penalty' => 0,
            ],
        ]);
    
        $data = json_decode($response->getBody(), true);
        
        Log::info("API Response: " . json_encode($data));
        $calculatedResults = $data['choices'][0]['text'];
        $text = $calculatedResults;
        Log::info("output " . json_encode($text));

//Pemisahan text
$input_parts = explode("\r\n", $text);
$foodtext = trim($input_parts[2]);
$activitytext = trim($input_parts[3]);
$bmrtext = trim($input_parts[4]);

//Parsing angka
preg_match_all('/\(([\d.]+)\)\s*calories/', $foodtext, $food_matches);
$food_calories = implode(',', $food_matches[1]);

preg_match_all('/\(([\d.]+)\)\s*calories/', $activitytext, $activity_matches);
$activity_calories = implode(',', $activity_matches[1]);

preg_match('/\(([\d.]+)\)\s*calories/', $bmrtext, $bmr_matches);
$bmr = $bmr_matches[1];

//ganti array string ke array integer
$array_food_calories = explode(",",$food_calories);
$int_array_food = array_map('intval', $array_food_calories);
$total_food_calories = array_sum($array_food_calories);

$array_activity_calories = explode(",",$activity_calories);
$int_array_activity = array_map('intval', $array_activity_calories);
$total_activity_calories = array_sum($array_activity_calories);

//Perhitungan total kalori
$total_calories = $total_food_calories - $total_activity_calories - $bmr;

/////////////////////////////
Log::info("food " . json_encode($food));
Log::info("activities " . json_encode($activities));
Log::info("food_calories " . json_encode($food_calories));
Log::info("activity_calories" . json_encode($activity_calories));
Log::info("bmr" . json_encode($bmr));
Log::info("total_calories" . json_encode($total_calories));
/////////////////////////////

        
        //Parsed data dimasukkan ke tabel CalorieRecord
        CalorieRecord::create([
            'age' => $age,
            'height' => $height,
            'weight' => $weight,
            'gender' => $gender,
            'food' => $food,
            'activities' => $activities,
            'food_calories' => $food_calories,
            'activity_calories' => $activity_calories,
            'bmr' => $bmr,
            'total_calories' => $total_calories,
            'updated_at' => now(),
            'created_at' => now(),
        ]);
        $request->validate($rules);
        $recommendationController = new RecommendationController();
        $recommendation = $recommendationController->generateRecommendation();
        
        return view('calorie.result', compact('calculatedResults', 'recommendation'));

        
    }   
        catch (\Exception $e) {
        //API request error
        // Log::error("API Request Error: " . $e->getMessage());
        // return view('calorie.result')->with('error', 'An error occurred while processing your request.');
    }


    
}

//Mengambil isi entry calorierecord untuk view tabel progress
public function showEntries()
    {
        $entries = CalorieRecord::all();

        return view('calorie.progress', compact('entries'));
    }

//fungsi untuk grafik line
public function showProgress()
{
    $endDate = Carbon::now();
    $startDate = Carbon::now()->subDays(6);

    $entries = CalorieRecord::whereBetween('created_at', [$startDate, $endDate])->get();

    return view('calorie.progress', compact('entries'));
}

//fungsi untuk mengambil data kalori mingguan
public function showWeeklyProgress()
{
    $endDate = Carbon::now();
    $startDate = Carbon::now()->subDays(6);

    $entries = CalorieRecord::whereBetween('created_at', [$startDate, $endDate])->get();

    $dates = $entries->pluck('created_at')->map(function ($date) {
        return $date->toDateString();
    });

    $totalCalories = $entries->pluck('total_calories');

    // Convert arrays to JSON strings
    $jsonDates = json_encode($dates);
    $jsonTotalCalories = json_encode($totalCalories);

    return view('calorie.weekly_progress', compact('jsonDates', 'jsonTotalCalories'));
}


}

