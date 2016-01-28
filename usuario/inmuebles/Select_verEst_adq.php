<?php
	include '../../librerias/conexion.php';
	include '../../librerias/quitar.php';
	
	$idInm = mysql_real_escape_string(quitar($_GET['idInm']));
	
	if($idInm!="Seleccione...")
	{
		$consulta = "SELECT ea.tipo
				   FROM bienes_inmuebles AS bi,estado_adquisicion AS ea
				   WHERE IDinmueble=$idInm AND ea.IDest_adq=bi.IDest_adq";
		$ejecutar = mysql_query($consulta) or die(mysql_error());
		
		$tipo = mysql_result($ejecutar,0,'tipo');
		
		
		echo"<li>
				<label>Estado de Adquisición: </label>
			</li>
			<li>
				<input type='text' value='$tipo' class='rounded' readonly='readonly'/>
			</li>";
	}

?>