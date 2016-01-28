<?php
	require_once('class.ezpdf.php');
	$pdf =& new Cezpdf('a4','landscape');
	$pdf->selectFont('fonts/Helvetica.afm');
	$pdf->ezSetCmMargins(1,1,1.5,1.5);
	
	include ('../../librerias/conexion.php');
	include ('../../librerias/decode.php');
	include ('../../librerias/quitar.php');
	
	decode_get($_SERVER["REQUEST_URI"]);
	$idR = mysql_real_escape_string(quitar($_GET['IDresguardatario']));
	
	/*muebles*/
	$consulta = " 	SELECT bmu.codigoNuevoM, bmu.codigoAnterior, mu.nombre, bmu.caracteristicas, binm.nombre_sede, coord.coordinacion, bmu.area_ubicacion
					FROM muebles AS mu, bienes_muebles AS bmu, resguardatarios AS resg, bienes_inmuebles AS binm, coordinaciones AS coord
					WHERE bmu.IDresguardatario = '$idR' AND bmu.activo = 'Si'
						AND resg.IDresguardatario = bmu.IDresguardatario
						AND mu.IDmueble = bmu.IDmueble
						AND binm.IDinmueble = bmu.IDinmueble
						AND coord.IDcoordinacion = bmu.IDcoordinacion ";
 	$ejecutar = mysql_query($consulta) or die (mysql_error());
 	$filas = mysql_num_rows($ejecutar);
	$ixx = 0;
	while($datatmp = mysql_fetch_assoc($ejecutar)) {
		$ixx = $ixx+1;
		$data[] = array_merge($datatmp, array('num'=>$ixx));
	}
	
		/*Títulos Tabla*/
		$codigoN="<b>Código Nuevo</b>";
			$codigoN=utf8_decode($codigoN);
		$codigoA="<b>Código Anterior</b>";
			$codigoA=utf8_decode($codigoA);
		$arti="<b>Artículo</b>";
			$arti=utf8_decode($arti);
		$caract="<b>Características</b>";
			$caract=utf8_decode($caract);
		$coord="<b>Coordinación</b>";
			$coord=utf8_decode($coord);
		$areaU="<b>Área de Ubicación</b>";
			$areaU=utf8_decode($areaU);
			
		
	$titles = array(
					'codigoNuevoM'=>$codigoN,
					'codigoAnterior'=>$codigoA,
					'nombre'=>$arti,
					'caracteristicas'=>$caract,
					'nombre_sede'=>'<b>Inmueble</b>',
					'coordinacion'=>$coord,
					'area_ubicacion'=>$areaU
				);
	$options = array(
					'showLines'=>3,
					'lineCol' => array(0.4,0.4,0.4),
					'titleFontSize' => 8,
					'showHeadings'=>1,
					'shadeCol'=>array(0.9,0.9,0.9),
					'rowGap'=>5,
					'colGap'=>5,
					'xPos'=>'center',
					'xOrientation'=>'center',
					'yPos'=>'center',
					'yOrientation' => 'center',
					'xOrientation'=>'center',
					'width'=>760,
					'fontSize'=>8
				);
	/*inmuebles*/			
	$consultaInm = " SELECT CONCAT(binm.calle,' ',binm.numero,' COL.',binm.colonia,' C.P.',binm.cp,', ',binm.ciudad,', EDO. MEXICO')AS direccion,
							binm.IDinmueble, binm.nombre_sede,binm.telefono, adq.tipo
					 FROM bienes_inmuebles AS binm, estado_adquisicion AS adq, resguardatarios AS resg
					 WHERE binm.IDresguardatario = '$idR' AND binm.activo = 'Si'
						AND adq.IDest_adq = binm.IDest_adq
						AND resg.IDresguardatario = binm.IDresguardatario";
	$ejecutarInm = mysql_query($consultaInm) or die (mysql_error());
	$filas2 = mysql_num_rows($ejecutarInm);
	
	$x = 0;
	while($datatmp2 = mysql_fetch_assoc($ejecutarInm)) {
		$x = $x+1;
		$data2[] = array_merge($datatmp2);
	}
	
		/*Títulos Tabla*/
		$dir="<b>Dirección</b>";
			$dir=utf8_decode($dir);
		$tel="<b>Teléfono</b>";
			$tel=utf8_decode($tel);
		$estado="<b>Estado de adquisición</b>";
			$estado=utf8_decode($estado);
	
	$titles2 = array(
					'IDinmueble'=>'<b>ID Inmueble</b>',
					'nombre_sede'=>'<b>Nombre</b>',
					'direccion'=>$dir,
					'telefono'=>$tel,
					'tipo'=>$estado
				);
	$options2 = array(
					'showLines'=>3,
					'lineCol' => array(0.4,0.4,0.4),
					'titleFontSize' => 8,
					'showHeadings'=>1,
					'shadeCol'=>array(0.9,0.9,0.9),
					'rowGap'=>5,
					'colGap'=>5,
					'xPos'=>'center',
					'xOrientation'=>'center',
					'yPos'=>'center',
					'yOrientation' => 'center',
					'xOrientation'=>'center',
					'width'=>760,
					'fontSize'=>8
				);
				
	/*tecnologias*/
	$consultaTec = " SELECT tec.codigoNuevoT, tec.codigoAnterior, eqinf.equipo_informatico, tec.modelo, tec.marca, tec.color, tec.caracteristicas, tec.area_ubicacion, coord.coordinacion, binm.nombre_sede
					 FROM equipos_informaticos AS eqinf, tecnologias AS tec, coordinaciones AS coord, bienes_inmuebles AS binm
					 WHERE tec.IDresguardatario = '$idR' AND tec.activo = 'Si'
						AND eqinf.IDeinformatico = tec.IDeinformatico
						AND coord.IDcoordinacion = tec.IDcoordinacion
						AND binm.IDinmueble = tec.IDinmueble";
	$ejecutarTec = mysql_query($consultaTec) or die (mysql_error());
	$filas3 = mysql_num_rows($ejecutarTec);
	
	$y = 0;
	while($datatmp3 = mysql_fetch_assoc($ejecutarTec)) {
		$y = $y+1;
		$data3[] = array_merge($datatmp3, array('num'=>$y));
	}

	$titles3 = array(
					'codigoNuevoT'=>$codigoN,
					'codigoAnterior'=>$codigoA,
					'equipo_informatico'=>$arti,
					'modelo'=>'<b>Modelo</b>',
					'marca'=>'<b>Marca</b>',
					'color'=>'<b>Color</b>',
					'caracteristicas'=>$caract,
					'nombre_sede'=>'<b>Inmueble</b>',
					'coordinacion'=>$coord,
					'area_ubicacion'=>$areaU
				);
	$options3 = array(
					'showLines'=>3,
					'lineCol' => array(0.4,0.4,0.4),
					'titleFontSize' => 8,
					'showHeadings'=>1,
					'shadeCol'=>array(0.9,0.9,0.9),
					'rowGap'=>5,
					'colGap'=>5,
					'xPos'=>'center',
					'xOrientation'=>'center',
					'yPos'=>'center',
					'yOrientation' => 'center',
					'xOrientation'=>'center',
					'width'=>760,
					'fontSize'=>8
				);
				
	$consultaV = " SELECT pv.codigoNuevoV, pv.codigoAnterior, pv.modelo, pv.marca, pv.color, pv.placas, pv.noSerie, pv.ano, pv.tipo_v, pv.servicio, binm.nombre_sede, coord.coordinacion
					FROM planta_vehicular AS pv, resguardatarios AS resg, coordinaciones AS coord, bienes_inmuebles AS binm
					WHERE pv.IDresguardatario = '$idR' AND pv.activo = 'Si'
						AND resg.IDresguardatario = pv.IDresguardatario
						AND coord.IDcoordinacion = pv.IDcoordinacion
						AND binm.IDinmueble = pv.IDinmueble";
	$ejecutarV = mysql_query($consultaV) or die (mysql_error());
	$filas4 = mysql_num_rows($ejecutarV);
	
	$z = 0;
	while($datatmp4 = mysql_fetch_assoc($ejecutarV)) {
		$z = $z+1;
		$data4[] = array_merge($datatmp4, array('num'=>$z));
	}
	
		/*Títulos Tabla*/
		$ano="<b>Año</b>";
			$ano=utf8_decode($ano);
		
	$titles4 = array(
					'codigoNuevoV'=>$codigoN,
					'codigoAnterior'=>$codigoA,
					'modelo'=>'<b>Modelo</b>',
					'marca'=>'<b>Marca</b>',
					'color'=>'<b>Color</b>',
					'placas'=>'<b>Placas</b>',
					'noSerie'=>'<b>No. Serie</b>',
					'ano'=>$ano,
					'tipo_v'=>'<b>Tipo</b>',
					'servicio'=>'<b>Servicio</b>',
					'nombre_sede'=>'<b>Inmueble</b>',
					'coordinacion'=>$coord
				);
	$options4 = array(
					'showLines'=>3,
					'lineCol' => array(0.4,0.4,0.4),
					'titleFontSize' => 8,
					'showHeadings'=>1,
					'shadeCol'=>array(0.9,0.9,0.9),
					'rowGap'=>5,
					'colGap'=>5,
					'xPos'=>'center',
					'xOrientation'=>'center',
					'yPos'=>'center',
					'yOrientation' => 'center',
					'xOrientation'=>'center',
					'width'=>760,
					'fontSize'=>8
				);
	
	/*Consulta nombre completo responsable*/			
	$consultaRes = "SELECT nombre,ap_paterno,ap_materno FROM resguardatarios WHERE IDresguardatario=$idR";
	$ejecutarRes = mysql_query($consultaRes) or die(mysql_error());
	$nombre = mysql_result($ejecutarRes,0,'nombre');
	$nombre = utf8_encode($nombre);
	$ap = mysql_result($ejecutarRes,0,'ap_paterno');
	$ap = utf8_encode($ap);
	$am = mysql_result($ejecutarRes,0,'ap_materno');
	$am = utf8_encode($am);
	$nombreRes = "$nombre $ap $am";
	
	$pdf->ezText("<b>REPORTE DE RESGUARDO INVENTARIO IAPEM</b>\n",12,array('justification' => 'center'));
	$txttitR = "RESPONSABLE: <b>$nombreRes</b>\n";
	$txttitR = utf8_decode($txttitR);
	$pdf->ezText($txttitR,9,array('justification' => 'right'));
	
	if($filas!=0)
	{
		$txttit1.= "<b>Bienes Muebles</b> \n";
		$pdf->ezText($txttit1, 10);
		$pdf->ezTable($data, $titles, '', $options);
	}
	
	$pdf->ezText("\n\n", 2);
	
	if($filas2!=0)
	{
		$txttit2.= "<b>Bienes Inmuebles</b> \n";
		$pdf->ezText($txttit2, 10);
		$pdf->ezTable($data2, $titles2, '', $options2);
	}
	
	$pdf->ezText("\n\n", 2);
	
	if($filas3!=0)
	{
		$txttit3.= "<b>Bienes Informáticos</b> \n";
		$txttit3 = utf8_decode($txttit3);
		$pdf->ezText($txttit3, 10);
		$pdf->ezTable($data3, $titles3, '', $options3);
	}
	
	$pdf->ezText("\n\n", 2);
	
	if($filas4!=0)
	{
		$txttit4.= "<b>Planta Vehícular</b> \n";
		$txttit4 = utf8_decode($txttit4);
		$pdf->ezText($txttit4, 10);
		$pdf->ezTable($data4, $titles4, '', $options4);
	}
		
	$pdf->ezText("\n\n\n", 3);
	$pdf->ezText("<b>Fecha:</b> ".date("d/m/Y"), 10);
	$pdf->ezText("<b>Hora:</b> ".date("H:i:s")."\n\n", 10);
	$pdf->ezStream();
?>