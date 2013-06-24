<?php 
	//include "";
	$errorMessage="";
?>

<!DOCTYPE html>
<html>
<head>
<meta name="author" content="Kevin S.">
<title>Damas Chinas</title>
</head>

<body style="background-color:orange;">
<img src="/Imagenes/checkers2.png" width="140" height="120">
<img src="/Imagenes/checkers2.png" width="140" height="120" align="right">
<h1 align="center">Damas Chinas</h1>
<br><hr><br>
<h3>Bienvenido:</h3>

<form method="post" action="SJugar.php" style="margin-left:auto; margin-right:auto; width:32%;">
<table border='1'>
<caption>Lista de Jugadores/Equipos</caption>
<tr>
<th>Nombre</th>
<th>Color</th>
<th>Equipo</th>
</tr>
</table>
<?php //crearTabla(); ?>

<br><br><input type="submit" name="unirse" value="JUGAR" style="float:left">
<a href="UnirseTorneo.php"><input type="button" name="cancelar" value="CANCELAR" style="float:right"></a>
</form>

<br><h2 align="center"><?PHP print $errorMessage; ?></h2>

</body>
</html>
