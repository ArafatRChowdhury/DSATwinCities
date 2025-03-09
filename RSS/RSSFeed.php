<?php

// Configuration for the database.
@date_default_timezone_set("GMT");

$host = 'localhost';
$DBname = 'Twin_Cities_Assessment';
$user = 'root';
$password = '';
$charset = 'utf8';

// Connecting to the MYSQL Database via PDO.
try {
    $pdo = new PDO("mysql:host=$host;dbname=$DBname;charset=$charset", $user, $password);
    $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
} catch (PDOException $exception) {
    exit('Could not connect to database.');
}

// Fetching and passing the articles using data from the SQL database.

$sqlExc - "SELECT Headline, Link, Body, City_ID, PublishTime FROM News ORDER BY PublishTime DESC LIMIT 10";

$statement = $pdo->query($sqlExc);

$articles = $statement->fetchAll(PDO::FETCH_ASSOC);

// Creating the RSS feed.

header('Content-Type: application/rss+xml; charset=utf-8');

echo "<?xml version='1.0' encoding='UTF-8'?>\n";
echo "<rss version='2.0'>\n";
echo "<channel>\n";
echo "<title>Twined Cities RSS Feed</title>\n";
echo "<link>https://placeholder.com</link>\n";
echo "<description>RSS feed for both Twined Cities.</description>\n";
echo "<language>en-us</language>\n";
echo "<pubDate>" . date(DATE_RSS) . "</pubDate>\n";
foreach ($articles as $article) {
    echo "<item>\n";
    echo "<title>" . htmlspecialchars($article['Headline']) . "</title>\n";
    echo "<link>" . htmlspecialchars($article['Link']) . "</link>\n";
    echo "<description>" . htmlspecialchars($article['Body']) . "</description>\n";

    if ($article["City_ID"] == "1") {
        echo "<category>Rio de Janeiro</category>\n";
    } else {
        echo "<category>Liverpool</category>\n";
    }
    echo "<pubDate>" . date(DATE_RSS, strtotime($article['PublishTime'])) . "</pubDate>\n";
    echo "</item>\n";
}
echo "</channel>\n";
echo "</rss>\n";
?>