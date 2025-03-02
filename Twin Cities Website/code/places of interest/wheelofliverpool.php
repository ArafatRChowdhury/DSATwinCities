<?php
include "../config.php";

$wheelSql = "SELECT StreetName, Postcode, NameofLocation, Place_Description FROM `place_of_interest` WHERE NameofLocation = 'Wheel of Liverpool'";
$result = $conn->query($wheelSql);

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
    <title>Wheel of Liverpool</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            text-align: center;
            background-color: #f4f4f4;
            padding: 20px;
        }
        .container {
            background: white;
            padding: 20px;
            border-radius: 10px;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
            max-width: 600px;
            margin: auto;
        }
        img {
            width: 100%;
            border-radius: 10px;
        }
        button {
            background-color: #e60000;
            color: white;
            border: none;
            padding: 10px 20px;
            font-size: 16px;
            cursor: pointer;
            margin-top: 10px;
            border-radius: 5px;
        }
        button:hover {
            background-color: #b30000;
        }
    </style>
</head>
<body>
    <div class="container">
        <h1><?php echo $info['NameofLocation']?></h1>
        <img src="https://upload.wikimedia.org/wikipedia/commons/3/3a/Liverpool_Wheel_at_Night.jpg" alt="Wheel of Liverpool">
        <p><?php echo $info['Place_Description']?></p>
        <h2>Location</h2>
        <p>Street Name: <?php echo $info['StreetName'] ?></p>
        <p>Postcode: <?php echo $info['Postcode'] ?></p>
        <button onclick="window.location.href="https://en.wikipedia.org/wiki/Wheel_of_Liverpool">Learn More</button>
    </div>
</body>
</html>
