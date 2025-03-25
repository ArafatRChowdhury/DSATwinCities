<?php
include "../config.php";

$parqueLageSql = "SELECT StreetName, Postcode, NameofLocation, Place_Description FROM `place_of_interest` WHERE NameofLocation = 'Botafogo Praia Shopping'";
$result = $conn->query($parqueLageSql);

$info = [];
if ($result->num_rows > 0) {
    $info = $result->fetch_assoc();
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Parque Lage - Rio de Janeiro</title>
    <style>
        /* Basic styling for the page */
        body {
            font-family: Arial, sans-serif;
            margin: 0;
            padding: 0;
            background-color: #f4f4f4;
        }
        .container {
            width: 80%;
            margin: auto;
            padding: 20px;
            background: white;
            box-shadow: 0px 0px 10px rgba(0, 0, 0, 0.1);
        }
        h1 {
            color: #2c3e50;
        }
        img {
            width: 100%;
            height: auto;
            border-radius: 10px;
        }
        p {
            font-size: 16px;
            line-height: 1.6;
        }
    </style>
</head>
<body>
    <div class="container">
        <!-- Page Header -->
        <h1><?php echo $info['NameofLocation']?> - A Hidden Gem in Rio de Janeiro</h1>
        
        <!-- Image of the park -->
        <?php
        include "../flickr.php"; 
        $placeName = $info['NameofLocation'];
        echo "<img style=\"width: 30%;\" src=\"$imageUrl\" alt=\"Flickr Image\">"
        ?>
        
        <!-- Description of the park -->
        <p><?php echo $info['Place_Description']?></p>
        <p>Parque Lage is a beautiful public park located at the foot of Corcovado in Rio de Janeiro, Brazil. It is known for its lush gardens, historic mansion, and stunning views of Christ the Redeemer.</p>
        
        <p>The park is a popular spot for locals and tourists alike, offering a peaceful escape from the city's hustle and bustle. It also houses the Escola de Artes Visuais, an art school that hosts exhibitions and workshops.</p>
        
        <!-- Visiting Information -->
        <h2>Visit Information</h2>
        <ul>
            <li>Location: <?php echo $info['StreetName']; echo ', '; echo $info['Postcode'] ?> Rio de Janeiro</li>
            <li>Opening Hours: Daily from 8 AM to 5 PM</li>
            <li>Entrance Fee: Free</li>
        </ul>
    </div>
</body>
</html>
