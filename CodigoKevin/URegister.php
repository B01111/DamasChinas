<?php
	include "SRegister.php";
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
<hr><br><br>

<table width="325" border="1" align="center" cellpadding="0" cellspacing="1" bgcolor="#CCCCCC">
<tr>
<form name="form" method="post" action="URegister.php">
<td>
<table width="100%" border="0" cellpadding="3" cellspacing="1" bgcolor="#FFFFFF">
<tr>
<td colspan="3"><strong>Reg&iacutestrese Gratis! </strong></td>
</tr>
<tr>
<td width="78">Nombre</td> <!--habia un 78-->
<td width="6">:</td>
<td width="294"><input name="nombre" type="text" id="newname" value="<?php echo $newname; ?>" placeholder="Ingrese su nombre"></td>
</tr>
<tr>
<td>Apellido</td>
<td>:</td>
<td><input name="apellido" type="text" id="newlastname" value="<?php echo $newlastname; ?>" placeholder="Ingrese su apellido"></td>
</tr>
<tr>
<td>Alias</td>
<td>:</td>
<td><input name="alias" type="text" id="newalias" value="<?php echo $newalias; ?>" placeholder="Ingrese su alias"></td>
</tr>
<tr>
<td>Correo</td>
<td>:</td>
<td><input name="correo" type="text" id="newemail" value="<?php echo $newemail; ?>" placeholder="Ingrese correo electr&#xf3;nico"></td>
</tr>
<tr>
<td>Password</td>
<td>:</td>
<!--td><input name="genero" type="text" id="newgenero" value="ingrese fecha de nacimiento" onclick="limpiar('newfecha')"></td-->
<td><input name="password" type="password" id="newpassword" placeholder="password"></td>
</tr>
<tr>
<td>Fecha Nacimiento</td>
<td>:</td>
<td><select name="Day"><option value="Day" id="Day">D&iacutea</option>
<?php 
for($i=1;$i<=31;$i++){ 
	if($i<10){ echo '<option value=0'.$i.' id=0'.$i.'>0'.$i.'</option>'; }
	else{ echo '<option value='.$i.' id='.$i.'>'.$i.'</option>';  } 
}
?>
</select>
<select name="Month"><option value="Month" id="Month">Mes</option><option value="Enero" id="Enero">Enero</option><option value="Febrero" id="Febrero">Febrero</option><option value="Marzo" id="Marzo">Marzo</option><option value="Abril" id="Abril">Abril</option><option value="Mayo" id="Mayo">Mayo</option><option value="Junio" id="Junio">Junio</option><option value="Julio" id="Julio">Julio</option><option value="Agosto" id="Agosto">Agosto</option><option value="Setiembre" id="Setiembre">Setiembre</option><option value="Octubre" id="Octubre">Octubre</option><option value="Noviembre" id="Noviembre">Noviembre</option><option value="Diciembre" id="Diciembre">Diciembre</option>
</select>
<select name="Year"><option value="Year" id="Year">A&ntildeo</option>
<?php for($i=1980;$i<=2013;$i++){ echo '<option value='.$i.' id='.$i.'>'.$i.'</option>'; } ?>
</select>
</td>
</tr>

<script>
document.getElementById("<?php echo $day; ?>").selected=true;
document.getElementById("<?php echo $month; ?>").selected=true;
document.getElementById("<?php echo $year; ?>").selected=true;
</script>

<tr>
<td>&nbsp;</td>
<td>&nbsp;</td>
<td><input type="submit" name="Register" value="Registrarse"></td>
</tr>
<tr>
<td>&nbsp;</td>
<td>&nbsp;</td>
<td><a href="ULogin.php"><input type="button" name="volver" value="Volver"></a></td>
</tr>
</table>
</td>
</form>
</tr>
</table>

<h2 align="center"><?PHP print $errorMessage; ?></h2>

</body>
</html>