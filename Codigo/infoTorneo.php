<html>
<head>
	<title>Informacion de Torneo</title>
	<link href="styles.css" rel="stylesheet" type="text/css" />
<?php
	include "dbConnect.php";
	SESSION_START();
	if(!(isset($_SESSION['alias']))){
		SESSION_UNSET();
		SESSION_DESTROY();
		header ("Location: login.php");
	}
	include "topBar.php";
	$idTorneo = $_SESSION['idTorneo'];
	$nombreTorneo =$_SESSION['nombreTorneo'];
	$equipos = $_SESSION['equipos'];
	$participantes = $_SESSION['participantes'];
	$grupos = $_SESSION['faseGrupos'];
	if($grupos){
		$grupos = "Si";
	}else{
		$grupos = "No";
	}
	$ida = $_SESSION['ida'];
	if($ida){
		$ida = "Si";
	}else{
		$ida = "No";
	}
	$tiempoJ = $_SESSION['tiempoJ'];
	$tiempoT = $_SESSION['tiempoT'];
	$capture = $_SESSION['capture'];
	if($capture){
		$capture = "Si";
	}else{
		$capture = "No";
	}
	$error = "";
?>
</head>
<body>
	<FORM NAME ="mainForm" METHOD ="POST" ACTION = "login.php">
		<?php print $topbar ?>
		<H3><?php print $error ?></H3>
		<div id="cuadroTitulo"><?php print $nombreTorneo ?> </div>
		<div class="contentBox">
			<B>IdTorneo: </B> <?php print $idTorneo ?><BR><BR>
			<B>Numero de equipos: </B> <?php print $equipos ?>
			<B>Participantes por equipo: </B> <?php print $participantes ?><BR><BR>
			<B>Grupos: </B> <?php print $grupos ?>
			<B>Ida y vuelta en eliminatoria: </B> <?php print $ida ?><BR><BR>
			<B>Tiempo de juego: </B> <?php print $tiempoJ ?> min
			<B>Tiempo de turno: </B> <?php print $tiempoT ?> s<BR><BR>
			<B>Modo capture: </B> <?php print $capture ?><BR><BR>
			<INPUT TYPE="submit" NAME="OK" VALUE = "Ok">
		</div>
</body>
</html>