<?php
include "../config.php";

$liverpoolMountainSql = "SELECT StreetName, Postcode, NameofLocation, Place_Description FROM `place_of_interest` WHERE NameofLocation = 'Liverpool Mountain'";
$result = $conn->query($liverpoolMountainSql);

$info = [];
if ($result->num_rows > 0) {
    $info = $result->fetch_assoc();
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <!-- Meta Tag for Character Encoding -->
    <meta charset="UTF-8">
    <!-- Meta Tag for Viewport to Make Page Responsive -->
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <!-- Title of the Page -->
    <title>Liverpool Mountain</title> 

    <!-- CSS Styles -->
    <style>
        /* CSS styles to improve the page's appearance */
        body {
            font-family: Arial, sans-serif; /* Sets a clean font for the page */
            background-color: #f0f0f0; /* Light background color */
            margin: 0; /* Removes default margin */
            padding: 0; /* Removes default padding */
        }

        header {
            background-color: #ff4d4d; /* Red background color for the header */
            color: white; /* White text color */
            padding: 20px; /* Adds space around the text */
            text-align: center; /* Centers the text */
        }

        main {
            padding: 20px; /* Adds padding around the content */
        }

        .mountain-image {
            width: 100%; /* Makes the image take up the full width of its container */
            height: auto; /* Maintains the aspect ratio of the image */
            border-radius: 8px; /* Adds rounded corners to the image */
        }

        .description {
            background-color: #ffffff; /* White background for the description */
            padding: 15px; /* Adds padding inside the description section */
            border-radius: 8px; /* Rounded corners for the description box */
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1); /* Adds a subtle shadow effect */
            margin-top: 20px; /* Adds some space between the image and the description */
        }

        footer {
            text-align: center; /* Centers the text in the footer */
            padding: 10px; /* Adds padding inside the footer */
            background-color: #333333; /* Dark background color for the footer */
            color: white; /* White text color */
        }
    </style>
</head>
<body>

    <!-- Header Section -->
    <header>
        <h1><?php echo $info['NameofLocation'] ?></h1>
        <p><?php echo $info['Place_Description']?></p>
    </header>

    <!-- Main Content Section -->
    <main>
        <!-- Mountain Image Section -->
        <!-- Image of the mountain (you can replace this with a valid image link) -->
        <img src="https://via.placeholder.com/1200x500?text=Liverpool+Mountain" alt="Liverpool Mountain" class="mountain-image">

        <!-- Description Section -->
        <div class="description">
            <h2>About Liverpool Mountain</h2>
            <p>It's not actually a mountain. It's the first UK public artwork of Swiss artist Ugo Rondinone. Part of his Magic Mountains series.</p>

            <h2>Location</h2>
            <p>Street Name: <?php echo $info['StreetName'] ?></p>
            <p>Postcode: <?php echo $info['Postcode'] ?></p>
        </div>
    </main>

    <!-- Footer Section -->
    <footer>
        <p>&copy; 2025 Liverpool Adventure. All rights reserved.</p>
    </footer>

</body>
</html>
