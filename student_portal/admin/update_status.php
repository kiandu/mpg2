<?php
    
    // Update the status in the database
    $servername = "localhost";
    $username = "root";
    $password = "";
    $dbname = "madgov";

    $conn = new mysqli($servername, $username, $password, $dbname);

    if ($conn->connect_error) {
        die("Connection failed: " . $conn->connect_error);
    }
    // Update the status in the database
    // Update the status in the database
    // Update the status in the database
 
    // Connect to your MySQL database (you should have your database connection code here)
    
// Connect to your MySQL database (you should have your database connection code here)

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $studentId = $_POST['studentId'];

    // Update the status in the appform table
    $sql = "UPDATE app1_form SET status = 'approved' WHERE studentId = $studentId";

    if (mysqli_query($conn, $sql)) {
        // Update successful
        echo json_encode(['success' => true]);
        	//provide feeback and redirect to author form
	echo("<script language='javascript' type='text/javascript'> alert('Student Approved successfully.!'); 
    window.location='masterList.php';
    </script>");

    } else {
        // Error occurred
        echo json_encode(['success' => false, 'error' => mysqli_error($conn)]);
    }

    // Close the database connection
    mysqli_close($connection);
}

    ?>
