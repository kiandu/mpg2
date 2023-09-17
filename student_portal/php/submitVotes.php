
<?php 
error_reporting(E_ALL);
ini_set('display_errors', 1);
// Connect to the database
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "dwuPol";

$conn = new mysqli($servername, $username, $password, $dbname);

// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}
//fetching boxNumbers by Choice from ajax.
$Vote1BoxNumber = filter_input(INPUT_POST, 'boxNumber1', FILTER_SANITIZE_STRING);
$Vote2BoxNumber = filter_input(INPUT_POST, 'boxNumber2', FILTER_SANITIZE_STRING);
$Vote3BoxNumber = filter_input(INPUT_POST, 'boxNumber3', FILTER_SANITIZE_STRING);

// Assuming you have established a database connection

// Assuming you have established a database connection

// Prepare the SQL statement to update the vote count for each candidate
$sql1 = "UPDATE candidate SET
        vote1 = vote1 + 1
        WHERE boxNumber = ?";

$sql2 = "UPDATE candidate SET
vote2 = vote2 + 1
WHERE boxNumber = ?";

$sql3 = "UPDATE candidate SET
        vote3 = vote3 + 1
        WHERE boxNumber = ?";

$stmt1 = $conn->prepare($sql1);
$stmt2 = $conn->prepare($sql2);
$stmt3 = $conn->prepare($sql3);


// Bind and execute for the first candidate
$stmt1->bind_param("s", $Vote1BoxNumber);
$stmt1->execute();

// Bind and execute for the second candidate
$stmt2->bind_param("s", $Vote2BoxNumber);
$stmt2->execute();

// Bind and execute for the third candidate
$stmt3->bind_param("s", $Vote3BoxNumber);
$stmt3->execute();

echo "Votes Submitted!!";

// Close the prepared statement and database connection

$conn->close();
?>



