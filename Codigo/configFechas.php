<html>
<head>
<title>Escoger Fechas</title>
	<script type="text/javascript" src="jquery.js"></script>
	<?php 
		include 'tabScript.js';
		include 'confFechasVars.php';
		include 'functions.js';
	?>
	<link href="styles.css" rel="stylesheet" type="text/css" />
</head>
<body>
	<FORM NAME='fechasForm' METHOD='POST' ACTION='configFechas.php'onsubmit="return checkFields('fecha[]')"">
	<?php print $topbar ?>
	<?php print $error ?>
	<div id="tabbedPanel" >
        <div id="cuadroTitulo" ><?php print $nombreTorneo ?></div>
		<ul class="tabs">
			<li class="active" rel="grupos">Grupos</li>
			<li rel="ronda1">Ronda 1</li>
			<li rel="ronda2">Ronda 2</li>
			<li rel="cuartos">Cuartos de Final</li>
			<li rel="semifinal">Semifinal</li>
            <li rel="final">Final</li>
        </ul>
        <div class="tabContentPanel">
			<div id='grupos' class='contentBox'>
				<?php print $tablasG ?>
            </div>
			<div id="ronda1" class="contentBox">
				<?php print $tablasR1 ?>
            </div>
			<div id="ronda2" class="contentBox">
				<?php print $tablasR2 ?>
            </div>
			<div id="cuartos" class="contentBox">
				<?php print $tablasCuartos ?>
            </div>
		    <div id="semifinal" class="contentBox">
				<?php print $tablasSemi ?>
            </div>
            <div id="final" class="contentBox">
				<?php print $tablasFinal ?>
				<INPUT TYPE="submit" VALUE="Terminado">
            </div>
        </div>
    </div>
	</FORM>
</body>
</html>