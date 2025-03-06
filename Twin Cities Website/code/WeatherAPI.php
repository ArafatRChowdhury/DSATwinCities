<html lan="en">

<title>Twin Cities</title>
    <body>
    <button style="width: 120px; height: 30px; border-radius:12px;">Go back to menu</button>
    
<?php

$apiKey = "6e626202bf34252643fa2f0e0f005a67";//API key from OpenWeatherMap.org
//Variables for both cities to add to the URL to search for their weather data 
$liverpool = "Liverpool";
$janeiro = "Rio de Janeiro";

//Current weather url for both cities
$liverpoolweatherurl = "http://api.openweathermap.org/data/2.5/weather?q={$liverpool}&appid={$apiKey}&mode=xml&units=metric";
$janeiroweatherurl = "http://api.openweathermap.org/data/2.5/weather?q={$janeiro}&appid={$apiKey}&mode=xml&units=metric";
//5 day forecast url for both cities
$liverpoolforecasturl = "http://api.openweathermap.org/data/2.5/forecast?q={$liverpool}&appid={$apiKey}&mode=xml&units=metric";
$janeiroforecasturl = "http://api.openweathermap.org/data/2.5/forecast?q={$janeiro}&appid={$apiKey}&mode=xml&units=metric";

//Get current weather data for both cities
$liverpoolweather = simplexml_load_file($liverpoolweatherurl);
$janeiroweather = simplexml_load_file($janeiroweatherurl);

//Get forecast data for both cities
$liverpoolforecast = simplexml_load_file($liverpoolforecasturl);
$janeiroforecast = simplexml_load_file($janeiroforecasturl);

//Function to get weather data and display it in order of what was requested
function displayCurrentWeather($weather, $city) {
    echo "<div style='border:5px solid #ddd; padding: 10px; margin: 10px;'>";
    echo "<h2>Current Weather in $city on " . date('D dS F Y : H:i:s') . "</h2>";
    echo "<p><u>Condition:</u> " . ucfirst($weather->weather['value'] . "</p>");//ucfirst makes the first character of the sentence a capital letter
    echo "<p><u>Temperature:</u> " . $weather->temperature['value'] . "°C</p>";
    echo "<p><u>Wind:</u> " . $weather->wind->speed['value'] ." m/s". "</p>";
    echo "<p><u>Humidity:</u> " . $weather->humidity['value'] . "%</p>";
    echo "<p><u>Sunrise:</u> " . date('G:i:s', strtotime($weather->city->sun['rise'])) . "</p>";
    echo "<p><u>Sunset:</u> " . date('G:i:s', strtotime($weather->city->sun['set'])) . "</p>";
    echo "</div>";
}

// Function to get forecast data and display it 
function displayForecast($forecast, $city) {
    echo "<div style='border:5px solid #ddd; padding: 5px; margin: 10px;'>";
    echo "<h2>5-Day Forecast for $city</h2>";
 
    $currentDate = null;

    foreach ($forecast->forecast->time as $time) {
        $forecastTime = strtotime($time['from']);
        $date = date('Y-m-d', $forecastTime);
        $hour = date('H', $forecastTime);
        if ($hour == "12") {
            if ($currentDate !== $date) {
                $currentDate = $date;

                echo "<h3>" . date('D, d M Y', $forecastTime) . "</h3>";
                echo "<p><u>Condition:</u> " . ucfirst($time->symbol['name'] . "</p>");
                echo "<p><u>Temperature:</u> " . $time->temperature['value'] . "°C</p>";
                
                $windSpeed = isset($time->windSpeed['mps']) ? $time->windSpeed['mps'] : 'N/A';
                $windSpeedName = isset($time->windSpeed['name']) ? $time->windSpeed['name'] : 'N/A';
                $windDirectionName = isset($time->windDirection['name']) ? $time->windDirection['name'] : 'N/A';

                echo "<p><u>Wind:</u> $windSpeed m/s ($windSpeedName) from a $windDirectionName direction</p>";
                echo "<p><u>Humidity:</u> " . $time->humidity['value'] . "%</p>";
                echo "<br>";
            }
        }
    }
    echo "</div>";
}
// Div are made to display the data for current and forecast weather for both cities
echo "<div style='display: flex;'>";
echo "<div>";
displayCurrentWeather($liverpoolweather, $liverpool);
displayForecast($liverpoolforecast, $liverpool);
echo "</div>";
echo "<div>";
displayCurrentWeather($janeiroweather, $janeiro);
displayForecast($janeiroforecast, $janeiro);
echo "</div>";
echo "</div>";
   ?>
   <style>
    p{
       font-size:large;
       font-family:'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
    }
   </style>
 </body>
</html>
