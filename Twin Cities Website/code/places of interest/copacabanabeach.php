<?php
include "../config.php";

$copacabanaSql = "SELECT StreetName, Postcode, NameofLocation, Place_Description FROM `place_of_interest` WHERE NameofLocation = 'Copacabana Beach'";
$result = $conn->query($copacabanaSql);

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
    <title>Copacabana Beach - Rio de Janeiro</title>
    <style>
        /* Basic styling for the page */
        body {
            font-family: Arial, sans-serif;
            margin: 0;
            padding: 0;
            background-color: #f0f0f0;
        }
        header {
            background-color: #333;
            color: white;
            text-align: center;
            padding: 1em;
        }
        .container {
            width: 80%;
            margin: auto;
            padding: 20px;
            background: white;
            border-radius: 10px;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
        }
        img {
            width: 100%;
            border-radius: 10px;
        }
    </style>
</head>
<body>
    <!-- Header section -->
    <header>
        <h1><?php echo $info['NameofLocation'] ?></h1>
        <p><?php echo $info['Place_Description']?></p>
    </header>
    
    <!-- Main content container -->
    <div class="container">
        <h2>About Copacabana Beach</h2>
        <p>Copacabana Beach is one of the most famous beaches in the world, located in Rio de Janeiro, Brazil. Stretching over 4 kilometers, it is known for its golden sands, vibrant atmosphere, and iconic black-and-white wave-patterned promenade.</p>
        
        <!-- Image of Copacabana Beach -->
        <img src="https://upload.wikimedia.org/wikipedia/commons/8/8f/Copacabana_Beach%2C_Rio_de_Janeiro.jpg" alt="Copacabana Beach in Rio de Janeiro">

        <h2>Location:</h2>
        <p>Street Name: <?php echo $info['StreetName'] ?></p>
        <p>Postcode: <?php echo $info['Postcode'] ?></p>
    </div>
</body>
</html>
