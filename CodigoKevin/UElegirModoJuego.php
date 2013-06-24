<?php 
	include "CheckSession.php";
?> 

<!DOCTYPE html>
<html>

<!-- ============================================HEAD=================================================== -->
<head>

<meta name="author" content="Kevin S.">
<meta name="keywords" content="Damas Chinas, Chinese Checkers, Proyecto Inge II">
<meta name="description" content="Proyecto Ingenieria de Software II">
<!--meta http-equiv="refresh" content="1"  PUEDE SERVIR A LA HORA DE JUGAR-->
<title>Damas Chinas</title>
<!--base href="ElegirModoJuego.php" target="_blank"-->
<!--link rel="stylesheet" type="text/css" href="mystyle.css"-->

<link rel="stylesheet" type="text/css" href="diseno.css">
<script src="funciones.js"></script>

</head>
<!-- ============================================HEAD=================================================== -->

<!-- ============================================BODY=================================================== -->
<body>

<div style="font-family:verdana;padding:10px;border-radius:20px;border:10px solid #EE872A;font-size:20px">
<img src="/Imagenes/checkers2.png" width="120" height="100" style="opacity:10;border:0px;width:10%;height:10%">
<img src="/Imagenes/checkers2.png" width="120" height="100" style="opacity:10;border:0px;width:10%;height:10%" align="right">
<h1>Damas Chinas</h1>
</div>
<br>
<hr>

<h3>Bienvenido: <?php echo $_SESSION['myusername']; ?></h3>

<div class="center">
<a href="UnirsePartida.php"><img id="UP" onmouseover="seleccionado('UP','Unirse a Partida')" onmouseout="deseleccionado('UP')" border="0" src="/Imagenes/partida.png" alt="Unirse a Partida" width="100" height="100"></a>
<a href="UnirseTorneo.php"><img id="UT" onmouseover="seleccionado('UT',alt)" onmouseout="deseleccionado('UT')" border="0" src="/Imagenes/torneo.png" alt="Unirse a Torneo" width="100" height="100"></a>
<a href="UReanudarPartida.php"><img id="RP" onmouseover="seleccionado('RP',alt)" onmouseout="deseleccionado('RP')" border="0" src="/Imagenes/juez2.png" alt="Reanudar Partida" width="100" height="100"></a>
<a href="UCrearPartida.php"><img id="CP" onmouseover="seleccionado('CP',alt)" onmouseout="deseleccionado('CP')" border="0" src="/Imagenes/crearP.png" alt="Crear Partida" width="100" height="100"></a>
<a href="UCrearTorneo.php"><img id="CT" onmouseover="seleccionado('CT',alt)" onmouseout="deseleccionado('CT')" border="0" src="/Imagenes/crearT.png" alt="Crear Torneo" width="100" height="100"></a>
<a href="UInformacionJugador.php"><img id="IJ" onmouseover="seleccionado('IJ',alt)" onmouseout="deseleccionado('IJ')" border="0" src="/Imagenes/dragon.png" alt="Informacion del jugador" width="100" height="100"></a>
<a href="UEditarCuenta.php"><img id="EC" onmouseover="seleccionado('EC',alt)" onmouseout="deseleccionado('EC')" border="0" src="/Imagenes/configuracion.png" alt="Editar Cuenta" width="100" height="100"></a>
<a href="UAyudaJuego.php"><img id="AJ" onmouseover="seleccionado('AJ',alt)" onmouseout="deseleccionado('AJ')" border="0" src="/Imagenes/reglas.png" alt="Ayuda del Juego" width="100" height="100"></a>
</div><br>

<div align="center">
<h2 id="esc">:: Escoja alguna de las opciones ::</h2>
</div>

<form action="ULogout.php" method="post">
<input type="submit" value="Cerrar Sesion" style="float:right">
</form>

<!--iframe width="560" height="315" src="http://www.youtube.com/embed/jTJYc8O1ocM" frameborder="0" allowfullscreen></iframe-->
</body>
<!-- ============================================BODY=================================================== -->

</html>
