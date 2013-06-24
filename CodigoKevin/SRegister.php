<?php

	$errorMessage 	= "";
	$newname		= ""; 
	$newlastname	= "";
	$newalias		= "";
	$newemail		= "";
	$newpassword	= "";
	$day 			= "Day";
	$month 			= "Month";
	$year 			= "Year";
	
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
		$newname=$_POST['nombre']; 
		$newlastname=$_POST['apellido'];
		$newalias=$_POST['alias'];
		$newemail=$_POST['correo'];
		$newpassword=$_POST['password'];
		
		$day = $_POST['Day'];
		$month = $_POST['Month'];
		$year = $_POST['Year'];
		$newbirthdate = $day . '-' . $month . '-' . $year;
		
		// To protect MySQL injection (more detail about MySQL injection)
		$newname = stripslashes($newname);
		$newlastname = stripslashes($newlastname);
		$newalias = stripslashes($newalias);
		$newemail = stripslashes($newemail);
		$newpassword = stripslashes($newpassword);
		
		$newname = mysql_real_escape_string($newname);
		$newlastname = mysql_real_escape_string($newlastname);
		$newalias = mysql_real_escape_string($newalias);
		$newemail = mysql_real_escape_string($newemail);
		$newpassword = mysql_real_escape_string($newpassword);
		
		if ( ($newname != "") && ($newlastname != "") && ($newalias != "") && ($newemail != "") && ($newpassword != "") && ($day != "Day") && ($month != "Month") && ($year != "Year"))
		{
			// encrypt password 
			$encrypted_newpassword=md5($newpassword);

			$sql="INSERT INTO $tbl_name (Alias,Password,Nombre,Apellido,Correo,FechaNacimiento) VALUES ('$newalias','$encrypted_newpassword','$newname','$newlastname','$newemail','$newbirthdate')";
			$result=mysql_query($sql);

			if($result){
				header("location:ULogin.php");
			}
			else {
				$errorMessage = "Datos incorrectos de Registro";
			}
		}
		else
		{
			$errorMessage = "Debes completar todos los campos";
		}
		
	}
	
?>