<?php
	include "CheckSession.php";

	$errorMessage = "";
	$newname = "";
	$newlastname = "";
	$newemail = "";
	$day 	= "";
	$month 	= "";
	$year 	= "";

	@session_start();
	$alias = $_SESSION['myusername'];
	
	$host="localhost"; // Host name 
	$username="root"; // Mysql username 
	$password=""; // Mysql password 
	$db_name="test"; // Database name 
	$tbl_name="usuario"; // Table name 

	// Connect to server and select databse.
	mysql_connect("$host", "$username", "$password")or die("cannot connect"); 
	mysql_select_db("$db_name")or die("cannot select DB");
	
	if ($_SERVER['REQUEST_METHOD'] == 'POST'){
		// username and password sent from form 
		$newname=$_POST['nombre'];
		$newlastname=$_POST['apellido'];
		$newemail=$_POST['correo'];
		$day = $_POST['Dia'];
		$month = $_POST['Mes'];
		$year = $_POST['Año'];
		$newbirthdate = $day . '-' . $month . '-' . $year;
		
		// To protect MySQL injection (more detail about MySQL injection)
		$newname = stripslashes($newname);
		$newlastname = stripslashes($newlastname);
		$newemail = stripslashes($newemail);
		
		$newname = mysql_real_escape_string($newname);
		$newlastname = mysql_real_escape_string($newlastname);
		$newemail = mysql_real_escape_string($newemail);
		
		if ( ($newname != "") && ($newlastname != "") && ($newemail != "") && ($day != "Day") && ($month != "Month") && ($year != "Year"))
		{
			$sql="UPDATE $tbl_name SET Nombre = '$newname',Apellido = '$newlastname',Correo = '$newemail',FechaNacimiento = '$newbirthdate' WHERE $tbl_name.Alias = '$alias'";
			$result=mysql_query($sql);

			if($result){
				header("location:UElegirModoJuego.php");
			}
			else {
				$errorMessage = "Datos de actualización incorrectos";
			}
		}else{
			$errorMessage = "Debes completar todos los campos";
		}
	}else{
		$sql="SELECT Nombre,Apellido,Correo,FechaNacimiento FROM $tbl_name WHERE Alias = '$alias'";
		$result = mysql_query($sql);
		$row = mysql_fetch_assoc($result);
		
		if($result){
			$newname = $row['Nombre'];
			$newlastname = $row['Apellido'];
			$newemail = $row['Correo'];
			$newpassword = "";
			$fecha = $row['FechaNacimiento'];
			
			$token = strtok($fecha, "-");
			$i=0;
			while ($token != false){
				switch ($i){
					case "0":
					  $day = $token;
					  break;
					case "1":
					  $month = $token;
					  break;
					case "2":
					  $year = $token;
					  break;
				}
				$token = strtok("-");
				$i++;
			}
		}else {
			echo "<h3>Error en la consulta en al BD de las partidas</h3>";
		}
	}	
?>