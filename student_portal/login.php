<?php		
	//start a session
	session_start();
	
	//connection string
	$server = "localhost";
	$dbname = "madgov";
	$username = "root";
	$password = "";

	//create connection to the database on the server
	$connection = mysqli_connect($server,$username,$password,$dbname);
	
	// Check connection
	if (mysqli_connect_errno()){
		die ("Failed to connect to MySQL: " . mysqli_connect_error());
	}

	//retrieve the values from the login form and store them in variables
	$username = $_POST['username'];
	$password = $_POST['password'];

	//setup the sql statement
	$usersSQL = "SELECT * FROM credentials WHERE username= '" . $username . "' AND Password = '" . $password . "'";
	
	//execute sql statement and store results in a variable
	$userDetails = mysqli_query($connection,$usersSQL);
		  
	//check if first row is not null
	$row = mysqli_fetch_array($userDetails);
	

	//*** IMPORTANT **!!if login is successful, store the user's fullname in a session
	if($row <> null){
		$_SESSION['username'] = $username;
		$role= $row['role'];
		if($role=="admin"){
			header("Location: admin/adminIndex.html");

		}
		if($role=="student"){
			header("Location: pages/Form2.html");
		}
	}
	
	//if login not successful, redirect user to loginForm.html
	else{
		
		header("Location: /pages/status.php");
		echo("<script language='javascript' type='text/javascript'> alert('Username or Password Incorrect!'); 
		</script>");
	}

	
	//close connection
	mysqli_close($connection);
?>