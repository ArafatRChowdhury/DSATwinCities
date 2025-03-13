<html lan="en">

<title>Liverpool & Rio de Janeiro Weather</title>
    <body style="background-color:lightblue;">
        <h2 style="padding-left:310px; padding-top:10px;">Weather Report</h2> 
        <button style="width: 120px; height: 30px; border-radius:12px;">Go back to menu</button>
<?php

$apiKey = "6e626202bf34252643fa2f0e0f005a67";//API key from OpenWeatherMap.org
//Variables for both cities to add to the URL to search for their weather data 
$liverpool = "Liverpool";
$janeiro = "Rio de Janeiro";

//URLs to see the current weather and 5 day forecast in Liverpool
$liverpoolweatherurl = "http://api.openweathermap.org/data/2.5/weather?q={$liverpool}&appid={$apiKey}&mode=xml&units=metric";//Current weather
$liverpoolforecasturl = "http://api.openweathermap.org/data/2.5/forecast?q={$liverpool}&appid={$apiKey}&mode=xml&units=metric";//5-day forecast
//URLs to see the current weather and 5 day forecast in Rio de Janeiro
$janeiroweatherurl = "http://api.openweathermap.org/data/2.5/weather?q={$janeiro}&appid={$apiKey}&mode=xml&units=metric";//Current weather
$janeiroforecasturl = "http://api.openweathermap.org/data/2.5/forecast?q={$janeiro}&appid={$apiKey}&mode=xml&units=metric";//5-day forecast

//Get the current weather and forecast data for Liverpool
$liverpoolweather = simplexml_load_file($liverpoolweatherurl);
$liverpoolforecast = simplexml_load_file($liverpoolforecasturl);
//Get the current weather and forecast data for Rio de Janeiro
$janeiroweather = simplexml_load_file($janeiroweatherurl);
$janeiroforecast = simplexml_load_file($janeiroforecasturl);
//Function to get the current weather in Liverpool and Rio de Janeiro
function currentweatherinCity($weather,$city){
    echo "<div style='border:10px solid #000000; padding:10px; margin:10px;'>";
    echo "<h2><u> Current Weather in $city on ". date('D dS F Y : H:i:s')."</u></h2>";//Displays a header with the name of the city and the time
    echo "<p><u>Temperature :</u> " . $weather->temperature['value'] . "°C"."</p>"; //Displays the weather in Celsius
    echo "<p><u>Condition :</u> " . ucfirst($weather->weather['value'] . "</p>");//ucfirst makes the first character of the sentence a capital letter
    echo "<p><u>Sunrise :</u> " . date('G:i:s', strtotime($weather->city->sun['rise'])) ." am". "</p>";//Displays the sunrise time
    echo "<p><u>Sunset :</u> " . date('G:i:s', strtotime($weather->city->sun['set'])) ." pm". "</p>";//Displayes the sunset time
    echo "<p><u>Humidity :</u> " . $weather->humidity['value'] . "%"."</p>";//Displays the humidity
}

// Function to get the 5-day forecast weather in Liverpool and Rio de Janeiro
function forecastinCity($forecast, $city) {
    echo "<div style='border:1px solid #000000; padding: 6px; margin: 20px;'>";
    echo "<h1><u>5-Day Forecast for $city</u></h1>";//Displays a header with the name of the city
    //Loop to only display 5 days of forecast
    foreach ($forecast->forecast->time as $time) {//Limits the results of the forecast to only show a certain time period
        $forecastTime = strtotime($time['from']);
        $hour = date('H', $forecastTime);
        if ($hour == "12") {

                echo "<h3>" ."<u>". date('D, d M Y', $forecastTime) ."</u>". "</h3>";//Displays a header with the date for a 5 day forecast
                echo "<p><u>Temperature :</u> " . $time->temperature['value'] . "°C"."</p>";//Displays the temperature in Celsius
                echo "<p><u>Condition :</u> " . ucfirst($time->symbol['name'] . "</p>");//Displays the condition of the weather
                echo "<p><u>Humidity :</u> " . $time->humidity['value'] . "%</p>";//Displays the humidity
                echo "<br>";
        }
    }
    echo "</div>";
}
// Div are made to display the data for current and forecast weather for both cities
echo "<div style='padding-left:300px;padding-right:400px;'>";
echo "<div>";//<div> to display the weather data for liverpool and the forecast for liverpool
currentweatherinCity($liverpoolweather, $liverpool);
forecastinCity($liverpoolforecast, $liverpool);
echo "</div>";
echo "<br>";
echo "<br>";
echo "<div>";//<div> to display the weather data for liverpool and the forecast for Rio de Janeiro
currentweatherinCity($janeiroweather, $janeiro);
forecastinCity($janeiroforecast, $janeiro);
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


