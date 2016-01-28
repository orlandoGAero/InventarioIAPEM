<link type="text/css" href="../../css/style_table.css" rel="stylesheet"/>
<?php
 	
 	$idCo = $_REQUEST ['IDcoordinacion'];

 	include '../../librerias/conexion.php';
	include '../../librerias/encode.php';

	$c = encode("IDcoordinacion=$idCo");
	
 	$consulta = " 	SELECT bmu.codigoNuevoM, bmu.codigoAnterior, mu.nombre, bmu.caracteristicas, binm.nombre_sede,resg.nombre AS nombreR,resg.ap_paterno,resg.ap_materno, bmu.area_ubicacion
					FROM muebles AS mu, bienes_muebles AS bmu, resguardatarios AS resg, bienes_inmuebles AS binm
					WHERE bmu.IDcoordinacion = '$idCo' AND bmu.activo = 'Si'
						AND resg.IDresguardatario = bmu.IDresguardatario
						AND mu.IDmueble = bmu.IDmueble
						AND binm.IDinmueble = bmu.IDinmueble";
 	$ejecutar = mysql_query($consulta) or die (mysql_error());
 	$filas = mysql_num_rows($ejecutar);
 	
 	if ( $filas != 0)	
 	{
 			echo "<br/><table id='miTabla'><tr><th>Bienes Muebles</th></tr></table><br/>";

 			echo "<center>
	 				<table border = '0' id = 'miTabla'>
	 					<tr>
	 						<th> Código Nuevo </th>
	 						<th> Código Anterior </th>
	 						<th> Artículo </th>
	 						<th> Características </th>
	 						<th> Inmueble </th>
	 						<th> Responsable </th>
	 					</tr> ";

	 					for ($y=0; $y <$filas ; $y++) 
	 					{ 
	 						$CodNuevoM = mysql_result($ejecutar, $y, 'codigoNuevoM');
	 						$CodAntM = mysql_result($ejecutar, $y, 'codigoAnterior');
	 						$mueble = mysql_result($ejecutar, $y, 'nombre');
	 							$mueble = utf8_encode ($mueble);
	 						$caract = mysql_result($ejecutar, $y, 'caracteristicas');
	 							$caract = utf8_encode ($caract);
	 						$inmueble = mysql_result($ejecutar, $y, 'nombre_sede');
	 							$inmueble = utf8_encode($inmueble);
	 						$nombre = mysql_result($ejecutar, $y, 'nombreR');
	 							$nombre = utf8_encode($nombre);
							$ap = mysql_result($ejecutar, $y, 'ap_paterno');
	 							$ap = utf8_encode($ap);	 
							$am = mysql_result($ejecutar, $y, 'ap_materno');
	 							$am = utf8_encode($am);
							$nombreRes = "$nombre $ap $am";

	 						echo "<tr>
	 								<td> $CodNuevoM </td>
	 								<td> $CodAntM </td>
	 								<td> $mueble </td>
	 								<td> $caract </td>
	 								<td> $inmueble </td>
	 								<td> $nombreRes </td>
	 							 </tr>";
	 					}
	 				echo "</table></center>"; 
 	}

 		$consultaTec = " 	SELECT tec.codigoNuevoT, tec.codigoAnterior, eqinf.equipo_informatico, tec.modelo, tec.marca, tec.color, tec.caracteristicas, tec.area_ubicacion, resg.nombre AS nombreR,resg.ap_paterno,resg.ap_materno, binm.nombre_sede
							FROM equipos_informaticos AS eqinf, tecnologias AS tec, resguardatarios AS resg, bienes_inmuebles AS binm
							WHERE tec.IDcoordinacion = '$idCo' AND tec.activo = 'Si'
								AND resg.IDresguardatario = tec.IDresguardatario
								AND eqinf.IDeinformatico = tec.IDeinformatico
								AND binm.IDinmueble = tec.IDinmueble";
		$ejecutarTec = mysql_query($consultaTec) or die (mysql_error());
 		$filas3 = mysql_num_rows($ejecutarTec);

 		if ($filas3 != 0)
 		{
			echo "<br/><table id='miTabla'><tr><th>Bienes Informáticos</th></tr></table><br/>";

 			echo "<center>
	 				<table border = '0' id = 'miTabla'>
	 					<tr>
	 						<th> Codigo Nuevo </th>
							<th> Codigo Anterior </th>
							<th> Artículo </th>
							<th> Modelo </th>
							<th> Marca </th>
							<th> Color </th>
							<th> Caracteristicas </th>
							<th> Inmueble </th> 
							<th> Responsable </th>
						</tr> ";

						for ($y=0; $y <$filas3 ; $y++) 
						{ 
							$codNuevoT = mysql_result ($ejecutarTec, $y, 'codigoNuevoT');
							$codAnt = mysql_result($ejecutarTec, $y, 'codigoAnterior');
							$eq_inf = mysql_result($ejecutarTec, $y, 'equipo_informatico');
								$eq_inf = utf8_encode($eq_inf);
							$modelo = mysql_result($ejecutarTec, $y, 'modelo');
								$modelo = utf8_encode($modelo);
							$marca = mysql_result($ejecutarTec, $y, 'marca');
								$marca = utf8_encode($marca);
							$color = mysql_result($ejecutarTec, $y, 'color');
							$Caracteristicas = mysql_result($ejecutarTec, $y, 'caracteristicas');
								$Caracteristicas = utf8_encode($Caracteristicas);
							$Inmueble = mysql_result($ejecutarTec, $y, 'nombre_sede');
								$Inmueble = utf8_encode($Inmueble);
							$nombre = mysql_result($ejecutarTec, $y, 'nombreR');
	 							$nombre = utf8_encode($nombre);
							$ap = mysql_result($ejecutarTec, $y, 'ap_paterno');
	 							$ap = utf8_encode($ap);	 
							$am = mysql_result($ejecutarTec, $y, 'ap_materno');
	 							$am = utf8_encode($am);
							$nombreRes = "$nombre $ap $am";


							echo "<tr aling = 'center'>
									<td> $codNuevoT </td>
									<td> $codAnt </td>
									<td> $eq_inf </td>
									<td> $modelo </td>
									<td> $marca </td>
									<td> $color </td>
									<td> $Caracteristicas </td>
									<td> $Inmueble </td>
									<td> $nombreRes </td>
								</tr>";
						}
				echo "</table></center>";
 		}

 		$consultaV = " 	SELECT pv.codigoNuevoV, pv.codigoAnterior, pv.modelo, pv.marca, pv.color, pv.placas, pv.noSerie, pv.ano, pv.tipo_v, pv.servicio, binm.nombre_sede, resg.nombre AS nombreR,resg.ap_paterno,resg.ap_materno
						FROM planta_vehicular AS pv, resguardatarios AS resg, bienes_inmuebles AS binm
						WHERE pv.IDcoordinacion = '$idCo' AND pv.activo = 'Si'
							AND resg.IDresguardatario = pv.IDresguardatario
							AND binm.IDinmueble = pv.IDinmueble";
 		$ejecutarV = mysql_query($consultaV) or die (mysql_error());
	 	$filas4 = mysql_num_rows($ejecutarV);

	 	
	 	if ( $filas4 != 0)	
	 	{
	 		echo "<br/><table id='miTabla'><tr><th>Planta Vehícular</th></tr></table><br/>";

	 			echo "<center>
		 				<table border = '0' id = 'miTabla'>
		 					<tr>
		 						<th> Codigo Nuevo </th>
								<th> Codigo Anterior </th>
								<th> Modelo </th>
								<th> Marca </th>
								<th> Color </th>
								<th> Placas </th>
								<th> No. Serie </th>
								<th> Año </th>
								<th> Tipo </th>
								<th> Servicio </th>
								<th> Inmueble </th>
								<th> Responsable </th>
							</tr> ";

						for ($y=0; $y <$filas4; $y++) 
						{ 
							$codigoNuevoV = mysql_result ($ejecutarV, $y, 'codigoNuevoV');
							$CodigoAnterior	= mysql_result($ejecutarV, $y, 'CodigoAnterior');	
							$modelo = mysql_result($ejecutarV, $y, 'modelo');
								$modelo = utf8_encode($modelo);
							$marca = mysql_result($ejecutarV, $y, 'marca');
								$marca = utf8_encode($marca);
							$color = mysql_result($ejecutarV, $y, 'color');
								$color = utf8_encode($color);
							$placas = mysql_result ($ejecutarV, $y, 'placas');
								$placas = utf8_encode($placas);
							$noserie = mysql_result($ejecutarV, $y, 'noSerie');
							$ano = mysql_result($ejecutarV, $y, 'ano');
							$tipo = mysql_result($ejecutarV, $y, 'tipo_v');
								$tipo = utf8_encode($tipo);
							$servicio = mysql_result($ejecutarV, $y, 'servicio');
							$Inmueble = mysql_result($ejecutarV, $y, 'nombre_sede');
								$Inmueble = utf8_encode($Inmueble);
							$nombre = mysql_result($ejecutarV, $y, 'nombreR');
	 							$nombre = utf8_encode($nombre);
							$ap = mysql_result($ejecutarV, $y, 'ap_paterno');
	 							$ap = utf8_encode($ap);	 
							$am = mysql_result($ejecutarV, $y, 'ap_materno');
	 							$am = utf8_encode($am);
							$nombreRes = "$nombre $ap $am";
							
							echo   "<tr aling = 'center'>
										<td> $codigoNuevoV </td>
										<td> $CodigoAnterior </td>
                                        <td> $modelo </td>
                                        <td> $marca </td>
                                        <td> $color </td>
                                        <td> $placas </td>
                                        <td> $noserie </td>
                                        <td> $ano </td>
                                        <td> $tipo </td>
                                        <td> $servicio </td>
                                        <td> $Inmueble </td>
                                        <td> $nombreRes </td>
			                        </tr>";
						}
				echo "</table></center>";	
		}
		
		if($filas==0 && $filas3==0 && $filas4==0)
		{
			echo"<center><table><tr><td><img src='../../imagenes/icon_advertencia.png'/></td><td><font size='4' face='Constantia Italic' text color='#ff8816'>No exiten registros</font></td></tr></table></center>";
		}
		else
		{
			echo"<br/><div id='icon_pdf'><a href='ver_reporte_coordinacion.php?$c' target='_blank'>
				<img src='../../imagenes/pdf.png' TITLE='Ver reporte PDF'/></a></div>";
		}

?>