<?php
include "config.php";
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <!-- Meta information for the page -->
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Maldron Hotel Liverpool</title>
    
    <!-- Link to an external CSS file (optional) -->
    <link rel="stylesheet" href="styles.css">
    
    <style>
        /* Internal CSS for basic styling */
        body {
            font-family: Arial, sans-serif;
            margin: 0;
            padding: 0;
            background-color: #f4f4f4;
        }
        header {
            background-color: #333;
            color: white;
            padding: 15px;
            text-align: center;
        }
        nav {
            background: #555;
            padding: 10px;
            text-align: center;
        }
        nav a {
            color: white;
            margin: 0 15px;
            text-decoration: none;
        }
        .container {
            width: 80%;
            margin: 20px auto;
            background: white;
            padding: 20px;
            border-radius: 5px;
        }
        footer {
            background: #333;
            color: white;
            text-align: center;
            padding: 10px;
            margin-top: 20px;
        }
    </style>
</head>
<body>

    <!-- Header section with hotel name -->
    <header>
        <h1>Maldron Hotel Liverpool</h1>
    </header>

    <!-- Navigation menu with links -->
    <nav>
        <a href="#about">About</a>
        <a href="#rooms">Rooms</a>
        <a href="#facilities">Facilities</a>
        <a href="#contact">Contact</a>
    </nav>

    <!-- Main content section -->
    <div class="container">
        
        <!-- About the hotel -->
        <section id="about">
            <h2>About the Hotel</h2>
            <p>The Maldron Hotel in Liverpool is a luxury hotel offering comfort, style, and excellent service in the heart of the city.</p>
        </section>

        <!-- Room details -->
        <section id="rooms">
            <h2>Our Rooms</h2>
            <p>Choose from a variety of rooms, including standard, deluxe, and suites, all equipped with modern amenities.</p>
        </section>

        <!-- Hotel facilities -->
        <section id="facilities">
            <h2>Facilities</h2>
            <ul>
                <li>Free Wi-Fi</li>
                <li>Restaurant & Bar</li>
                <li>Gym & Fitness Center</li>
                <li>Conference Rooms</li>
                <li>24-hour Reception</li>
            </ul>
        </section>

        <!-- Contact information -->
        <section id="contact">
            <h2>Contact Us</h2>
            <p>Email: info@maldronliverpool.com</p>
            <p>Phone: +44 151 123 4567</p>
            <p>Address: 123 Liverpool Street, Liverpool, UK</p>
        </section>

    </div>

    <!-- Footer section -->
    <footer>
        <p>&copy; 2025 Maldron Hotel Liverpool | All Rights Reserved</p>
    </footer>

</body>
</html>
