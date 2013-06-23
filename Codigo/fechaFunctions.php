<?php
	function crearTablaFecha($titulo,$values){
		$table = "<table class='fechas'>
		<tr><th class='tHeader' colspan='2'> $titulo</th></tr>
		<tr><th>Fecha</td><th>Equipos</td></tr>
		";
			
		foreach ($values as $value){	
			$table .= "<tr><td>
			<input type='datetime-local' name='fecha[]'></td>
			<td>$value</td></tr>";
		}
		$table .= "</table>";
		return $table;
	}
	function interseca($fecha1,$fecha2,$periodo){
		$interseca = false;
		$fechas = array();
		$fechas[0] = $fecha1;
		$fechas[1] = $fecha2;
		rsort($fechas);
		$fechas[0] = timeDateToArray($fechas[0]);
		$fechas[1] = timeDateToArray($fechas[1]);
		$diffy = $fechas[0]["year"]-$fechas[1]["year"];
		$monthA = $fechas[0]["month"];
		$monthB = $fechas[1]["month"];
		$diffm = $monthA-$monthB;
		$diffd = $fechas[0]["day"]-$fechas[1]["day"];
		$diffh = $fechas[0]["hour"]-$fechas[1]["hour"];
		$diffmin = $fechas[0]["minute"]-($fechas[1]["minute"]+$periodo+5);
		
		if($diffy == 0){
			if($diffm == 0){
				if($diffd == 0){
					if($diffh == 0 && $diffmin <= 0){
						$interseca = true;
					}elseif($diffh == 1 && $diffmin <= -60){
						$interseca = true;
					}
				}elseif($diffd == 1 && $diffh == -23 && $diffmin < -60){
					$interseca = true;
				}
			}elseif($diffm == 1 && (
				($monthA%2 && $diffd = -29 && $diffh == -23 && $diffmin < -60)||
				(!($monthA%2) && $diffd = -30 && $diffh == -23 && $diffmin < -60)
				)){
					$interseca = true;
			}
		}elseif($diffy == 1 && $diffm == -11 && $diffd == -30 && $diffh == -23 && $diffmin < -60){
			$interseca = true;
		}
		return $interseca;
	}
	
	function timeDateToArray($timeDate){
		$array = array();
		$temp = explode("-",$timeDate);
		$array["year"] = $temp[0];
		$array["month"] = $temp[1];
		$temp = explode("T",$temp[2]);
		$array["day"] = $temp[0];
		$temp = explode(":",$temp[1]);
		$array["hour"] = $temp[0];
		$array["minute"] = $temp[1];
		return $array;
	}
	
	function aArrayToDateTime($aArray){
		$timeDate = $array["year"]."-".$array["month"]."-".$array["day"]."T".$array["hour"].":".$array["minute"];
		return $timeDate;
	}
?>