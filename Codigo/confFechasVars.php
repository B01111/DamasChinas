<?php 
	include "dbConnect.php";
	SESSION_START();
	if(!(isset($_SESSION['alias']))){
		SESSION_UNSET();
		SESSION_DESTROY();
		header ("Location: login.php");
	}
	include "topBar.php";	
	include "fechaFunctions.php";	
	
	$idTorneo = $_SESSION['idTorneo'];
	$nombreTorneo = $_SESSION['nombreTorneo'];	
	$equipos = $_SESSION['equipos'];
	$grupos = $_SESSION['faseGrupos'];
	$ida = $_SESSION['ida'];
	$ngrupos = $nfases = 0;
	$tiempoJ = $_SESSION['tiempoJ'];
	$tiempoT = $_SESSION['tiempoT'];
	$capture = $_SESSION['capture'];
	if(!$capture){
		$capture = 0;
	}
	
	$tablasG = $tablasR1 = $tablasR2 = $tablasCuartos = $tablasSemi = $tablasFinal = "";
	if($grupos){	//Crea tablas de grupos
		$grupo = array();
		$ngrupos = $equipos/4;
		$nfases = log($ngrupos*2,2);
		for($i=0; $i < $ngrupos;$i++){
			$grupo[0]='A vs B';
			$grupo[1]='C vs D';
			$grupo[2]='A vs C';
			$grupo[3]='B vs D';
			$grupo[4]='A vs D';
			$grupo[5]='B vs C';
			$tablasG .= crearTablaFecha('Grupo '.($i+1),$grupo).'<br>';
		}
	}else{
		$nfases = log($equipos,2);
	}
	
	switch($nfases){
		case 5:
			$grupo = array();
			$grupo[0]='A vs Q';
			$grupo[1]='B vs R';
			$grupo[2]='C vs S';
			$grupo[3]='D vs T';
			$grupo[4]='E vs U';
			$grupo[5]='F vs V';
			$grupo[6]='G vs W';
			$grupo[7]='H vs X';
			$grupo[8]='I vs Y';
			$grupo[9]='J vs ZA';
			$grupo[10]='K vs ZB';
			$grupo[11]='L vs ZC';
			$grupo[12]='M vs ZD';
			$grupo[13]='N vs ZE';
			$grupo[14]='O vs ZF';
			$grupo[15]='P vs ZG';
			$tablasR1 .= crearTablaFecha('Ronda 1',$grupo).'<br>';
			if($ida){
				$grupo[0]='Q vs A';
				$grupo[1]='R vs B';
				$grupo[2]='S vs C';
				$grupo[3]='T vs D';
				$grupo[4]='U vs E';
				$grupo[5]='V vs F';
				$grupo[6]='W vs G';
				$grupo[7]='X vs H';
				$grupo[8]='Y vs I';
				$grupo[9]='ZA vs J';
				$grupo[10]='ZB vs K';
				$grupo[11]='ZC vs L';
				$grupo[12]='ZD vs M';
				$grupo[13]='ZE vs N';
				$grupo[14]='ZF vs O';
				$grupo[15]='ZG vs P';
				$tablasR1 .= crearTablaFecha('Ronda 1 (Vuelta)',$grupo).'<br>';
			}
			
		case 4:
			$grupo = array();
			$grupo[0]='A vs I';
			$grupo[1]='B vs J';
			$grupo[2]='C vs K';
			$grupo[3]='D vs L';
			$grupo[4]='E vs M';
			$grupo[5]='F vs N';
			$grupo[6]='G vs O';
			$grupo[7]='H vs P';
			$tablasR2 .= crearTablaFecha('Ronda 2',$grupo).'<br>';
			if($ida){
				$grupo[0]='I vs A';
				$grupo[1]='J vs B';
				$grupo[2]='K vs C';
				$grupo[3]='L vs D';
				$grupo[4]='M vs E';
				$grupo[5]='N vs F';
				$grupo[6]='O vs G';
				$grupo[7]='P vs H';
				$tablasR2 .= crearTablaFecha('Ronda 2 (Vuelta)',$grupo).'<br>';
			}
			
		case 3:
			$grupo = array();
			$grupo[0]='A vs E';
			$grupo[1]='B vs F';
			$grupo[2]='C vs G';
			$grupo[3]='D vs H';
			$tablasCuartos .= crearTablaFecha('Cuartos de Final',$grupo).'<br>';
			if($ida){
				$grupo[0]='E vs A';
				$grupo[1]='F vs B';
				$grupo[2]='G vs C';
				$grupo[3]='H vs D';
				$tablasCuartos .= crearTablaFecha('Cuartos de Final (Vuelta)',$grupo).'<br>';
			}
	
		case 2:
			$grupo = array();
			$grupo[0]='A vs C';
			$grupo[1]='B vs D';
			$tablasSemi .= crearTablaFecha('Semifinal',$grupo).'<br>';
			if($ida){
				$grupo[0]='C vs A';
				$grupo[1]='D vs B';
				$tablasSemi .= crearTablaFecha('Semifinal (Vuelta)',$grupo).'<br>';
			}
			
		case 1:
			$grupo = array();
			$grupo[0]='A vs B';
			$tablasFinal .= crearTablaFecha('Final',$grupo).'<br>';
			if($ida){
				$grupo[0]='B vs A';
				$tablasFinal .= crearTablaFecha('Final (Vuelta)',$grupo).'<br>';
			}
	}
	
	if(isset($_POST['fecha'])){	//Buscar conflictos en las fechas
		$fecha = $_POST['fecha'];
		$connection = dbConnect();
		$conflicto = false;
		$offset = 0;
		$maxFA = "0001-01-01T00:00";	//Equivalente a iniciar una variable en 0
		if(!$connection){
			$error = 'Error al conectarse a la base de datos'.'<BR>';
		}else{
			if($ngrupos > 0){
				$i = 0;
				while(!($conflicto) && $i<$ngrupos){//verifica conflictos entre las fechas de cada grupo
					$offset = $i*6;
					$maxFA = max($fecha[0+$offset],$fecha[1+$offset]);
					$minFP = min($fecha[2+$offset],$fecha[3+$offset]);
					if(interseca($maxFA,$minFP,$tiempoJ) || $maxFA > $minFP){
						$conflicto = true;
					}else{
						$maxFA = max($fecha[2+$offset],$fecha[3+$offset]);
						$minFP = min($fecha[4+$offset],$fecha[5+$offset]);
						if(interseca($maxFA,$minFP,$tiempoJ) || $maxFA > $minFP){
							$conflicto = true;
						}
					}
					$i++;
				}
				$offset = $ngrupos*6;
				$maxFA = max(array_slice($fecha,0,$offset));//La fecha mas posterior de los grupos
			}
			$fechasFase = array();
			if($ida){//Busca conflictos para cada fase con ida y vuelta
				for($fase = (5-$nfases);$fase < 5;$fase++){	
					$npartidas = 32/(pow(2,$fase));
					$fechasFase[$fase] = array_slice($fecha,$offset,$npartidas);
					$fechasIda[$fase] =  array_slice($fecha,$offset,($npartidas/2));
					$fechasVuelta[$fase] =  array_slice($fecha,($offset+($npartidas/2)),($npartidas/2));
					$maxIda = max($fechasIda[$fase]);
					$minVuelta = min($fechasVuelta[$fase]);
					if(interseca($maxIda,$minVuelta,$tiempoJ) || $maxIda > $minVuelta){
						$conflicto = true;
					}
					
					$minFP = min($fechasFase[$fase]);
					if(interseca($maxFA,$minFP,$tiempoJ) || $maxFA > $minFP){
						$conflicto = true;
					}
					$maxFA = max($fechasFase[$fase]);
					$offset += $npartidas;
				}
			}else{	//Busca conflictos para fases simples
				for($fase = (5-$nfases);$fase < 5;$fase++){
					$npartidas = 16/(pow(2,$fase));
					$fechasFase[$fase] = array_slice($fecha,$offset,$npartidas);
					$minFP = min($fechasFase[$fase]);
					if(interseca($maxFA,$minFP,$tiempoJ) || $maxFA > $minFP){
						$conflicto = true;
					}
					$maxFA = max($fechasFase[$fase]);
					$offset += $npartidas;
				}
			}
			if($conflicto){		//De no existir conflicto procede a insertar la fechas a la base de datos
				$error = "<H3>Existe un conflicto con las fechas</H3>";
			}else{
				$offset = 0;
				if($ngrupos > 0){	//Inserta las partidas de los grupos en la bases de datos
					for($i = 1; $i <= $ngrupos;$i++){
						for($j = 0;$j < 6;$j++){
							$SQL =  "INSERT INTO partida(TiempoMaxPartida, TiempoMaxTurno, Capture, Estado, Turno) VALUES ('$tiempoJ','$tiempoT',$capture,HEX(0),1)";
							$result = mysql_query($SQL);
							$idPartida = mysql_insert_id($connection);
							$offset = ($i-1)*6;
							$fechaPartida = $fecha[$j+$offset];
							if($idPartida <= 0){
								$error = "<H3>Error al insertar partidas</H3>";
							}else{
								$SQL =  "INSERT INTO calendario(IdPartida, IdTorneo, Fecha, Grupo, DependeDeGrupo) VALUES (
											$idPartida,$idTorneo,'$fechaPartida',$i,0)";
								$result = mysql_query($SQL);	
								$rows = mysql_affected_rows();
								if($rows <= 0){
									$error = "<H3>Error al insertar calendario</H3>";
								}	
							}
						}				
					}
					$offset = $ngrupos*6;
				}
				//Inserta las partidas de las fases eliminatorias
				$idPartidas = array();
				if($ida){
					for($fase =(5-$nfases);$fase < 5;$fase++){
						$npartidas = 16/(pow(2,$fase));
						$fechasFase[$fase]["ida"] = array_slice($fecha,$offset,$npartidas);
						$fechasFase[$fase]["vuelta"] = array_slice($fecha,$offset+$npartidas,$npartidas);
						$offset += $npartidas*2;
						for($i = 0; $i < $npartidas;$i++){//Primero la ida
							$SQL =  "INSERT INTO partida(TiempoMaxPartida, TiempoMaxTurno, Capture, Estado, Turno) VALUES ('$tiempoJ','$tiempoT',$capture,HEX(0),1)";
							$result = mysql_query($SQL);
							$idPartida = $idPartidas[$fase]["ida"][$i] = mysql_insert_id($connection);
							$fechaPartida = $fechasFase[$fase]["ida"][$i];
							if($idPartida <= 0){
								$error = "<H3>Error al insertar partidas</H3>";
							}else{
								if($fase == (5-$nfases) && $ngrupos > 0){
									$SQL =  "INSERT INTO calendario(IdPartida, IdTorneo, Fecha, Grupo, DependeDeGrupo) VALUES ($idPartida,$idTorneo,'$fechaPartida',0,($i+1))";
								}else{
									$SQL =  "INSERT INTO calendario(IdPartida, IdTorneo, Fecha, Grupo, DependeDeGrupo) VALUES ($idPartida,$idTorneo,'$fechaPartida',0,0)";
								}
								$result = mysql_query($SQL);	
								$rows = mysql_affected_rows();
								if($rows <= 0){
									$error = "<H3>Error al insertar calendario</H3>";
								}
							}//Ahora la vuelta
							$SQL =  "INSERT INTO partida(TiempoMaxPartida, TiempoMaxTurno, Capture, Estado, Turno) VALUES ('$tiempoJ','$tiempoT',$capture,HEX(0),1)";
							$result = mysql_query($SQL);
							$idPartida = $idPartidas[$fase]["vuelta"][$i] = mysql_insert_id($connection);
							$fechaPartida = $fechasFase[$fase]["vuelta"][$i];
							if($idPartida <= 0){
								$error = "<H3>Error al insertar partidas</H3>";
							}else{
								if($fase == (5-$nfases) && $ngrupos > 0){
									$SQL =  "INSERT INTO calendario(IdPartida, IdTorneo, Fecha, Grupo, DependeDeGrupo) VALUES ($idPartida,$idTorneo,'$fechaPartida',0,($i+1))";
								}else{
									$SQL =  "INSERT INTO calendario(IdPartida, IdTorneo, Fecha, Grupo, DependeDeGrupo) VALUES ($idPartida,$idTorneo,'$fechaPartida',0,0)";
								}
								$result = mysql_query($SQL);	
								$rows = mysql_affected_rows();
								if($rows <= 0){
									$error = "<H3>Error al insertar calendario</H3>";
								}
							}
						}
					}
				}else{
					for($fase =(5-$nfases);$fase < 5;$fase++){
						$npartidas = 16/(pow(2,$fase));
						$fechasFase[$fase] = array_slice($fecha,$offset,$npartidas);
						$offset += $npartidas;
						for($i = 0; $i < $npartidas;$i++){
							$SQL =  "INSERT INTO partida(TiempoMaxPartida, TiempoMaxTurno, Capture, Estado, Turno) VALUES ('$tiempoJ','$tiempoT',$capture,HEX(0),1)";
							$result = mysql_query($SQL);
							$idPartida = $idPartidas[$fase][$i] = mysql_insert_id($connection);
							$fechaPartida = $fechasFase[$fase][$i];
							if($idPartida <= 0){
								$error = "<H3>Error al insertar partidas</H3>";
							}else{
								if($fase == (5-$nfases) && $ngrupos > 0){
									$SQL =  "INSERT INTO calendario(IdPartida, IdTorneo, Fecha, Grupo, DependeDeGrupo) VALUES ($idPartida,$idTorneo,'$fechaPartida',0,($i+1))";
								}else{
									$SQL =  "INSERT INTO calendario(IdPartida, IdTorneo, Fecha, Grupo, DependeDeGrupo) VALUES ($idPartida,$idTorneo,'$fechaPartida',0,0)";
								}
								$result = mysql_query($SQL);	
								$rows = mysql_affected_rows();
								if($rows <= 0){
									$error = "<H3>Error al insertar calendario</H3>";
								}
							}
						}
					}
				}
				if($nfases > 1){
					if($ida){
						for($fase = (5-$nfases+1) ; $fase < 5; $fase++){
							$npartidas = count($idPartidas[$fase]["ida"]);
							for($i = 0; $i < $npartidas;$i++){	
								$dependiente = $idPartidas[$fase]["ida"][$i];//Primero las de ida
								$dependencia1 = $idPartidas[$fase-1]["ida"][2*$i];
								$dependencia2 = $idPartidas[$fase-1]["ida"][2*$i+1];
								$SQL = "INSERT INTO subfasede(dependiente,dependencia1,dependencia2) VALUES($dependiente,$dependencia1,$dependencia2)";
								$result = mysql_query($SQL);	
								$rows = mysql_affected_rows();
								if($rows <= 0){
									$error = "<H3>Error al insertar dependencia de fases</H3>";
								}
								$dependencia1 = $idPartidas[$fase-1]["vuelta"][2*$i];
								$dependencia2 = $idPartidas[$fase-1]["vuelta"][2*$i+1];
								$SQL = "INSERT INTO subfasede(dependiente,dependencia1,dependencia2) VALUES($dependiente,$dependencia1,$dependencia2)";
								$result = mysql_query($SQL);	
								$rows = mysql_affected_rows();
								if($rows <= 0){
									$error = "<H3>Error al insertar dependencia de fases</H3>";
								}
								
								$dependiente = $idPartidas[$fase]["vuelta"][$i];//Ahora las de vuelta
								$dependencia1 = $idPartidas[$fase-1]["ida"][2*$i];
								$dependencia2 = $idPartidas[$fase-1]["ida"][2*$i+1];
								$SQL = "INSERT INTO subfasede(dependiente,dependencia1,dependencia2) VALUES($dependiente,$dependencia1,$dependencia2)";
								$result = mysql_query($SQL);	
								$rows = mysql_affected_rows();
								if($rows <= 0){
									$error = "<H3>Error al insertar dependencia de fases</H3>";
								}
								$dependencia1 = $idPartidas[$fase-1]["vuelta"][2*$i];
								$dependencia2 = $idPartidas[$fase-1]["vuelta"][2*$i+1];
								$SQL = "INSERT INTO subfasede(dependiente,dependencia1,dependencia2) VALUES($dependiente,$dependencia1,$dependencia2)";
								$result = mysql_query($SQL);	
								$rows = mysql_affected_rows();
								if($rows <= 0){
									$error = "<H3>Error al insertar dependencia de fases</H3>";
								}
								
							}
						}
					}else{
						for($fase = (5-$nfases+1) ; $fase < 5; $fase++){
							$npartidas = count($idPartidas[$fase]);
							for($i = 0; $i < $npartidas;$i++){
								$dependiente = $idPartidas[$fase][$i];
								$dependencia1 = $idPartidas[$fase-1][2*$i];
								$dependencia2 = $idPartidas[$fase-1][2*$i+1];
								$SQL = "INSERT INTO subfasede(dependiente,dependencia1,dependencia2) VALUES($dependiente,$dependencia1,$dependencia2)";
								$result = mysql_query($SQL);	
								$rows = mysql_affected_rows();
								if($rows <= 0){
									$error = "<H3>Error al insertar dependencia de fases</H3>";
								}
							}
						}
					}
				}
				if(!$error){
					$SQL = "UPDATE torneo SET Estado = 1 WHERE ID = $idTorneo";
					$result = mysql_query($SQL);	
					$rows = mysql_affected_rows();
					if($rows <= 0){
						$error = "<H3>Error al actualizar estado del torneo</H3>";
					}
					header("Location: infoTorneo.php");
				}
				mysql_close($connection);
			}
		}
	}
?>