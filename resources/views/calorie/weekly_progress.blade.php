<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <meta content="width=device-width, initial-scale=1.0" name="viewport">
    <meta content="" name="description">
    <meta content="" name="keywords">
    <title>Weekly Progress</title>
    <!-- Add Chart.js CDN -->
    <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
    <!-- Add the Bootstrap CSS -->
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <link href="/assets/css/style.css" rel="stylesheet">
</head>

<body>
<header id="header" class="fixed-top">
    <div class="container d-flex align-items-center">
   <a href="index.html" class="logo me-auto"><img src="assets/img/logo.png" alt=""></a>
          <nav id="navbar" class="navbar order-last order-lg-0">
        <ul>
          <li><a class="nav-link scrollto " href="#hero">Home</a></li>
          <li><a class="nav-link scrollto" href="#appointment">Calculator</a></li>
          <li><a href="http://127.0.0.1:8000/weekly-progress">Weekly-Progress</a></li>
          <li><a class="nav-link scrollto" href="#recommendations">Recommendations</a></li>
          <li><a class="nav-link scrollto" href="#departments">Rate Us</a></li>          
    </div>
  </header>
    <div class="container mt-5">
        <h1 class="text-center mb-4">Weekly Progress</h1>
        <canvas id="weeklyChart" width="800" height="400"></canvas>
        <div class="text-center mt-4">
            <a href="http://127.0.0.1:8000/" class="btn btn-primary">Back to Home</a>
        </div>
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
