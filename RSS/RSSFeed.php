<?php

//Configuration for the database.
@date_default_timezone_set("GMT");

$host = 'localhost';
$DBname = 'Twin_Cities_Assessment';
$user = 'root';
$password = '';
$charset = 'utf8';

//Connecting to the MYSQL Database via PDO.
try {
    $pdo = new PDO("mysql:host=$host;dbname=$DBname;charset=$charset", $user, $password);
    $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
} catch (PDOException $exception) {
    exit('Could not connect to database.');
}

$statement = $pdo->prepare("SELECT * FROM news WHERE City_ID = :city_id");

$statement->bindParam(':city_id', $city_id, PDO::PARAM_INT);

$city_id = 1;
$statement->execute();

$news = $statement->fetchAll(PDO::FETCH_ASSOC);

foreach ($news as $article) {
    echo $article['Headline'] . "<br>";
}

?>