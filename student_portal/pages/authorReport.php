<?php		
	session_start();
			
	if(!isset($_SESSION["fullname"])){
		header("Location: loginForm.html");
	}
?>
<html>
	<head>
	</head>
	
	<body>
	
		<h4 style="text-align:center"> Western Pacific University Library </h4>
		<?php 	
			echo("<p style='text-align:center'> Hi, " . $_SESSION['fullname'] . "</p>");
		?>
		<p style="text-align:center">
			<a href="index.html"> Home </a> |
			<a href="authorform.html"> Add New Author </a> | 
			<a href="logout.php"> Logout </a>
		</p>
		
		<?php	
			//connection string
			$server = "localhost";
			$dbname = "WPULibrary";
			$username = "root";
			$password = "";
	
			//create connection to the database on the server
			$connection = mysqli_connect($server,$username,$password,$dbname);
			
			// Check connection
			if (mysqli_connect_errno()){
				die ("Failed to connect to MySQL: " . mysqli_connect_error());
			}
	  
			//setup the sql statement
			$authordetailsql = "SELECT * FROM AUTHOR";
			
			//execute sql statement and store results in a variable
			$authordetails = mysqli_query($connection,$authordetailsql);
				  
			//check if first row is not null
			$row = mysqli_fetch_array($authordetails);
			
			//check if the row is not empty
			if($row <> null){
				//set up a table to display the list of authors
				echo ("<div align='center'>");
				echo ("<p><b> List of Authors </b></p>");
				echo ("<table border='1' cellspacing='0' cellpadding='5'>");
				echo("<tr><th>Author ID</th><th>Firstname</th> <th>Lastname</th> <th>Address</th></tr>");
				
				//print first row (record)
				echo("<tr>");
				echo("<td>" . $row['authorid'] . "</td>");
				echo("<td>" . $row['firstname'] . "</td>");
				echo("<td>" . $row['lastname'] . "</td>");
				echo("<td>" . $row['address'] . "</td>");
				echo("<tr>");
				
				//while there are more records, print them using a loop.
				while($row = mysqli_fetch_array($authordetails)){
					echo("<tr>");
					echo("<td>" . $row['authorid'] . "</td>");
					echo("<td>" . $row['firstname'] . "</td>");
					echo("<td>" . $row['lastname'] . "</td>");
					echo("<td>" . $row['address'] . "</td>");
					echo("<tr>");
				}	
				echo "</table><br />";
			}
			
			//if there are records, print an informative message
			else{
				echo("<p style='text-align:center'>There are no records</p>");
			}
			
			//after performing the operation, close the connection
			mysqli_close($connection);
		?>
	</body>
</html>