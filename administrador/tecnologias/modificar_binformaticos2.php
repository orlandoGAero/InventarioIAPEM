<?php

	include '../../librerias/conexion.php';
	include '../../librerias/quitar.php';

	//print_r($_REQUEST);
	$codigoNuevo = mysql_real_escape_string(quitar($_REQUEST['codigoNuevoT']));
	$codigoAnterior = mysql_real_escape_string(quitar($_REQUEST['codigoAnterior']));
	$fechain = mysql_real_escape_string(quitar($_REQUEST['fecha_ingreso']));
	$IDeinf = mysql_real_escape_string(quitar($_REQUEST['IDeinformatico']));
	$modelo = mysql_real_escape_string(quitar($_REQUEST['modelo']));
		$modelo = utf8_decode ($modelo);
	$marca = mysql_real_escape_string(quitar($_REQUEST['marca']));
	$color = mysql_real_escape_string(quitar($_REQUEST['colorTe']));
		$color = utf8_decode($color);
	$caract = mysql_real_escape_string(quitar($_REQUEST['caracteristicas']));
		$caract = utf8_decode($caract);
	$areaUb = mysql_real_escape_string(quitar($_REQUEST['area_ubicacion']));
		$areaUb = utf8_decode($areaUb);
	$activo = mysql_real_escape_string(quitar($_REQUEST['activo']));
	$idCo = mysql_real_escape_string(quitar($_REQUEST['IDcoordinacion']));
	$idR = mysql_real_escape_string(quitar($_REQUEST['IDresguardatario']));
	$idInmueble = mysql_real_escape_string(quitar($_REQUEST['IDinmueble']));
		$idu = $_COOKIE['IDusuario'];

	$band = 0;
	
		include '../../librerias/libreriaauto.php';

	if ($fechain != "" && $codigoNuevo != "" && $modelo != "" && $marca != "" && $caract != "" && $areaUb != "") 
	{
		if (codigoNuevo($codigoNuevo)==1) 
		{
			$band = 1;
			echo"<script>alert('Código Nuevo no valido: $codigoNuevo')</script>";
		}
		
		if(marca($marca)==1)
		{
			$marca = utf8_encode($marca);
			$band = 1;
			echo"<script>alert('Marca no valida: $marca')</script>";
			
		}

		if (autoubicacion($areaUb)==1) 
		{
			$areaUb = utf8_encode($areaUb);
			$band = 1;
			echo"<script>alert('Área Ubicación no valida: $areaUb')</script>";
		}

	} else { 
				$band = 1;
				echo "<script>alert(' Llenar toda la información antes de continuar')</script>";
			}

		if ($color != "")
		{	
			if (color($color)==1)
			{
				$color = utf8_encode ($color);
				$band = 1;
				echo"<script>alert('Color no valido: $color')</script>";

			}
		}

	if ($band==0) 
	{
		if ( $codigoAnterior != "" )
		{
			$consulta = "	SELECT * 
							FROM tecnologias 
							WHERE codigoAnterior = '$codigoAnterior' AND codigoNuevoT != '$codigoNuevo'";
			$ejecutar = mysql_query($consulta) or die (mysql_error());
			$filas = mysql_num_rows($ejecutar);
				
				if (codigoAnterior($codigoAnterior)==1) 
				{
					$band = 1;
					echo"<script>alert('Código Anterior no valido: $codigoAnterior')</script>";
				}

				if ($filas !=0) 
				{
					$band = 1;
					echo "<script>alert('Codigo anterior $codigoAnterior duplicado')</script>";
				}
		}
	}

	if ($band==0)
	{
		$modelo = mb_strtoupper($modelo);
		$marca = mb_strtoupper($marca);
		$caract = mb_strtoupper($caract);
		$color = mb_strtoupper($color);
		$areaUb = mb_strtoupper($areaUb);
		
		$consultaM = " CALL modificarBinformaticos('$codigoNuevo','$codigoAnterior',$IDeinf,'$modelo','$marca','$color','$caract','$areaUb','$fechain',$idCo,$idR,'$activo',$idu,$idInmueble)";
		$ejecutar = mysql_query($consultaM) or die (mysql_error());
		
		$modelo = utf8_encode ($modelo);
		$color = utf8_encode ($color);
		$caract = utf8_encode ($caract);
		$areaUb = utf8_encode ($areaUb);
		
		
		echo "<script>alert('Registro modificado correctamente')</script>";



	}





?>