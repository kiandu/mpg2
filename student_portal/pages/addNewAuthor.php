<?php
	//connection string
	$server = "localhost";
	$dbname = "wpulibrary";
	$username = "root";
	$password = "";
	
	
	//create connection to the database on the server
	$connection = mysqli_connect($server,$username,$password,$dbname);
	
	//check if connection is successful
	if (!$connection) 
	{
		die("Connection failed: ".mysqli_connect_error());
	}
				
	//retreive the values from the form and store in variables
	$authorID = $_POST['authorID'];
	$authorFname = $_POST['authorFname'];
	$authorLname = $_POST['authorLname'];
	$authorAddress = $_POST['authorAddress'];
	
	//set up the insert statement 
	$addNewAuthorSQL = "INSERT INTO AUTHOR VALUES ('$authorID','$authorFname','$authorLname','$authorAddress')";
	
	//execute the statement, if not successful, display the error message
	if (!mysqli_query($connection,$addNewAuthorSQL))
	{
		die("Error: " . mysqli_error($conn) . " <br /> <a href='authorform.html'> Try again </a>");
		
	}
	
	//close connection
	mysqli_close($connection);
	
	//provide feeback and redirect to author form
	echo("<script language='javascript' type='text/javascript'> alert('Author details saved'); 
		window.location='index.php';
		</script>");
		?>