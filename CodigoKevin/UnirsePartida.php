<?php 
	include "SUnirsePartida.php";
?>

<!DOCTYPE html>
<html>
<head>
<meta name="author" content="Kevin S.">
<title>Damas Chinas</title>
<script>
function check(elemento){
  document.getElementById("eleccion").value=elemento;
}
</script>
</head>

<body style="background-color:orange;">
<img src="/Imagenes/checkers2.png" width="140" height="120">
<img src="/Imagenes/checkers2.png" width="140" height="120" align="right">
<h1 align="center">Damas Chinas</h1>
<br><hr><br>
<h3>Bienvenido:</h3>

<form method="post" action="UnirsePartida.php" style="margin-left:auto; margin-right:auto; width:32%;">
<table border='1' bgcolor="#FFFFFF">
<caption>Lista de Partidas Disponibles</caption>
<tr>
<th>Elecci&oacuten</th>
<th>Nombre</th>
<th>ColoreXJugador</th>
<th>Capture</th>
<th>Disponible</th>
</tr>

<?php crearTabla(); ?>

<br><br><label>Elecci&oacuten:</label> <input type="text" id="eleccion" name="eleccion" readOnly=TRUE placeholder="Elija alguna partida"><br>
<br><input type="submit" name="unirse" value="Unirse a Partida" style="float:left">
<a href="UElegirModoJuego.php"><input type="button" name="cancelar" value="CANCELAR" style="float:right"></a>
</form>

<br><h2 align="center"><?PHP print $errorMessage; ?></h2>

</body>

<!--colgroup>
    <col span="1" style="background-color:red">
    <col style="background-color:yellow">
</colgroup-->

</html>
