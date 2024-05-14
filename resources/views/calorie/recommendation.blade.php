<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Calorie Calculator - Recommendation</title>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.15.4/css/all.css">
    <style>
        body {
            background: #f8f9fa;
        }
        .card {
            border: none;
            border-radius: 10px;
            box-shadow: 0 4px 8px 0 rgba(0, 0, 0, 0.1);
        }
        .card-header {
            background: #343a40;
            color: white;
        }
    </style>
</head>
<body>
    <div class="container mt-5">
        <div class="card">
            <div class="card-header text-center">
                <h1><i class="fas fa-calculator"></i> Recommendations </h1>
            </div>
            <div class="card-body">
                <div class="mb-4">
                    <h2>Average Total Calories:</h2>
                    <p>{{ $averageTotalCalories }} kcal</p>
                </div>

                <div class="mb-4">
                    <h2>Recommendation:</h2>
                    <p>{{ $recommendation }}</p>
                </div>

                @if(isset($additionalRecommendation))
                    <div class="mb-4">
                        <h2>Additional Recommendation:</h2>
                        <p>{{ $additionalRecommendation }}</p>
                    </div>
                @endif
            </div>
        </div>
    </div>

    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.0.7/dist/umd/popper.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
</body>
</html>
