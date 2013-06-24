<?php
	include "CheckSession.php";

	$errorMessage 	= "";

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
		$newpassword=$_POST['contrasena'];
		$rnewpassword=$_POST['rcontrasena'];
		$oldpassword=$_POST['actual'];
		
		// To protect MySQL injection (more detail about MySQL injection)
		$newpassword = stripslashes($newpassword);
		$rnewpassword= stripslashes($rnewpassword);
		$oldpassword = stripslashes($oldpassword);
		
		$newpassword = mysql_real_escape_string($newpassword);
		$rnewpassword= mysql_real_escape_string($rnewpassword);
		$oldpassword = mysql_real_escape_string($oldpassword);
		
		if ( ($newpassword != "") && ($rnewpassword!="") && ($oldpassword!="") )
		{
			if( ($oldpassword == $_SESSION['mypassword']) && ($newpassword == $rnewpassword) ){
				// encrypt password 
				$encrypted_newpassword=md5($newpassword);
				$sql="UPDATE $tbl_name SET Password = '$encrypted_newpassword' WHERE $tbl_name.Alias = '$alias'";
				$result=mysql_query($sql);

				if($result){
					$errorMessage = "Se efectu&oacute correctamente el cambio de password";
				}else{
					$errorMessage = "Datos invalidos";
				}
			}else{
				$errorMessage = "Inconsistencia en passwords ingresados"; 
			}
		}
		else
		{
			$errorMessage = "Debes completar todos los campos";
		}
	}
?>