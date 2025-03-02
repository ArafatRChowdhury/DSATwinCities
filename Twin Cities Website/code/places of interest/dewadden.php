<?php
include "../config.php";

$dewaddenSql = "SELECT StreetName, Postcode, NameofLocation, Place_Description FROM `place_of_interest` WHERE NameofLocation = 'De Wadden'";
$result = $conn->query($dewaddenSql);

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
    <title>De Wadden - Liverpool</title>
    
    <!-- Link to external stylesheet (optional) -->
    <link rel="stylesheet" href="styles.css">
    
    <style>
        /* Basic styles for the page */
        body {
            font-family: Arial, sans-serif;
            margin: 0;
            padding: 0;
            background-color: #f8f8f8;
        }

        /* Header styling */
        header {
            background-color: #333;
            color: white;
            padding: 20px;
            text-align: center;
        }

        /* Main content container */
        .container {
            width: 80%;
            margin: auto;
            padding: 20px;
            background-color: white;
            box-shadow: 0px 0px 10px rgba(0, 0, 0, 0.1);
        }

        /* Footer styling */
        footer {
            text-align: center;
            padding: 10px;
            background-color: #333;
            color: white;
            margin-top: 20px;
        }
    </style>
</head>
<body>

    <!-- Header Section -->
    <header>
        <h1><?php echo $info['NameofLocation'] ?></h1>
        <p><?php echo $info['Place_Description'] ?></p>
    </header>

    <!-- Main Content Section -->
    <div class="container">
        <h2>About De Wadden</h2>
        <p>De Wadden is a well-known Dutch-style pub located in Liverpool. With its unique architecture and rich history, it has been a favorite spot for locals and visitors alike.</p>

        <h2>Location</h2>
        <p>Street Name: <?php echo $info['StreetName'] ?></p>
        <p>Postcode: <?php echo $info['Postcode'] ?></p>

        <h2>Gallery</h2>
        <!-- Placeholder image for the pub -->
        <img src="de_wadden.jpg" alt="De Wadden Pub in Liverpool" width="100%">
    </div>

</body>
</html>
