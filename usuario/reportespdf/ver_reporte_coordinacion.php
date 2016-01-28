<?php
	require_once('class.ezpdf.php');
	$pdf =& new Cezpdf('a4','landscape');
	$pdf->selectFont('fonts/Helvetica.afm');
	$pdf->ezSetCmMargins(1,1,1.5,1.5);
	
	include ('../../librerias/conexion.php');
	include ('../../librerias/decode.php');
	include ('../../librerias/quitar.php');
	
	decode_get($_SERVER["REQUEST_URI"]);
	$idCo = mysql_real_escape_string(quitar($_GET['IDcoordinacion']));
	
	/*muebles*/
	$consulta = " 	SELECT CONCAT(resg.nombre,' ',resg.ap_paterno,' ',resg.ap_materno) AS nombreRes,bmu.codigoNuevoM, bmu.codigoAnterior, mu.nombre, bmu.caracteristicas, binm.nombre_sede, bmu.area_ubicacion
					FROM muebles AS mu, bienes_muebles AS bmu, resguardatarios AS resg, bienes_inmuebles AS binm
					WHERE bmu.IDcoordinacion = '$idCo' AND bmu.activo = 'Si'
						AND resg.IDresguardatario = bmu.IDresguardatario
						AND mu.IDmueble = bmu.IDmueble
						AND binm.IDinmueble = bmu.IDinmueble ";
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
			
		
	$titles = array(
					'codigoNuevoM'=>$codigoN,
					'codigoAnterior'=>$codigoA,
					'nombre'=>$arti,
					'caracteristicas'=>$caract,
					'nombre_sede'=>'<b>Inmueble</b>',
					'nombreRes'=>'<b>Responsable</b>'
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
				
	/*tecnologias*/
	$consultaTec = " SELECT CONCAT(resg.nombre,' ',resg.ap_paterno,' ',resg.ap_materno) AS nombreRes,tec.codigoNuevoT, tec.codigoAnterior, eqinf.equipo_informatico, tec.modelo, tec.marca, tec.color, tec.caracteristicas, tec.area_ubicacion, binm.nombre_sede
					FROM equipos_informaticos AS eqinf, tecnologias AS tec, resguardatarios AS resg, bienes_inmuebles AS binm
					WHERE tec.IDcoordinacion = '$idCo' AND tec.activo = 'Si'
						AND resg.IDresguardatario = tec.IDresguardatario
						AND eqinf.IDeinformatico = tec.IDeinformatico
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
					'nombreRes'=>'<b>Responsable</b>'
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
	
	/*Planta vehícular*/
	$consultaV = " SELECT CONCAT(resg.nombre,' ',resg.ap_paterno,' ',resg.ap_materno) AS nombreRes,pv.codigoNuevoV, pv.codigoAnterior, pv.modelo, pv.marca, pv.color, pv.placas, pv.noSerie, pv.ano, pv.tipo_v, pv.servicio, binm.nombre_sede
					FROM planta_vehicular AS pv, resguardatarios AS resg, bienes_inmuebles AS binm
					WHERE pv.IDcoordinacion = '$idCo' AND pv.activo = 'Si'
						AND resg.IDresguardatario = pv.IDresguardatario
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
					'nombreRes'=>'<b>Responsable</b>'
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
	$consultaC = "SELECT coordinacion FROM coordinaciones WHERE IDcoordinacion=$idCo";
	$ejecutarC = mysql_query($consultaC) or die(mysql_error());
	$nomCo = mysql_result($ejecutarC,0,'coordinacion');
	$nomCo = utf8_encode($nomCo);
	
	$txttit.="<b>REPORTE DE COORDINACIÓN INVENTARIO IAPEM</b>\n";
	$txttit = utf8_decode($txttit);
	$pdf->ezText($txttit,12,array('justification' => 'center'));
	$txttitR = "COORDINACIÓN: <b>$nomCo</b>\n";
	$txttitR = utf8_decode($txttitR);
	$pdf->ezText($txttitR,9,array('justification' => 'right'));
	
	if($filas!=0)
	{
		$txttit1.= "<b>Bienes Muebles</b> \n";
		$pdf->ezText($txttit1, 10);
		$pdf->ezTable($data, $titles, '', $options);
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