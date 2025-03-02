<?php
include "../config.php";

$praiaSql = "SELECT StreetName, Postcode, NameofLocation, Place_Description FROM `place_of_interest` WHERE NameofLocation = 'Pride of Liverpool'";
$result = $conn->query($praiaSql);

$info = [];
if ($result->num_rows > 0) {
    $info = $result->fetch_assoc();
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <!-- Metadata and character encoding -->
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    
    <!-- Page Title -->
    <title>The Pride of Liverpool</title>

    <!-- Basic CSS for styling -->
    <style>
        body {
            font-family: Arial, sans-serif;
            background-color: #f4f4f4;
            margin: 0;
            padding: 0;
            text-align: center;
        }
        header {
            background-color: #c8102e;
            color: white;
            padding: 20px;
            font-size: 24px;
        }
        main {
            margin: 20px;
            padding: 20px;
            background: white;
            border-radius: 8px;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
            max-width: 800px;
            margin: auto;
        }
        img {
            max-width: 100%;
            height: auto;
            border-radius: 8px;
        }
        ul {
            list-style-type: none;
            padding: 0;
        }
        li {
            background: #c8102e;
            color: white;
            margin: 5px;
            padding: 10px;
            border-radius: 5px;
        }
    </style>
</head>
<body>

    <!-- Header Section -->
    <header>
        <h2><?php echo $info['NameofLocation']?></h2>
    </header>

    <!-- Main Content -->
    <main>
        <!-- Image of Liverpool -->
        <img src="https://upload.wikimedia.org/wikipedia/"></img>

        <p><?php echo $info['Place_Description']?></p>

        <h2>Location</h2>
        <p>Street Name: <?php echo $info['StreetName'] ?></p>
        <p>Postcode: <?php echo $info['Postcode'] ?></p>
    </main>
