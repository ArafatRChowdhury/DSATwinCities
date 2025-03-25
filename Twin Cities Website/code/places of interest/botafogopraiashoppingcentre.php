<?php
include "../config.php";

$praiaSql = "SELECT StreetName, Postcode, NameofLocation, Place_Description FROM `place_of_interest` WHERE NameofLocation = 'Botafogo Praia Shopping'";
$result = $conn->query($praiaSql);

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
    <title>Botafogo Praia Shopping Centre</title>
    <style>
        /* Basic styling for layout */
        body {
            font-family: Arial, sans-serif;
            margin: 0;
            padding: 0;
            background-color: #f4f4f4;
            text-align: center;
        }
        header {
            background-color: #333;
            color: white;
            padding: 20px;
        }
        .content {
            padding: 20px;
        }
        .image {
            width: 100%;
            max-width: 600px;
            border-radius: 10px;
        }
    </style>
</head>
<body>
    <!-- Header Section -->
    <header>
        <h1>Welcome to Botafogo Praia Shopping</h1>
    </header>
    
    <!-- Main Content Section -->
    <div class="content">
        <h2><?php echo $info['NameofLocation'] ?></h2>
        <p><?php echo $info['Place_Description'] ?></p>
        
        <!-- Image of the Shopping Centre -->
        <?php
        include "../flickr.php"; 
        $placeName = $info['NameofLocation'];
        echo "<img style=\"width: 30%;\" src=\"$imageUrl\" alt=\"Flickr Image\">"
        ?>
        
        <!-- Features Section -->
        <h2>What You Can Find Here</h2>
        <ul>
            <li>Fashion & Retail Stores</li>
            <li>Food Court with local and international cuisines</li>
            <li>Movie Theater with latest releases</li>
            <li>Stunning view of Sugarloaf Mountain</li>
        </ul>
        
        <!-- Location Section -->
        <h2>Visit Us</h2>
        <p>Street Name: <?php echo $info['StreetName'] ?></p>
        <p>Postcode: <?php echo $info['Postcode'] ?></p>
    </div>
</body>
</html>
