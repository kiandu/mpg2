<?php		
	
	//start the session
	session_start();
	
	//when the user logs out, remove all session variables
	session_unset();

	// destroy the session
	session_destroy();
	
	//redirect the user to index.html
	header("location: index.html");
?>