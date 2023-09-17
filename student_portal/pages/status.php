<?php
	//start a session
	session_start();

        // Establish a database connection
$server = "localhost";
$username = "root";
$password = "";
$dbname = "mpg";

	//create connection to the database on the server
	$conn = mysqli_connect($server,$username,$password,$dbname);

if (isset($_SESSION['username'])) {
    // Fetch the username from the session
    $username = $_SESSION['username'];

} else {
    // Redirect the user to the login page if not logged in
    header("Location: login.php");
    exit;
}

?>


<!DOCTYPE html>

<html>
	<head>
		<meta name="viewport" content="width=device-width, initial-scale=1">
        <!-- Load CSS styles -->
        <link rel="stylesheet" href="../css/styles.css" type="text/css">
		<link rel="stylesheet" href="../css/modals.css" type="text/css">


        <!-- Load external Javascript/JQuery scripts -->	

        <script src="../js/jquery.mobile-1.4.5.js"></script>
        <script src="../js/jquery.mobile-1.4.5.min.js"></script>
        <script src="../js/jquery-2.1.1.js"></script>
        <script src="../js/myjs.js"></script>
	</head>

	<body>
<!-- Header.-->
	<div class="header">
		<a class="imgcontainer">
			<img src="assets/icons/health.jpg" alt="Avatar" class="avatar">
		</a>
			<a href="#default" class="logo">Student Information</a>
			<div class="header-right">
			  <a class="" href="#home">Home</a>
			  <a href="#contact">Contact</a>
			  <a href="#about">About</a>
			</div>
		  </div>

<!-- STUDENT SCHOLARSHIP STATUS TABLE .-->
<!-- oo.-->
	<table id="status_Table">
	<tr>
	<td class="cell0"><p style="font-size:10px;line-height:16px;"><span style="font-size:12px;line-height:21px;">&nbsp;</span><span style="font-size:16px;line-height:20px;font-weight:bold;">Application</span></p></td>
	<td class="cell1"><p style="font-size:10px;line-height:16px;"><span style="font-size:16px;line-height:21px;font-weight:bold;">Annual Tuition</span></p></td>

	</tr>
	<tbody>        

        <?php 

		// Check if the user is logged in (the username should be set in the session)
if (isset($_SESSION['username'])) {
    // Fetch the username from the session
    $username = $_SESSION['username'];

    // Fetch data from the SQL table for the specific user
    $sql = "SELECT * FROM appform WHERE username = '$username'";
    $result = $conn->query($sql);

    // Process the query result
    if ($result->num_rows > 0) {
        // Loop through the results and display the data
		foreach ($result as $row): ?>
			<tr>
			<td><a href="#">View Application Forms</a><br >
				<p>Application Status: <?php echo $row['status']; ?> </p></td>
	
				<td><?php echo $row['tuition']; 
				?></td>
				</tr>
		<?php endforeach; $conn->close();
			
    } else {
        echo "No data found for $username.";}
}else {
    // Redirect the user to the login page if not logged in
    header("Location: login.php");
    exit;
}


?>	
	
    </tbody>
	</table>
<!--ENDS HERE! Form with three Vote Options. Details will be sent to saveVote.php using the post method.-->

</body>

</html>