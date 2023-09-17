<?php

// Connect to the database
$server = "localhost";
$username = "root";
$password = "";
$dbname = "dwuPol";

// Create MySQL connection
$conn = mysqli_connect($server, $username, $password, $dbname);

// Check connection
if (mysqli_connect_errno()){
	die ("Failed to connect to MySQL: " . mysqli_connect_error());
}

// Execute SELECT query to retrieve all candidates
$result = mysqli_query($conn, "SELECT * FROM candidate WHERE candSeat='Male Vice President';");

// Fetch results and store in an array
$candidates = array();
while ($row = mysqli_fetch_assoc($result)) {
    $candidates[] = $row;
}

// Convert array to JSON and output
echo json_encode($candidates);

?>
