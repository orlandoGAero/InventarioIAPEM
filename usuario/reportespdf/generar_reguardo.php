<link type="text/css" href="../../css/style_table.css" rel="stylesheet"/>
<?php
 	
 	$idR = $_REQUEST ['IDreguardatario'];

 	include '../../librerias/conexion.php';
	include '../../librerias/encode.php';

	$r = encode("IDresguardatario=$idR");
	
 	$consulta = " 	SELECT bmu.codigoNuevoM, bmu.codigoAnterior, mu.nombre, bmu.caracteristicas, binm.nombre_sede, coord.coordinacion, bmu.area_ubicacion
					FROM muebles AS mu, bienes_muebles AS bmu, bienes_inmuebles AS binm, coordinaciones AS coord
					WHERE bmu.IDresguardatario = '$idR' AND bmu.activo = 'Si'
						AND mu.IDmueble = bmu.IDmueble
						AND binm.IDinmueble = bmu.IDinmueble
						AND coord.IDcoordinacion = bmu.IDcoordinacion ";
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
	 						<th> Coordinación </th>
	 						<th> Área de ubicación</th> 
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
	 						$coord = mysql_result($ejecutar, $y, 'coordinacion');
	 							$coord = utf8_encode($coord);
	 						$area_ubi = mysql_result($ejecutar, $y, 'area_ubicacion');
	 							$area_ubi = utf8_encode($area_ubi);
	 					

	 						echo "<tr>
	 								<td> $CodNuevoM </td>
	 								<td> $CodAntM </td>
	 								<td> $mueble </td>
	 								<td> $caract </td>
	 								<td> $inmueble </td>
	 								<td> $coord </td>
	 								<td> $area_ubi </td>
	 							 </tr>";
	 					}
	 				echo "</table></center>"; 
 	}


 		$consultaInm = " 	SELECT binm.IDinmueble, binm.nombre_sede, binm.calle, binm.numero, binm.colonia,binm.cp, binm.ciudad,binm.telefono, adq.tipo
							FROM bienes_inmuebles AS binm, estado_adquisicion AS adq
							WHERE binm.IDresguardatario = '$idR' AND binm.activo = 'Si'
								AND adq.IDest_adq = binm.IDest_adq";
 		$ejecutarInm = mysql_query($consultaInm) or die (mysql_error());
 		$filas2 = mysql_num_rows($ejecutarInm);

 		if ($filas2 != 0)
 		{
 			echo "<br/><table id='miTabla'><tr><th>Bienes Inmuebles</th></tr></table><br/>";

 			echo "<center>
	 				<table border = '0' id = 'miTabla'>
	 					<tr>
	 						<th> Código Inmueble </th>
	 						<th> Nombre </th>
	 						<th> Dirección </th>
	 						<th> Teléfono </th>
	 						<th> Estado de adquisición </th>
	 					</tr> ";

	 					for ($y=0; $y <$filas2 ; $y++) 
	 					{ 
	 						$codInmueble = mysql_result($ejecutarInm, $y, 'IDinmueble');
	 						$nom_sede = mysql_result($ejecutarInm, $y, 'nombre_sede');
	 							$nom_sede = utf8_encode($nom_sede);
	 						$calle = mysql_result($ejecutarInm, $y, 'calle');
	 							$calle = utf8_encode($calle);
	 						$num = mysql_result($ejecutarInm, $y, 'numero');
	 						$colonia = mysql_result($ejecutarInm, $y, 'colonia');
	 							$colonia = utf8_encode($colonia);
	 						$cp = mysql_result($ejecutarInm, $y, 'cp');
	 						$ciudad = mysql_result($ejecutarInm, $y, 'ciudad');
	 							$ciudad = utf8_encode($ciudad);
	 						$tel = mysql_result($ejecutarInm, $y, 'telefono');
	 						$estad_adq = mysql_result($ejecutarInm, $y, 'tipo');
	 							$estad_adq = utf8_encode($estad_adq);

	 						if ($num == 'S/N')
	 						{
	 							$dir = " $calle $num COL.$colonia C.P.$cp, $ciudad, EDO.MÉXICO ";
	 						} else {
	 									$dir = " $calle No.$num COL.$colonia C.P.$cp, $ciudad, EDO.MÉXICO";
	 								}
	 					

		 					echo "<tr>
		 							<td> $codInmueble </td>
		 							<td> $nom_sede </td>
		 							<td> $dir </td>
		 							<td> $tel </td>
		 							<td> $estad_adq </td>
		 						</tr>";
	 					}
	 				echo "</table></center>";
 		}

 		$consultaTec = " 	SELECT tec.codigoNuevoT, tec.codigoAnterior, eqinf.equipo_informatico, tec.modelo, tec.marca, tec.color, tec.caracteristicas, tec.area_ubicacion, coord.coordinacion, binm.nombre_sede
							FROM equipos_informaticos AS eqinf, tecnologias AS tec, coordinaciones AS coord, bienes_inmuebles AS binm
							WHERE tec.IDresguardatario = '$idR' AND tec.activo = 'Si'
								AND eqinf.IDeinformatico = tec.IDeinformatico
								AND coord.IDcoordinacion = tec.IDcoordinacion
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
							<th> Coordinación </th>
							<th> Área de ubicación </th>
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
							$area_u = mysql_result($ejecutarTec, $y, 'area_ubicacion');
								$area_u = utf8_encode($area_u);
							$Coord = mysql_result($ejecutarTec, $y, 'coordinacion');
								$Coord = utf8_encode($Coord);
							$Inmueble = mysql_result($ejecutarTec, $y, 'nombre_sede');
								$Inmueble = utf8_encode($Inmueble);

							echo "<tr aling = 'center'>
									<td> $codNuevoT </td>
									<td> $codAnt </td>
									<td> $eq_inf </td>
									<td> $modelo </td>
									<td> $marca </td>
									<td> $color </td>
									<td> $Caracteristicas </td>
									<td> $Inmueble </td>
									<td> $Coord </td>
									<td> $area_u </td>
								</tr>";
						}
				echo "</table></center>";
 		}

 		$consultaV = " 	SELECT pv.codigoNuevoV, pv.codigoAnterior, pv.modelo, pv.marca, pv.color, pv.placas, pv.noSerie, pv.ano, pv.tipo_v, pv.servicio, binm.nombre_sede, coord.coordinacion
						FROM planta_vehicular AS pv, coordinaciones AS coord, bienes_inmuebles AS binm
						WHERE pv.IDresguardatario = '$idR' AND pv.activo = 'Si'
							AND coord.IDcoordinacion = pv.IDcoordinacion
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
								<th> Coordinación </th>
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
							$Coord = mysql_result($ejecutarV, $y, 'coordinacion');
								$Coord = utf8_encode($Coord);
							$Inmueble = mysql_result($ejecutarV, $y, 'nombre_sede');
								$Inmueble = utf8_encode($Inmueble);


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
                                        <td> $Coord </td>
			                        </tr>";
						}
				echo "</table></center>";	
		}
		
		if($filas==0 && $filas2==0 && $filas3==0 && $filas4==0)
		{
			echo"<center><table><tr><td><img src='../../imagenes/icon_advertencia.png'/></td><td><font size='4' face='Constantia Italic' text color='#ff8816'>No exiten registros</font></td></tr></table></center>";
		}
		else
		{
			echo"<br/><div id='icon_pdf'><a href='ver_reporte_resguardo.php?$r' target='_blank'>
				<img src='../../imagenes/pdf.png' TITLE='Ver reporte PDF'/></a></div>";
		}

?>