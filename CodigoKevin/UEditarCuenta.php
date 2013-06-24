<?php
	include "SEditarCuenta.php";
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
<br>
<hr>

<form method="post" action="UEditarCuenta.php" style="margin-left:auto; margin-right:auto; width:28%;">
<fieldset><legend>Editar Cuenta de Usuario:</legend>
Nombre: &nbsp;&nbsp;<input name="nombre" type="text" value="<?php echo $newname; ?>" placeholder="Ingrese su nombre"><br>
Apellido: &nbsp;&nbsp;<input name="apellido" type="text" value="<?php echo $newlastname; ?>" placeholder="Ingrese su apellido"><br>
Correo: &nbsp;&nbsp;&nbsp;&nbsp;<input name="correo" type="text" value="<?php echo $newemail; ?>" placeholder="Ingrese correo electr&#xf3;nico"><br>
Fecha Nacimiento:
<select name="Dia"><option value="Day" id="Day">D&iacutea</option>
<?php for($i=1;$i<=31;$i++){ echo '<option value='.$i.' id='.$i.'>'.$i.'</option>'; } ?>
</select>
<select name="Mes"><option value="Month" id="Month">Mes</option><option value="Enero" id="Enero">Enero</option><option value="Febrero" id="Febrero">Febrero</option><option value="Marzo" id="Marzo">Marzo</option><option value="Abril" id="Abril">Abril</option><option value="Mayo" id="Mayo">Mayo</option><option value="Junio" id="Junio">Junio</option><option value="Julio" id="Julio">Julio</option><option value="Agosto" id="Agosto">Agosto</option><option value="Setiembre" id="Setiembre">Setiembre</option><option value="Octubre" id="Octubre">Octubre</option><option value="Noviembre" id="Noviembre">Noviembre</option><option value="Diciembre" id="Diciembre">Diciembre</option>
</select>
<select name="Año"><option value="Year" id="Year">A&ntildeo</option>
<?php for($i=1980;$i<=2013;$i++){ echo '<option value='.$i.' id='.$i.'>'.$i.'</option>'; } ?>
</select>

<script>
document.getElementById("<?php echo $day; ?>").selected=true;
document.getElementById("<?php echo $month; ?>").selected=true;
document.getElementById("<?php echo $year; ?>").selected=true;
</script>
<br><br>
<input type="submit" name="Update" value="Actualizar Datos" style="float:left">
<a href="UCambiarPassword.php"><input type="button" name="cambiar" value="Cambiar Password" style="float:left"></a>
<a href="UElegirModoJuego.php"><input type="button" name="cancelar" value="CANCELAR" style="float:left"></a>

</fieldset>
</form>

<br><h2 align="center"><?PHP print $errorMessage; ?></h2>

</body>
</html>
