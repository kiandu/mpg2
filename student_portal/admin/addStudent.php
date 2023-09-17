<?php		
	//start a session
	session_start();
	
	//connection string
	$server = "localhost";
	$dbname = "madgov";
	$username = "root";
	$password = "";


	//create connection to the database on the server
	$conn = mysqli_connect($server,$username,$password,$dbname);
	
	// Check connection
	if (mysqli_connect_errno()){
		die ("Failed to connect to MySQL: " . mysqli_connect_error());
	}

	//retrieve the values from the login form and store them in variables
	$studentId = $_POST['studentId'];
	$givenName = $_POST['givenName'];
    $surName = $_POST['surname'];
	$institution= $_POST['institution'];
	$tuitionFee = $_POST['tuition'];
	$address = $_POST['address'];

	$username = $_POST['username'];
	$password = $_POST['password'];
	$email = $_POST['email'];



	//set up the insert statement 
	$addNewStudentSQL = "INSERT INTO student VALUES ('$studentId','$givenName','$surName','$institution',
	'$tuitionFee','$username','$password','$email','$address','','','','');";

	// Insert into the 'appform' table
	$form1SQL = "INSERT INTO app1_form VALUES ('', '$studentId', 'applied');";
	//execute the statement, if not successful, display the error message
	if ($conn->query($addNewStudentSQL,))
	{

		//if ($conn->query($addNewAppFormSQL) === TRUE) {
			echo "Success!";
			$conn->query($form1SQL,);
//		} else {
//			echo "Error: " . $addNewAppFormSQL . "<br>" . $conn->error;
//			}		
}
	else
	{
		die("Error: " . mysqli_error($conn) . " <br /> <a href='addStudent.html'> Try again </a>");
		
	}
	
	//close connection
	mysqli_close($conn);
	
	//provide feeback and redirect to author form
	echo("<script language='javascript' type='text/javascript'> alert('Author details saved, New student and appform records created successfully.!'); 
		window.location='addStudent.html';
		</script>");
		?>