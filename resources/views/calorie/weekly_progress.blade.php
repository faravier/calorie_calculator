<!DOCTYPE html>
<html>
<head>
    <title>Weekly Progress</title>
    <!-- Add Chart.js CDN -->
<script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
    <!-- Add the Bootstrap CSS and Chart.js CDN -->
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
</head>
<body>
    <div class="container mt-5">
        <h1 class="text-center mb-4">Weekly Progress</h1>
        <canvas id="weeklyChart" width="800" height="400"></canvas>
    </div>
    <div class="mb-3">
    <a href="{{ route('calorie.index') }}" class="btn btn-primary">Calculator</a>
            <a href="{{ route('progress-table') }}" class="btn btn-primary">Progress Table</a>
        </div>

    <!-- Add the Bootstrap JS -->
    <script src="https://code.jquery.com/jquery-3.6.0.slim.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.6/dist/umd/popper.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>

    <script>
    // Parse JSON strings back into JavaScript arrays
    var chartDates = JSON.parse('{!! $jsonDates !!}');
    var chartTotalCalories = JSON.parse('{!! $jsonTotalCalories !!}');

    // JavaScript code to initialize and configure the chart
    var ctx = document.getElementById('weeklyChart').getContext('2d');
    var myChart = new Chart(ctx, {
        type: 'line',
        data: {
            labels: chartDates,
            datasets: [{
                label: 'Weekly Total Calories',
                data: chartTotalCalories,
                backgroundColor: 'rgba(75, 192, 192, 0.2)',
                borderColor: 'rgba(75, 192, 192, 1)',
                borderWidth: 1
            }]
        },
        options: {
            scales: {
                y: {
                    beginAtZero: true
                }
            }
        }
    });
</script>
</body>
</html>
