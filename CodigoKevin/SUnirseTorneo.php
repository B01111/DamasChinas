<?php 
	include "CheckSession.php";
	
	$errorMessage = ""; 
	
	$host="localhost"; // Host name 
	$username="root"; // Mysql username 
	$password=""; // Mysql password 
	$db_name="test"; // Database name 
	$tbl_name="torneo"; // Table name 

	// Connect to server and select databse.
	mysql_connect("$host", "$username", "$password")or die("cannot connect"); 
	mysql_select_db("$db_name")or die("cannot select DB");

	$sql="SELECT nombre,creador,jugadoresxequipo,ida_vueltaeliminatoria,ida_vueltagrupos,disponible FROM $tbl_name";
	$result = mysql_query($sql);
	
	if ($_SERVER['REQUEST_METHOD'] == 'POST'){
		$seleccion = $_POST['eleccion'];
		if($seleccion != ""){
			header("location:USalaEspera.php");
		}else{
			$errorMessage = "Elija alguno de los torneos disponibles";
		}
	}
	
	function crearTabla(){
		$interno = $GLOBALS['result'];
		if($interno){
			while( $row = mysql_fetch_assoc($interno) ){
				echo "<tr>";
				echo '<td><input type="radio" name="partidas" id="'.$row['nombre'].'" onclick="check(&#34;'.$row['nombre'].'&#34;)"><br></td>';
				echo "<td>" . $row['nombre'] . "</td>";
				echo "<td>" . $row['creador'] . "</td>";
				echo "<td>" . $row['jugadoresxequipo'] . "</td>";
				echo "<td>" . $row['ida_vueltaeliminatoria'] . "</td>";
				echo "<td>" . $row['ida_vueltagrupos'] . "</td>";
				echo "<td>" . $row['disponible'] . "</td>";
				echo "</tr>";
			}
			echo "</table>";
		}else {
			echo "<h3>Error en la consulta en al BD de los torneos</h3>";
		}
	}
?>