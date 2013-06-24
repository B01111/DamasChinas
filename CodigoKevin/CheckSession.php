<?php 
	@session_start(); 
	if ( !(isset($_SESSION['myusername']) && isset($_SESSION['mypassword'])) ){
		header("location:ULogin.php");
	}
?> 