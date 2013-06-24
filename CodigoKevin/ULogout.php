<?php 

	@session_start(); 
	if ( !(isset($_SESSION['myusername']) && isset($_SESSION['mypassword'])) ){
		header("location:ULogin.php");
	}else{
		session_destroy();
	}
?>

<html>
<body style="background-color:orange;">
<img src="/Imagenes/checkers2.png" width="140" height="120">
<img src="/Imagenes/checkers2.png" width="140" height="120" align="right">
<h1 align="center">Damas Chinas</h1>
<br><hr><br><br>
<h2 align="center">Gracias por jugar "Damas Chinas", Vuelve pronto!</h2>

<br>

<div align="center">
<a href="ULogin.php"><button type="button" align="center">Volver a Logearse</button></a>
</div>

</body>
</html>