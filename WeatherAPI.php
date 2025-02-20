<html>
  <header><title>Weather API</title></header>
  <body>
    <h3>Twin Cities (Liverpool & Rio de Janeiro)</h3>
<?php
if ( 'post' === strtolower($_SERVER['REQUEST_METHOD']) ) {
?>
  <h2><?php 
    $apiKey = "6e626202bf34252643fa2f0e0f005a67"; //API Key from Open Weather Map
     $xml = new SimpleXMLElement('https://api.openweathermap.org/data/2.5/weather?mode=xml&units=metric&q='.$_POST['city'].'&appid='. $apiKey,0,true);
     echo $xml->temperature['value']; ?> </h2>
<?php
} else {
?>
    <form method="post">
      <label for="city">Select your city</label>
      <select name="city" id="city">
            <option value="Liverpool">Liverpool</option>
            <option value="Rio de Janeiro">Rio de Janeiro</option>
        </select>
        <input type="submit" value="Get your city's temperature">
    </form>
<?php
}
 ?>

  </body>
</html>
