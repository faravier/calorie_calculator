<!DOCTYPE html>
<html>
<head>
    <title>Calorie Calculator</title>
    <!-- Add the Bootstrap CSS -->
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
</head>
<body>
    <div class="container mt-5">
              @if (isset($calculatedResults))
                <div class="mt-5">
                    <h2 class="text-center mb-5">Calculated Results:</h2>
                    <div class="row text-center" id="container-result">
                        <div class="col-md-4">
                            <h4>Food</h4>
                            <div class="icon-result"><i class="bi bi-egg-fried"></i></div>
                            <p> {{ $dataObject->food }}</p>
                        </div>
                        <div class="col-md-4">
                            <h4>Activities</h4>
                            <div class="icon-result"><i class="bi bi-person-walking"></i></div>
                            <p>{{ $dataObject->activities }}</p>
                        </div>
                        <div class="col-md-4">
                            <h4>Food Calories</h4>
                            <div class="icon-result"><i class="bi bi-fire"></i></div>
                            <p>{{ $dataObject->food_calories }}</p>
                        </div>
                        <div class="col-md-4">
                            <h4>Activity Calories</h4>
                            <div class="icon-result"><i class="bi bi-exclamation-triangle-fill"></i></div>
                            <p>{{ $dataObject->activity_calories }}</p>
                        </div>
                        <div class="col-md-4">
                            <h4>BMR</h4>
                            <div class="icon-result"><i class="bi bi-speedometer2"></i></div>
                            <p>{{ $dataObject->bmr }}</p>
                        </div>
                        <div class="col-md-4">
                            <h4>Total Calories</h4>
                            <div class="icon-result"><i class="bi bi-pc-display-horizontal"></i></div>
                            <p>{{ $dataObject->total_calories }}</p>
                        </div>
                    </div>
                </div>
                @endif
    </div>

    <!-- Add the Bootstrap JS -->
    <script src="https://code.jquery.com/jquery-3.6.0.slim.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.6/dist/umd/popper.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
</body>
</html>
