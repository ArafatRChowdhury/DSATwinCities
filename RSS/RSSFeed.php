<?php
//Configuration for the database.
@date_default_timezone_set("GMT");

$host = 'localhost';
$dbname = 'Twin_Cities_Assessment';
$user = 'root';
$pass = '';

//Connecting to the MYSQL Database via PDO.
$pdo = new PDO("mysql:host=$host;dbname=$dbname", $user, $pass);

//Fetching and passing the articles using data from the SQL database.
$stmt = $pdo->query("SELECT Headline, Link, Body, City_ID, PublishTime FROM News ORDER BY PublishTime DESC LIMIT 8");
$articles = $stmt->fetchAll(PDO::FETCH_ASSOC);

//Creating the RSS feed.

header("Content-Type: application/rss+xml; charset=UTF-8");

echo '<?xml version="1.0" encoding="UTF-8" ?>';
echo '<rss version="2.0">';
echo '<channel>';
echo '<title>Twined Cities RSS Feed</title>';
echo '<link>http://placeholder.com</link>';
echo '<description>RSS feed for both Twined Cities.</description>';

foreach ($articles as $article) {
    echo '<item>';
    echo '<title>' . htmlspecialchars($article['Headline'], ENT_QUOTES, 'UTF-8') . '</title>';
    echo '<link>' . htmlspecialchars($article['Link'], ENT_QUOTES, 'UTF-8') . '</link>';
    echo '<description>' . htmlspecialchars($article['Body'], ENT_QUOTES, 'UTF-8') . '</description>';
    if ($article["City_ID"] == "1") {
        echo '<category>Rio de Janeiro</category>';
    } else {
        echo '<category>Liverpool</category>';
    }
    echo '<pubDate>' . date(DATE_RSS, strtotime($article['PublishTime'])) . '</pubDate>';
    echo '</item>';
}

echo '</channel>';
echo '</rss>';
?>
