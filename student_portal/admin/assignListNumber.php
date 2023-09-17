
<?php
// Establish a database connection
    $servername = "localhost";
    $username = "root";
    $password = "";
    $dbname = "madgov";

    $conn = new mysqli($servername, $username, $password, $dbname);

    if ($conn->connect_error) {
        die("Connection failed: " . $conn->connect_error);
    }
// Establish a database connection (you should have your database connection code here)

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $studentId = $_POST['studentId'];
    $listNumber = $_POST['listNumber'];

    // Update the students' table with the list number for the specified studentId
    $sql = "UPDATE students SET listId = $listNumber WHERE studentId = $studentId";

    if (mysqli_query($conn, $sql)) {
        // Update successful
        echo json_encode(['success' => true]);
    } else {
        // Error occurred
        echo json_encode(['success' => false, 'error' => mysqli_error($conn)]);
    }

    // Close the database connection
    mysqli_close($conn);
}

    ?>