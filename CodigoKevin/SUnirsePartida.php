<?php 
	include "CheckSession.php";
	
	$errorMessage = ""; 
	
	$host="localhost"; // Host name 
	$username="root"; // Mysql username 
	$password=""; // Mysql password 
	$db_name="test"; // Database name 
	$tbl_name="partida"; // Table name 

	// Connect to server and select databse.
	mysql_connect("$host", "$username", "$password")or die("cannot connect"); 
	mysql_select_db("$db_name")or die("cannot select DB");

	$sql="SELECT nombre,coloresxjugador,capture,disponible FROM $tbl_name";
	$result = mysql_query($sql);
	
	if ($_SERVER['REQUEST_METHOD'] == 'POST'){
		$seleccion = $_POST['eleccion'];
		if($seleccion != ""){
			header("location:USalaEspera.php");
		}else{
			$errorMessage = "Elija alguna de las partidas disponibles";
		}
	}
	
	function crearTabla(){
		$interno = $GLOBALS['result'];
		if($interno){
			while( $row = mysql_fetch_assoc($interno) ){
				echo "<tr>";
				echo '<td><input type="radio" name="partidas" id="'.$row['nombre'].'" onclick="check(&#34;'.$row['nombre'].'&#34;)"><br></td>';
				echo "<td>" . $row['nombre'] . "</td>";
				echo "<td>" . $row['coloresxjugador'] . "</td>";
				echo "<td>" . $row['capture'] . "</td>";
				echo "<td>" . $row['disponible'] . "</td>";
				echo "</tr>";
			}
			echo "</table>";
		}else {
			echo "<h3>Error en la consulta en al BD de las partidas</h3>";
		}
	}
?>