<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <link href="/assets/style.css" rel="stylesheet">

    <title>Document</title>
</head>

<body>
<div class="container mt-5">
        <h1 class="text-center mb-4">Calorie Calculator</h1>
        <form style="display: hidden;" action="{{ route('calculateresult') }}" method="post">
            @csrf
            <!-- <div class="form-group">
                <label for="name">Username:</label>
                <input type="text" class="form-control" name="name" required>
            </div> -->
            <div class="form-group">
                <label for="age">Age:</label>
                <input type="number" class="form-control" name="age" required>
            </div>
            <div class="form-group">
                <label for="height">Height:</label>
                <input type="number" class="form-control" name="height" required>
            </div>
            <div class="form-group">
                <label for="weight">Weight:</label>
                <input type="number" class="form-control" name="weight" required>
            </div>
            <div class="form-group">
                <label for="gender">Gender:</label>
                <select class="form-control" name="gender" required>
                    <option value="male">Male</option>
                    <option value="female">Female</option>
                </select>
            </div>
            <div class="form-group">
                <label for="food">Food/Drinks Eaten Today:</label>
                <textarea class="form-control" name="food" rows="4" required></textarea>
            </div>
            <div class="form-group">
                <label for="activities">Activities You Did Today:</label>
                <textarea class="form-control" name="activities" rows="4" required></textarea>
            </div>
            <!-- Add more form-group div elements if needed for additional food/drinks and activities -->
            <button type="submit" class="btn btn-primary">Calculate Calories</button>
            <div class="mt-3">
            <a href="{{ route('progress-table') }}" class="btn btn-secondary">View Progress Table</a>
            </div>
            @if (isset($error))
                <div class="alert alert-danger">
                    {{ $error }}
                </div>
            @endif

        </form>

              @if (isset($calculatedResults))
                <div class="mt-5">
                    <h2>Calculated Results:</h2>
                        {!! $calculatedResults !!}
                </div>
                @endif
    </div>
</body>

</html>