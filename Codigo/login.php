<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.01 Transitional//EN" "http://www.w3.org/TR/html4/loose.dtd"> 
<html>
<head>
	<title>Damas Chinas Log in</title>
	<link href="styles.css" rel="stylesheet" type="text/css" />
	<?php
		include "dbConnect.php";
		$alias = "";
		$error = "";
		if($_SERVER['REQUEST_METHOD'] == 'POST'){
			$alias = htmlspecialchars($_POST['alias']);
			$passw = htmlspecialchars($_POST['passw']);
			
			$connection = dbConnect();
			if(!$connection){
				$error = 'Error al conectarse a la base de datos'.'<BR>';
			}else{
				$SQL = "SELECT * FROM usuario WHERE Alias = '$alias' AND Contrasena = '$passw'";
				$result = mysql_query($SQL);
				if(!$result){
					$error = 'Usuario o password incorrecto'.'<BR>';
					mysql_close($connection);
				}else{
					$num_rows = mysql_num_rows($result);
					mysql_close($connection);
					session_start();
					if ($num_rows <= 0) {
						$error = 'Usuario o password incorrecto'.'<BR>';
						SESSION_UNSET();
						SESSION_DESTROY();
					}else{
						$_SESSION['alias'] = $alias;
						header ("Location: configTorneo.php");
					}
				}
			}
		}else{
			SESSION_START();
			SESSION_UNSET();
			SESSION_DESTROY();
		}
	?>
</head>
<body>
	<FORM NAME ="loginForm" METHOD ="POST" ACTION = "login.php">
		<p><?php print $error?></p>
		<div id="cuadroTitulo">Damas Chinas</div>
		<div class="contentBox">
			Username:<INPUT TYPE="text" NAME="alias" PLACEHOLDER="Username" VALUE= <?php print $alias?>><br>
			Password: <INPUT TYPE="password" NAME="passw" PLACEHOLDER="Password" VALUE= ""><br><br>
			<INPUT TYPE="submit" VALUE="Log in">
		</div>
	</FORM>
</body>
</html>