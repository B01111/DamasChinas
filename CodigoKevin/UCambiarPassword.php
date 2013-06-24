<?php
	include "SCambiarPassword.php"; 
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

<table width="345" border="1" align="center" cellpadding="0" cellspacing="1" bgcolor="#CCCCCC">
<tr>
<form name="form1" method="post" action="UCambiarPassword.php">
<td>
<table width="100%" border="0" cellpadding="3" cellspacing="1" bgcolor="#FFFFFF">
<tr>
<td colspan="3"><strong>Cambio de Password </strong></td>
</tr>
<tr>
<td width="250">Password Actual:</td>
<td width="6">:</td>
<td width="294"><input name="actual" type="password" placeholder="Ingrese contrasena actual"></td>
</tr>
<tr>
<td>Password Nuevo</td>
<td>:</td>
<td><input name="contrasena" type="password" placeholder="Ingrese nueva contrasena"></td>
</tr>
<tr>
<td>Repita Password</td>
<td>:</td>
<td><input name="rcontrasena" type="password" placeholder="Repita nueva contrasena"></td>
</tr>
<tr>
<td>&nbsp;</td>
<td>&nbsp;</td>
<td><input type="submit" name="Submit" value="Aplicar Cambio"></td>
</tr>
<tr>
<td>&nbsp;</td>
<td>&nbsp;</td>
<td><a href="UEditarCuenta.php"><input type="button" name="continuar" value="Continuar Editando Cuenta"></a></td>
</tr>
<tr>
<td>&nbsp;</td>
<td>&nbsp;</td>
<td><a href="UElegirModoJuego.php"><input type="button" name="salir" value="SALIR"></a></td>
</tr>
</table>
</td>
</form>
</tr>
</table>

<br><h2 align="center"><?PHP print $errorMessage; ?></h2>

</body>
</html>