<?php
	include "SLogin.php"; 
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

<table width="300" border="1" align="center" cellpadding="0" cellspacing="1" bgcolor="#CCCCCC">
<tr>
<form name="form1" method="post" action="ULogin.php">
<td>
<table width="100%" border="0" cellpadding="3" cellspacing="1" bgcolor="#FFFFFF">
<tr>
<td colspan="3"><strong>Member Login </strong></td>
</tr>
<tr>
<td width="78">Username</td>
<td width="6">:</td>
<td width="294"><input name="myusername" type="text" id="myusername" placeholder="username"></td>
</tr>
<tr>
<td>Password</td>
<td>:</td>
<td><input name="mypassword" type="password" id="mypassword" placeholder="password"></td>
</tr>
<tr>
<td>&nbsp;</td>
<td>&nbsp;</td>
<td><input type="submit" name="Submit" value="Login"></td>
</tr>
<tr>
<td>&nbsp;</td>
<td>&nbsp;</td>
<td><a href="URegister.php"><input type="button" name="Register" value="Reg&#237;strese Gratis!"></a></td>
</tr>
</table>
</td>
</form>
</tr>
</table>

<br><h2 align="center"><?PHP print $errorMessage; ?></h2>

</body>
</html>