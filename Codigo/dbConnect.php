<?php 
	function dbConnect(){
		$user_name = "root";
		$dbpassw = "";
		$database = "damasChinas";
		$server = "127.0.0.1";
		$connection = mysql_connect($server, $user_name, $dbpassw);
		
		if(!mysql_select_db($database,$connection)){
			return false;
		}else{
			return $connection;
		}
	}
?>