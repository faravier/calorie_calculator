<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Carbon\Carbon;
use App\Models\CalorieRecord;
use GuzzleHttp\Client;

class RecommendationController extends Controller
{
    public function generateRecommendation()
    {
        // Adjust the date range according to your needs
        $endDate = Carbon::now();
        $startDate = Carbon::now()->subDays(6); // 7 days ago

        $entries = CalorieRecord::whereBetween('created_at', [$startDate, $endDate])->get();

        // Calculate the average of total_calories
        $averageTotalCalories = $entries->avg('total_calories');
        $latestCalorieRecord = CalorieRecord::latest()->first();

        // Number Format
        $roundedAverageTotalCalories = round($averageTotalCalories);
        $averageTotalCalories = $roundedAverageTotalCalories;

        if ($latestCalorieRecord) {
            $age = $latestCalorieRecord->age;
            $weight = $latestCalorieRecord->weight;
            $height = $latestCalorieRecord->height;
            $gender = $latestCalorieRecord->gender;
        } else {
        // Handle the case where no records are found
            $age = $weight = $height = null;
}

            $age = $latestCalorieRecord->age;
            $weight = $latestCalorieRecord->weight;
            $height = $latestCalorieRecord->height / 100; // Convert to meters
            $gender = $latestCalorieRecord->gender;

        // Calculate BMI
            $bmi = $weight / ($height * $height);

        // Create the recommendation based on the average
        if ($bmi < 18.5) {
            $recommendation = "You are underweight. You should consider gaining weight.";
        } elseif ($bmi >= 18.5 && $bmi < 24.9) {
            $recommendation = "Your weight is normal. Maintain a balanced diet and exercise regularly.";
        } elseif ($bmi >= 25 && $bmi < 29.9) {
            $recommendation = "You are overweight. Consider losing weight through diet and exercise.";
        } else {
            $recommendation = "You are obese. Consult with a healthcare professional for a proper weight management plan.";
        }

        // Use ChatGPT API for additional recommendation based on average
        $apiKey = env('OPENAI_API_KEY');
        $apiBaseUrl = 'https://api.openai.com/v1/engines/gpt-3.5-turbo-instruct/completions';

        $client = new Client([
            'base_uri' => $apiBaseUrl,
            'headers' => [
                'Authorization' => 'Bearer ' . $apiKey,
            ],
        ]);

        $prompt = "you're my health assistant giving health evaluation and recommendations.
        my antropometries: $age years old, $height cm tall, weigh $weight kg and is a $gender.
        make an evaluation based on my calorie intake, exercise, and diet based on my average of average total calories and body mass index from " .
            $startDate->toDateString() . " to " . $endDate->toDateString() ." 
            if my average total calories:" . $averageTotalCalories . " kcal. 
            additional rules for you (do not show your calculations process. just show the results):
            - write if I should lose/gain/maintain his body mass based on his antropometries.
            - write the results in bahasa indonesia.
            - recommend me exercises and food menu based on my evaluations.
            - calculate my Body Mass Index based on my gender, age, height, weight, but dont write the calculation in the evaluation.
            - write what my Body Mass Index is inside the evaluations.
            - adhere to WHO standards of Body Mass Index.
            - use as compact sentences as possible";

        $response = $client->request('POST', '', [
            'json' => [
                'prompt' => $prompt,
                'temperature' => 0.6,
                'max_tokens' => 500,
                'top_p' => 1,
                'frequency_penalty' => 0,
                'presence_penalty' => 0,
            ],
        ]);

        $data = json_decode($response->getBody(), true);
        $additionalRecommendation = $data['choices'][0]['text'];

        return response()->json(['averageTotalCalories' => $averageTotalCalories, 'recommendation' => $recommendation, 'additionalRecommendation' => $additionalRecommendation]);

    }
}
