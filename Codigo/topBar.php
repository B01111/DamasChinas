<?php
	$error = "";
	$connection = dbConnect();
	if(!$connection){
		$error = 'Error al conectarse a la base de datos'.'<BR>';
	}else{
		$alias = $_SESSION['alias'];
		$SQL = "SELECT * FROM usuario WHERE Alias = '$alias'";
		$result = mysql_query($SQL);
		$db_field = mysql_fetch_assoc($result);
		$nombre = $db_field['Nombre'];
		$apellido = $db_field['Apellido'] ;
		mysql_close($connection);				
	}
	$topbar = "<ul class='topbar'><li>".$nombre." ".$apellido."</li></ul>";
?>