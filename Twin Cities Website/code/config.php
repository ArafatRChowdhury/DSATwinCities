<?php
$servername = "localhost";
$username = "root";
$password = "";
$database = "twin_cities_assessment";

#create a mysqli object that is connected to the database
$conn = new mysqli($servername, $username, $password, $database);

if ($conn->connect_error) { #print an error message if the connection fails
    die("Connection failed: " . $conn->connect_error);
}


#liverpool and rio de janeiro's places of interest are grabbed from the database using sql
$liverpoolSql = "SELECT NameofLocation, Place_Description FROM `place_of_interest` WHERE City_ID=1;";
$liverpoolResult = $conn->query($liverpoolSql);

$rioSql = "SELECT NameofLocation, Place_Description FROM `place_of_interest` WHERE City_ID=2;";
$rioResult = $conn->query($rioSql);

#arrays for each city's places of interest
$liverpoolPlaces = [];
$rioPlaces = [];

#loop through the sql query results and add the name and description to a new dictionary
#in the arrays
if ($liverpoolResult->num_rows > 0) {
    while($row = $liverpoolResult->fetch_assoc()) {
        $liverpoolPlaces[] = [
            "Name" => $row["NameofLocation"],
            "Description" => $row["Place_Description"]
        ];
    }
} else {
    echo "0 results";
}

if ($rioResult->num_rows > 0) {
    while($row = $rioResult->fetch_assoc()) {
        $rioPlaces[] = [
            "Name" => $row["NameofLocation"],
            "Description" => $row["Place_Description"]
        ];
    }
} else {
    echo "0 results";
}

$places = [
    "liverpool" => $liverpoolPlaces,
    "rio" => $rioPlaces
];
$conn->close();
?>