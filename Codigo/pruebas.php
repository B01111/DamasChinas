<html>
<head>
	<title>Pruebas php</title>
	<link href="styles.css" rel="stylesheet" type="text/css" />
	<?php	
		include "functions.js";
		include "fechaFunctions.php";	
		$fecha = array();
		if(isset($_POST['fecha'])){
			$fecha[0] = $_POST['fecha'][0];
			$fecha[1] = $_POST['fecha'][1];
			print('Primero fue: '.min($fecha).'<BR>');
			print('Luego fue: '.max($fecha).'<BR>');
		}
		if(interseca($fecha[0],$fecha[1],20)){
			print "Conflicto";
		}else{
			print "Bien";
		}
		/*$a = array();
		$a[0] = 1;
		$a[1] = 2;
		$a[2] = 4;
		$a[3] = 8;
		$a[4] = 16;
		$a[5] = 32;
		$b = array_slice($a,0);
		foreach($a as $ap){
			print $ap." ";
		}
		print "<BR>";
		foreach($b as $bp){
			print $bp." ";
		}*/
		
	?>
</head>

<body>
	<FORM NAME ="formaPruebas" METHOD ="POST" ACTION = "pruebas.php" onsubmit="return checkFields('fecha[]')">
		<div class="contentBox">
			Hora de nacimiento: <INPUT TYPE="datetime-local" NAME="fecha[]" value="<?php print $fecha[0]?>"><br>
			Hora de defuncion: <INPUT TYPE="datetime-local" NAME="fecha[]" value="<?php print $fecha[1]?>"><br>
			<INPUT TYPE="submit" VALUE="Terminado">
		</div>
		
	</FORM>
</body>