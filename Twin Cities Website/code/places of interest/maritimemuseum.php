<?php
include "../config.php";

$maritimeSql = "SELECT StreetName, Postcode, NameofLocation, Place_Description FROM `place_of_interest` WHERE NameofLocation = 'Maritime Museum'";
$result = $conn->query($maritimeSql);

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
    <title>Maritime Museum Liverpool</title>
    <style>
        /* Basic styling for the page */
        body {
            font-family: Arial, sans-serif;
            margin: 0;
            padding: 0;
            background-color: #f4f4f4;
        }
        header {
            background-color: #003366;
            color: white;
            padding: 15px;
            text-align: center;
        }
        nav {
            background-color: #00509E;
            padding: 10px;
            text-align: center;
        }
        nav a {
            color: white;
            margin: 0 15px;
            text-decoration: none;
            font-size: 18px;
        }
        .container {
            padding: 20px;
            max-width: 800px;
            margin: auto;
            background: white;
            box-shadow: 0px 0px 10px gray;
        }
        footer {
            background-color: #003366;
            color: white;
            text-align: center;
            padding: 10px;
            position: fixed;
            bottom: 0;
            width: 100%;
        }
    </style>
</head>
<body>
    <!-- Header section -->
    <header>
        <h1><?php echo $info['NameofLocation']?> Liverpool</h1>
    </header>
    
    <!-- Navigation menu -->
    <nav>
        <a href="#about">About</a>
        <a href="#exhibits">Exhibits</a>
        <a href="#visit">Visit</a>
        <a href="#contact">Contact</a>
    </nav>
    
    <!-- Main content container -->
    <div class="container">
        <section id="about">
            <h2>About the Museum</h2>
            <p><?php echo $info['Place_Description']?></p>
        </section>
        
        <section id="contact">
            <h2>Contact Us</h2>
            <p>For more information, visit our official website or contact us at info@maritimemuseumliverpool.com.</p>
            <h2>Location</h2>
            <p>Street Name: <?php echo $info['StreetName'] ?></p>
            <p>Postcode: <?php echo $info['Postcode'] ?></p>
        </section>
    </div>
    
    <!-- Footer section -->
    <footer>
        <p>&copy; 2025 Maritime Museum Liverpool. All rights reserved.</p>
    </footer>
</body>
</html>
