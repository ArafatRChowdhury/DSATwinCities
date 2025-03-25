<?php
#Widget to fetch and display images from Flickr, using the image's PhotoID. This ID is taken from the database.

#This uses the photos.getSizes method from the API. See here: https://www.flickr.com/services/api/flickr.photos.getSizes.html

#Configuration for the database.

$host = 'localhost';
$dbname = 'Twin_Cities_Assessment';
$user = 'root';
$pass = '';

#Connecting to the MYSQL Database via PDO.
$pdo = new PDO("mysql:host=$host;dbname=$dbname", $user, $pass);

$placeName = "Maritime Museum";
$stmt = $pdo->prepare("SELECT FID FROM FlickrPhotos WHERE PlaceName = :placeName");
$stmt->bindParam(':placeName', $placeName, PDO::PARAM_STR);
$stmt->execute();
$result = $stmt->fetch(PDO::FETCH_ASSOC);
$photoId = $result['FID'];

#Configuration for Flickr.
$apiKey = '5dd85487782352db78c622af784de942';





$apiUrl = "https://api.flickr.com/services/rest/?method=flickr.photos.getSizes&api_key=$apiKey&photo_id=$photoId&format=json&nojsoncallback=1";



#Fetching image data from Flickr and converting the response to array. This can then be used to extract the largest final image.
$response = file_get_contents($apiUrl);
$data = json_decode($response, true);


if ($data && isset($data['sizes']['size'])) { #Check data is not null.

    #Fetching the last image in the array - this is the largest image returned by Flickr.
    $largestSize = end($data['sizes']['size']);
    

    $imageUrl = $largestSize['source'];

    #Display the image.
    echo "<img src=\"$imageUrl\" alt=\"Flickr Image\">";
} else {
    echo "Error fetching image";
}
?>
