<?php
include "../config.php";

$museuSql = "SELECT StreetName, Postcode, NameofLocation, Place_Description FROM `place_of_interest` WHERE NameofLocation = 'Museu Botafogo FR'";
$result = $conn->query($museuSql);

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
    <title>Museu Botafogo FR - Rio de Janeiro</title>
    <style>
        /* Basic styling for the page */
        body {
            font-family: Arial, sans-serif;
            margin: 20px;
            padding: 20px;
            background-color: #f4f4f4;
        }
        .container {
            max-width: 800px;
            margin: auto;
            background: white;
            padding: 20px;
            box-shadow: 0px 0px 10px rgba(0, 0, 0, 0.1);
        }
        h1, h2 {
            color: #333;
        }
    </style>
</head>
<body>
    <div class="container">

    <?php
        include "../flickr.php"; 
        $placeName = $info['NameofLocation'];
        echo "<img style=\"width: 30%;\" src=\"$imageUrl\" alt=\"Flickr Image\">"
        ?>
        <!-- Header Section -->
        <h1><?php echo $info['NameofLocation'] ?></h1>
        <p><?php echo $info['Place_Description']?></p>
        
        <!-- History Section -->
        <h2>History</h2>
        <p>The museum showcases the rich history of Botafogo, one of Brazil's most iconic football clubs, featuring trophies, memorabilia, and interactive exhibits.</p>
        
        <!-- Exhibits Section -->
        <h2>Exhibits</h2>
        <ul>
            <li>Historic trophies and medals</li>
            <li>Jerseys worn by legendary players</li>
            <li>Photographs and multimedia presentations</li>
            <li>Interactive fan experiences</li>
        </ul>
        
        <!-- Visiting Information -->
        <h2>Visit Information</h2>
        <p><strong>Location:</strong> <?php echo $info['StreetName']; echo ', '; echo $info['Postcode'] ?></p>
        <p><strong>Opening Hours:</strong> Tuesday - Sunday, 10 AM - 5 PM</p>
        <p><strong>Tickets:</strong> Available at the entrance or online</p>
    </div>
</body>
</html>
