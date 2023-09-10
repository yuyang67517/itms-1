<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Fullscreen Display</title>
    <style>
        
        body {
            margin: 0;
            padding: 0;
            display: flex;
            justify-content: center;
            align-items: center;
            height: 100vh;
            background-color: #f0f0f0; 
        }

        .fullscreen-content {
            text-align: center;
        }

        .large-text {
            font-size: 64px; 
            font-weight: bold; 
        }

        .small-text {
            font-size: 34px; 
        }
    </style>
</head>
<body>
    <div class="fullscreen-content">
        <h2 class="large-text">Current Number of People Inside:</h2>
        <p class="large-text">{{ $latestData->current_inside }}</p>
        <h2 class="large-text">Estimated Waiting Time</h2>
        <p class="large-text">
            @php
            $currentInside = $latestData->current_inside;
            $waitingTime = 0;

            if ($currentInside > 250 && $currentInside <= 300) {
                $waitingTime = 10;
            } elseif ($currentInside > 300 && $currentInside <= 350) {
                $waitingTime = 15;
            } elseif ($currentInside > 350) {
                $waitingTime = 25;
            }

            echo $waitingTime . ' minutes';
            @endphp
        </p>
        <br>
        <h2 class="small-text">Last Updated Time</h2>
        <p class="small-text">{{ $latestData->timestamp }}</p>
        <a href="javascript:history.back()" class="back-button">Back</a>
    </div>
 
</body>

</html>
