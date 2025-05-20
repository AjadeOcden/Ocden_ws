<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>3-City Weather</title>
    <style>
        .container {
            display: flex;
            justify-content: space-around;
            padding: 20px;
            font-family: Arial, sans-serif;
        }
        .city-card {
            flex: 1;
            margin: 10px;
            padding: 20px;
            background: #f2f2f2;
            border-radius: 10px;
            text-align: center;
            box-shadow: 0 0 10px rgba(0,0,0,0.1);
        }
    </style>
</head>
<body>
    <h2 style="text-align:center;">3-City Weather Report</h2>
    <div class="container">
        @foreach ($weatherData as $weather)
            <div class="city-card">
                @if (isset($weather['error']))
                    <p style="color:red;">{{ $weather['error'] }}</p>
                @else
                     <p><strong>Name:</strong> {{ $weather['city'] }}</p>
                    <p><strong>Temperature:</strong> {{ $weather['temperature'] }} °C</p>
                    <p><strong>Description:</strong> {{ $weather['description'] }}</p>
                    <p><strong>Humidity:</strong> {{ $weather['humidity'] }}%</p>
                @endif
            </div>
        @endforeach
    </div>
</body>
</html>
