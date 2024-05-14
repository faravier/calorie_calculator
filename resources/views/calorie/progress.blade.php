<!DOCTYPE html>
<html>
<head>
    <title>Calorie Progress</title>
    <!-- Add the Bootstrap CSS -->
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
</head>
<body>
    <div class="container mt-5">
        <h1 class="text-center mb-4">Calorie Progress Table</h1>
        <div class="mb-3">
        <a href="{{ route('calorie.index') }}" class="btn btn-primary">Calculator</a>
            <a href="{{ route('weekly-progress') }}" class="btn btn-success">Weekly Progress</a>
        </div>
        <table class="table">
            <thead>
                <tr>
                    <th scope="col">#</th>
                    <th scope="col">Food</th>
                    <th scope="col">Activities</th>
                    <th scope="col">Food Calories</th>
                    <th scope="col">Activity Calories</th>
                    <th scope="col">BMR</th>
                    <th scope="col">Total Calories</th>
                    <th scope="col">Date</th>
                </tr>
            </thead>
            <tbody>
                @foreach($entries as $entry)
                    <tr>
                        <th scope="row">{{ $loop->iteration }}</th>
                        <td>{{ $entry->food }}</td>
                        <td>{{ $entry->activities }}</td>
                        <td>{{ $entry->food_calories }}</td>
                        <td>{{ $entry->activity_calories }}</td>
                        <td>{{ $entry->bmr }}</td>
                        <td>{{ $entry->total_calories }}</td>
                        <td>{{ $entry->created_at->toDateString() }}</td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    </div>

    <!-- Add the Bootstrap JS -->
    <script src="https://code.jquery.com/jquery-3.6.0.slim.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.6/dist/umd/popper.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
</body>
</html>
