<?php
	include "dbConnect.php";
	SESSION_START();
	if(!(isset($_SESSION['alias']))){
		SESSION_UNSET();
		SESSION_DESTROY();
		header ("Location: login.php");
	}

	include "topBar.php";	
		
	if(isset($_SERVER['HTTP_REFERER'])){
		$pos = strpos($_SERVER['HTTP_REFERER'],'configTorneo.php');
		if($pos){
			$connection = dbConnect();
			if(!$connection){
				$error = 'Error al conectarse a la base de datos'.'<BR>';
			}else{
				$nombreTorneo = $_POST['nombreTorneo'];
				$alias = $_SESSION['alias'];
				$equipos = $_POST['numEquipos'];
				$participantes = $_POST['numPartic'];
				$ida = 0;
				if(!($faseGrupos = ($_POST['tipoTorneo'] == 'grupos'))){
					$faseGrupos = 0;
				}
				if(isset($_POST['chIda'])){
					if($_POST['chIda'] == 'chIda'){
						$ida = 1;
					}
				}
				
				$SQL = "INSERT INTO torneo (Nombre,Creador,Participantes,JugadoresXEquipo,FaseGrupos,IdaEliminatoria,Estado) VALUES ('$nombreTorneo','$alias',$equipos,$participantes,$faseGrupos,$ida,0)";
				$result = mysql_query($SQL);
				$rows = mysql_affected_rows();
				mysql_close($connection);
				if($rows > 0){
					SESSION_START();
					$_SESSION['idTorneo'] = mysql_insert_id($connection);
					$_SESSION['nombreTorneo'] = $nombreTorneo;
					$_SESSION['equipos'] = $equipos;
					$_SESSION['participantes'] = $participantes;
					$_SESSION['faseGrupos'] = $faseGrupos;
					$_SESSION['ida'] = $ida;
					$_SESSION['tiempoJ'] = $_POST['gameTime'];
					$_SESSION['tiempoT'] = $_POST['turnTime'];
					$_SESSION['capture'] = $_POST['capture'];
					header("Location: configFechas.php");
				}else{
					$error = 'Ya existe un torneo con ese nombre';
				}
			}
		}
	}
	
	//Valores iniciales y persistentes de los textFields
	$nombreTorneo = "";
	if(isset($_POST['nombreTorneo'])){
		$nombreTorneo = $_POST['nombreTorneo'];
	}else{
		$nombreTorneo = "";
	}
		
		//Valores iniciales y persistentes de los checkBoxes y radioButtons
		$rdElimin = 'checked';
		$rdGrupos = 'unchecked';
		if(isset($_POST['tipoTorneo'])){
			if($_POST['tipoTorneo'] == 'elimin'){
				$rdElimin = 'checked';
				$rdGrupos = 'unchecked';
			}else{
				$rdElimin = 'unchecked';
				$rdGrupos = 'checked';
			}
		}
		$chIda = $chCapture= 'unchecked';
		
		if(isset($_POST['chIda'])){
			if($_POST['chIda'] == 'chIda'){
				$chIda = 'checked';
			}else{
				$chIda = 'unchecked';
			}
		}
		
		if(isset($_POST['capture'])){
			if($_POST['capture'] == 'capture'){
				$chCapture= 'checked';
			}else{
				$chCapture = 'unchecked';
			}
		}
		
		//Valores iniciales y persistentes de los comboBoxes
		$optNequipos4 = 'selected';
		$optNequipos8 = $optNequipos16 = $optNequipos32 = '';
		if(isset($_POST['numEquipos'])){
			switch($_POST['numEquipos']){
				case 4:
					$optNequipos4 = 'selected';
					$optNequipos8 = $optNequipos16 = $optNequipos32 = '';
					break;
					
				case 8:
					$optNequipos8 = 'selected';
					$optNequipos4 = $optNequipos16 = $optNequipos32 = '';
					break;
					
				case 16:
					$optNequipos16 = 'selected';
					$optNequipos4 = $optNequipos8 = $optNequipos32 = '';
					break;
					
				case 32:
					$optNequipos32 = 'selected';
					$optNequipos4 = $optNequipos8 = $optNequipos16 = '';
					break;
			}
		}
		$optNpartic1 = 'selected';
		$optNpartic2 = $optNpartic3 = '';
		if(isset($_POST['numPartic'])){
			switch($_POST['numPartic']){
				case 1:
					$optNpartic1 = 'selected';
					$optNpartic2 = $optNpartic3 = '';
					break;
					
				case 2:
					$optNpartic2 = 'selected';
					$optNpartic1 = $optNpartic3 = '';
					break;
					
				case 3:
					$optNpartic3 = 'selected';
					$optNpartic1 = $optNpartic2 = '';
					break;
			}
		}
		$optGT5 = 'selected';
		$optGT10 = $optGT15 = '';
		if(isset($_POST['gameTime'])){
			switch($_POST['gameTime']){
				case 5:
					$optGT5 = 'selected';
					$optGT10 = $optGT15 = '';
					break;
					
				case 10:
					$optGT10 = 'selected';
					$optGT5 = $optGT15 = '';
					break;
					
				case 15:
					$optGT15 = 'selected';
					$optGT5 = $optGT10 = '';
					break;
			}
		}
		$optTT20 = 'selected';
		$optTT40 = $optTT60 = '';
		if(isset($_POST['turnTime'])){
			switch($_POST['turnTime']){
				case 20:
					$optTT20 = 'selected';
					$optTT40 = $optTT60 = '';
					break;
					
				case 40:
					$optTT40 = 'selected';
					$optTT20 = $optTT60 = '';
					break;
					
				case 60:
					$optTT60 = 'selected';
					$optTT20 = $optTT40 = '';
					break;
			}
		}
	?>
