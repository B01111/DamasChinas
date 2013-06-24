<?php

	$errorMessage = "";
	
	@session_start();
	if (isset($_SESSION['myusername']) && isset($_SESSION['mypassword'])){
		header("location:UElegirModoJuego.php");
	}
	
	if ($_SERVER['REQUEST_METHOD'] == 'POST'){
		$host="localhost"; // Host name 
		$username="root"; // Mysql username 
		$password=""; // Mysql password 
		$db_name="test"; // Database name 
		$tbl_name="usuario"; // Table name 

		// Connect to server and select databse.
		mysql_connect("$host", "$username", "$password")or die("cannot connect"); 
		mysql_select_db("$db_name")or die("cannot select DB");

		// username and password sent from form 
		$myusername=$_POST['myusername']; 
		$mypassword=$_POST['mypassword']; 
		
		// To protect MySQL injection (more detail about MySQL injection)
		$myusername = stripslashes($myusername);
		$mypassword = stripslashes($mypassword);
		$myusername = mysql_real_escape_string($myusername);
		$mypassword = mysql_real_escape_string($mypassword);

		// encrypt password 
		$encrypted_mypassword=md5($mypassword);
		
		$sql="SELECT * FROM $tbl_name WHERE alias='$myusername' and password='$encrypted_mypassword'";
		$result=mysql_query($sql);
		if($result){
			// Mysql_num_row is counting table row
			$count=mysql_num_rows($result);
		
			// If result matched $myusername and $mypassword, table row must be 1 row
			if($count==1){
				// Register $myusername, $mypassword and redirect to file "login_success.php"
				@session_start();
				$_SESSION['myusername'] = $myusername;
				$_SESSION['mypassword'] = $mypassword;
				header("location:UElegirModoJuego.php");
			}
			else {
				$errorMessage = "Usuario o Contrasena incorrecta";
			}
		}else{
			$errorMessage = 'SQL injection attempt... I dont know who u are, but I will find you <img align="center" src="/Imagenes/sqlinjection.gif" alt="and I will kill you">';
		}
	}
?>