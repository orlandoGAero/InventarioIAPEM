<?php
	echo"<link type='text/css' href='../../css/style_table.css' rel='stylesheet'/>";
	if($_REQUEST['buscar'])
	{
		include '../../librerias/conexion.php';
		include '../../librerias/encode.php';
		include '../../librerias/quitar.php';
		
		$crit = mysql_real_escape_string(quitar($_REQUEST['buscar']));
		
		$consulta = "SELECT bm.codigoNuevoM,bm.codigoAnterior,bm.fecha_ingreso,bm.activo,bm.area_ubicacion,bm.caracteristicas,m.nombre,bi.nombre_sede,c.coordinacion,r.nombre as nomR,r.ap_paterno,r.ap_materno
					FROM bienes_muebles AS bm,muebles AS m,coordinaciones AS c,resguardatarios AS r,bienes_inmuebles as bi
					WHERE (bm.codigoNuevoM LIKE '$crit%' OR bm.codigoAnterior LIKE '$crit%' OR bm.area_ubicacion LIKE '$crit%' OR bm.activo LIKE '$crit%' OR m.nombre LIKE '$crit%' OR bi.nombre_sede LIKE '$crit%' OR c.coordinacion LIKE '$crit%' OR r.nombre LIKE '$crit%' OR r.ap_paterno LIKE '$crit%' OR r.ap_materno LIKE '$crit%') 
					AND bm.activo='Si' AND m.IDmueble=bm.IDmueble AND c.IDcoordinacion=bm.IDcoordinacion AND r.IDresguardatario=bm.IDresguardatario AND bi.IDinmueble=bm.IDinmueble";
		$ejecutar = mysql_query($consulta) or die (mysql_error());
		
		$filas = mysql_num_rows($ejecutar);
		$cri = encode("crit=$crit");
			if($filas==0)
			{
				echo"<center><table><tr><td><img src='../../imagenes/icon_advertencia.png'/></td><td><font size='4' face='Constantia Italic' text color='#ff8816'>No exiten registros con el criterio tecleado</font></td></tr></table></center>";
			} 
			else 
			{
				echo "<div id='icon_excel'><a href='../../excel/user/exl_inventario-muebles.php?$cri'><img src='../../imagenes/excel2013.png' TITLE='Ver Excel'/></a></div>";
				echo "<center>
						<table border = '0' id ='miTabla'>
							<tr>
								<th> Código Nuevo </th>
								<th> Código Anterior </th>
								<th> Fecha Ingreso </th>
								<th> Artículo </th>
								<th> Características </th>
								<th> Inmueble </th>
								<th> Coordinación </th>
								<th> Responsable </th>
								<th> Área de Ubicación </th>
								<th> Activo </th>
							</tr>";
								
							for($y=0;$y<$filas;$y++)
							{
								$codigoNuevoM = mysql_result ($ejecutar,$y,'codigoNuevoM');
								$g = encode("codigoNuevoM=$codigoNuevoM");
								$h = encode("codigoNuevoM=$codigoNuevoM");
								$codigoAnteriorM = mysql_result ($ejecutar,$y,'codigoAnterior');
								$fechaIn = mysql_result ($ejecutar,$y,'fecha_ingreso');
								$articulo = mysql_result ($ejecutar,$y,'nombre');
								$articulo = utf8_encode($articulo);
								$caract = mysql_result ($ejecutar,$y,'caracteristicas');
								$caract = utf8_encode($caract);
								$nomInm = mysql_result ($ejecutar,$y,'nombre_sede');
								$nomInm = utf8_encode ($nomInm);
								$nomCo = mysql_result ($ejecutar,$y,'coordinacion');
								$nomCo = utf8_encode($nomCo);
								$nomR = mysql_result ($ejecutar,$y,'nomR');
								$nomR = utf8_encode($nomR);
								$apR = mysql_result ($ejecutar,$y,'ap_paterno');
								$apR = utf8_encode($apR);
								$amR = mysql_result ($ejecutar,$y,'ap_materno');
								$amR = utf8_encode($amR);
								$nomResp = "$nomR $apR $amR";
								$areaUb = mysql_result ($ejecutar,$y,'area_ubicacion');
								$areaUb = utf8_encode($areaUb);
								$activo = mysql_result ($ejecutar,$y,'activo');
								
								echo "<tr>
										<td>$codigoNuevoM</td>
										<td>$codigoAnteriorM</td>
										<td>$fechaIn</td>
										<td>$articulo</td>
										<td>$caract</td>
										<td>$nomInm</td>
										<td>$nomCo</td>
										<td>$nomResp</td>
										<td>$areaUb</td>
										<td>$activo</td>
									 </tr>";
							}
							
					echo "</table></center>";
			}
	}
?>