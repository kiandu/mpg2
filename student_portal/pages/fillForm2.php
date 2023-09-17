<?php		
	//start a session
	session_start();
	
	//connection string
	$server = "localhost";
	$dbname = "mpg";
	$username = "root";
	$password = "";


	//create connection to the database on the server
	$conn = mysqli_connect($server,$username,$password,$dbname);
	
	// Check connection
	if (mysqli_connect_errno()){
		die ("Failed to connect to MySQL: " . mysqli_connect_error());
	}

	//retrieve the values from the login form and store them in variables
	$institution = $_POST['institution'];
	$yearLevel = $_POST['yearLevel'];
	$tuition = $_POST['tuition'];
	$schAmount = $_POST['schAmount'];



	//set up the insert statement 
	$addNewStudentSQL = "INSERT INTO scholarship_form VALUES ('$institution','$yearLevel','$tuition','$schAmount');";


	//execute the statement, if not successful, display the error message
	if ($conn->query($addNewStudentSQL,))
	{
		  // Insert into the 'appform' table
            header("Location: status.php");
            exit;
		
	}
	else
	{
		die("Error: " . mysqli_error($conn) . " <br /> <a href='addStudent.html'> Try again </a>");
		
	}
	
	//close connection
	mysqli_close($conn);
	
	//provide feeback and redirect to author form
	echo("<script language='javascript' type='text/javascript'> alert('Author details saved, New student and appform records created successfully.!'); 
		window.location='status.php';
		</script>");
		?>