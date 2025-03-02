<?php
include "../config.php";

$christSql = "SELECT StreetName, Postcode, NameofLocation, Place_Description FROM `place_of_interest` WHERE NameofLocation = 'Christ the Redeemer'";
$result = $conn->query($christSql);

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
    <title>Christ the Redeemer - Rio de Janeiro</title>
    <style>
        /* Basic styling for the page */
        body {
            font-family: Arial, sans-serif;
            margin: 20px;
            background-color: #f4f4f4;
        }
        header {
            background-color: #333;
            color: white;
            padding: 15px;
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
            display: block;
            margin: auto;
        }
    </style>
</head>
<body>
    <!-- Header Section -->
    <header>
        <h1><?php echo $info['NameofLocation'] ?></h1>
        <p><?php echo $info['Place_Description'] ?></p>
    </header>

    <!-- Main Content Container -->
    <div class="container">
        <!-- Image of Christ the Redeemer -->
        <img src="https://upload.wikimedia.org/wikipedia/commons/thumb/9/98/Christ_the_Redeemer_-_Cristo_Redentor.jpg/800px-Christ_the_Redeemer_-_Cristo_Redentor.jpg" alt="Christ the Redeemer">
        
        <!-- Description Section -->
        <h2>About the Statue</h2>
        <p>Christ the Redeemer is an iconic statue of Jesus Christ located in Rio de Janeiro, Brazil. It stands at 98 feet (30 meters) tall, with an additional 26-foot (8-meter) pedestal, and its arms stretch 92 feet (28 meters) wide. The statue, made of reinforced concrete and soapstone, is one of the New Seven Wonders of the World.</p>

        <!-- History Section -->
        <h2>History</h2>
        <p>The idea for the statue was first proposed in the 1850s, but it wasn't until 1921 that the project was officially approved. Designed by French sculptor Paul Landowski and Brazilian engineer Heitor da Silva Costa, Christ the Redeemer was completed in 1931. It has since become one of the most recognized symbols of Christianity worldwide.</p>

        <!-- Visiting Information -->
        <h2>Visiting Christ the Redeemer</h2>
        <p>Visitors can reach the statue by train, van, or hiking. The Corcovado Railway offers a scenic ride through the Tijuca Forest to the top of Corcovado Mountain, where the statue is located. The panoramic views of Rio de Janeiro from the summit are breathtaking.</p>

        <h2>Location:</h2>
        <p>Street Name: <?php echo $info['StreetName'] ?></p>
        <p>Postcode: <?php echo $info['Postcode'] ?></p>
    </div>
</body>
</html>