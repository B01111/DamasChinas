<html>
<head>
	<title>Configurar Torneo</title>
	<?php
		include "functions.js";
		include "confTorneoVars.php"; 
	?>
	<link href="styles.css" rel="stylesheet" type="text/css" />
</head>
<body>
	<FORM NAME ="mainForm" METHOD ="POST" ACTION = "configTorneo.php" onsubmit="return checkFields('nombreTorneo')">
		<?php print $topbar ?>
		<H3><?php print $error ?></H3>
		<div id="cuadroTitulo">Configurar Torneo</div>
		<div class="contentBox">
		Nombre del Torneo:
		<INPUT TYPE="text" NAME="nombreTorneo" SIZE="50" VALUE = "<?php print($nombreTorneo) ?>" ><br><br>
		Cantidad de equipos:
		<SELECT NAME="numEquipos">
			<OPTION VALUE=4 <?php print $optNequipos4?>>4</OPTION>
			<OPTION VALUE=8 <?php print $optNequipos8?>>8</OPTION>
			<OPTION VALUE=16 <?php print $optNequipos16?>>16</OPTION>
			<OPTION VALUE=32 <?php print $optNequipos32?>>32</OPTION>
		</SELECT>
		Participantes por equipo:
		<SELECT NAME="numPartic">
			<OPTION VALUE=1 <?php print $optNpartic1?>>1</OPTION>
			<OPTION VALUE=2 <?php print $optNpartic2?>>2</OPTION>
			<OPTION VALUE=3 <?php print $optNpartic3?>>3</OPTION>
		</SELECT><br>
		<br><INPUT TYPE="radio" NAME="tipoTorneo" VALUE="elimin" <?php print $rdElimin?>>Eliminatoria Simple
		<INPUT TYPE="radio" NAME="tipoTorneo" VALUE="grupos" <?php print $rdGrupos?>>Grupos y Eliminatoria<br><br>
		
		<INPUT TYPE="checkbox" NAME="chIda" VALUE="chIda" <?php print $chIda?>>Ida y vuelta en la eliminatoria<br><br>
		
		Tiempo maximo de juego:
		<SELECT NAME="gameTime">
			<OPTION VALUE=5 <?php print $optGT5?>>5min</OPTION>
			<OPTION VALUE=10 <?php print $optGT10?>>10min</OPTION>
			<OPTION VALUE=15 <?php print $optGT15?>>15min</OPTION>
		</SELECT>
		Tiempo maximo de turno:
		<SELECT NAME="turnTime">
			<OPTION VALUE=20 <?php print $optTT20?>>20s</OPTION>
			<OPTION VALUE=40 <?php print $optTT40?>>40s</OPTION>
			<OPTION VALUE=60 <?php print $optTT60?>>60s</OPTION>
		</SELECT><br><br>
		<INPUT TYPE="checkbox" NAME="capture" VALUE="capture" <?php print $chCapture?>>Modo Capture<br><br>
		<INPUT TYPE="submit" NAME="OK" VALUE = "OK">
		</div>
	</FORM>
</body>
</html>