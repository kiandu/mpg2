<?php		
	//start a session
	session_start();
	
	//if the session is not set, direct the user to index.html.
	if(!isset($_SESSION["fullname"])){
		header("Location: index.html");
	}
?>

<html>
	<head>
		<meta name="viewport" content="width=device-width, initial-scale=1">
        <!-- Load CSS styles -->
        <link rel="stylesheet" href="css/styles.css" type="text/css">

        <!-- Load external Javascript/JQuery scripts -->        
        <script src="js/myOwn.js"></script>

		<style>
* {
  box-sizing: border-box;
}

/* Float four columns side by side */
.column {
  float: left;
  width: 25%;
  padding: 0 10px;
}

/* Remove extra left and right margins, due to padding */
.row {margin-left: 20%;
	margin-bottom: 20%;
}

/* Clear floats after the columns */
.row:after {
  content: "";
  display: table;
  clear: both;
}

/* Style the counter cards */
.card {
  box-shadow: 0 4px 8px 0 rgba(0, 0, 0, 0.2);
  padding: 16px;
  text-align: center;
  background-color: #f1f1f1;
  height:50%;
}
.card h2 {
  margin-top:50%;

}
</style>

	</head>
	<body>

	<div class="header">
			<a href="#default" class="logo" style="margin-left: 40%;">Student Landing page</a>
			<div class="header-right">
			  <a class="active" href="#home">Home</a>
			  <a href="#contact">Contact</a>
			  <a href="loginForm.html">Log Out</a>
			</div>
		  </div>

		<?php 	
			echo("<p style='text-align:center'> Hi, " . $_SESSION['fullname'] . "</p>");
		?>


		
	</body>
</html>