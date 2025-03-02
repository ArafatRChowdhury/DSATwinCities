<?php
include "../config.php";

$sugarloafMountainSql = "SELECT StreetName, Postcode, NameofLocation, Place_Description FROM `place_of_interest` WHERE NameofLocation = 'Sugarloaf Mountain'";
$result = $conn->query($sugarloafMountainSql);

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
    <title>Sugarloaf Mountain - Rio de Janeiro</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            margin: 0;
            padding: 0;
            background-color: #f4f4f4;
            text-align: center;
        }
        .container {
            max-width: 800px;
            margin: auto;
            background: white;
            padding: 20px;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
        }
        img {
            max-width: 100%;
            height: auto;
            border-radius: 10px;
        }
    </style>
</head>
<body>
    <!-- Main container for content -->
    <div class="container">
        <!-- Page title -->
        <h1><?php echo $info['NameofLocation']?></h1>
        <!-- Image of Sugarloaf Mountain -->
        <img src="https://upload.wikimedia.org/wikipedia/commons/f/f7/Sugarloaf_Mountain_in_Rio_de_Janeiro_4.jpg" alt="Sugarloaf Mountain">
        <!-- Description section -->
        <p><?php echo $info['Place_Description']?></p>
        <!-- Cable car information -->
        <h2>Famous Cable Car</h2>
        <p>The Sugarloaf cable car, known as "Bondinho do Pão de Açúcar," connects the city to the summit via a two-stage journey, offering incredible views of Copacabana Beach, Christ the Redeemer, and the surrounding coastline.</p>
        
        <h2>Location</h2>
        <p>Street Name: <?php echo $info['StreetName'] ?></p>
        <p>Postcode: <?php echo $info['Postcode'] ?></p>
    </div>
</body>
</html>
