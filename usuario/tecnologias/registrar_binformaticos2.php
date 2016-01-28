<?php
	
	include '../../librerias/conexion.php';
	include '../../librerias/quitar.php';

	//print_r($_REQUEST);
	$IDinmueble = mysql_real_escape_string(quitar($_REQUEST['idI']));
	$idCo = mysql_real_escape_string(quitar($_REQUEST['idCo']));
	$idR = mysql_real_escape_string(quitar($_REQUEST['idR']));
	$codigoNuevo = mysql_real_escape_string(quitar($_REQUEST['CodigoNuevoT']));
	$codigoAnterior = mysql_real_escape_string(quitar($_REQUEST['anteriorCodTic']));
	$fechaIn = mysql_real_escape_string(quitar($_REQUEST['fecha_ingreso']));
	$IDeTec = mysql_real_escape_string(quitar($_REQUEST['IDinf']));
	$modelo = mysql_real_escape_string(quitar($_REQUEST['modeloTic']));
		$modelo = utf8_decode ($modelo);
	$marca = mysql_real_escape_string(quitar($_REQUEST['marcaTic']));
	$color = mysql_real_escape_string(quitar($_REQUEST['colorTic']));
		$color = utf8_decode ($color);
	$caract = mysql_real_escape_string(quitar($_REQUEST['caract']));
		$caract = utf8_decode($caract);
	$areaUb = mysql_real_escape_string(quitar($_REQUEST['area_ubic']));
		$areaUb = utf8_decode($areaUb);
	$activo=mysql_real_escape_string(quitar($_REQUEST['activo'])); 
    $idu = $_COOKIE['IDusuario']; 

	$band = 0;

	include '../../librerias/libreriaauto.php';

	if ($fechaIn != "" && $codigoNuevo != "" && $modelo != "" && $marca != "" && $caract != "" && $areaUb != "" ) 
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
			
	if ( $IDinmueble == "Seleccione..." && $idCo == "Seleccione..." && $idR == "Seleccione..." && $IDeTec == "Seleccione..." )
	{
		$band = 1;
		echo "<script>alert(' Seleccionar todos los datos antes de continuar')</script>";
	} else {
				if ( $IDinmueble == "Seleccione..." )
				{
					$band = 1;
					echo "<script>alert('Seleccionar el Inmueble')</script>";
				}
				
				if ( $idCo == "Seleccione..." )
				{
					$band = 1;
					echo "<script>alert('Seleccionar la Coordinación')</script>";
				}
				
				if ( $idR == "Seleccione..." )
				{
					$band = 1;
					echo "<script>alert('Seleccionar el Responsable')</script>";
				}
				
				if ( $IDeTec == "Seleccione..." )
				{
					$band = 1;
					echo "<script>alert('Seleccionar el Artículo')</script>";
				}
			}

	if ($band==0) 
	{
		if ( $codigoAnterior != "" )
		{
			$consulta = " SELECT * 
					  FROM tecnologias 
					  WHERE codigoAnterior = '$codigoAnterior' AND codigoNuevoT != '$codigoNuevo' ";
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
					echo "<script>alert('Codigo anterior duplicado: $codigoAnterior')</script>";
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

		$consulta3 = "INSERT INTO tecnologias (codigoNuevoT,codigoAnterior,IDeinformatico,modelo,marca,color,caracteristicas,area_ubicacion,fecha_ingreso,IDcoordinacion,IDresguardatario,activo,IDusuario,fecha_mod,IDinmueble)
					  VALUES ('$codigoNuevo','$codigoAnterior',$IDeTec,'$modelo','$marca','$color','$caract','$areaUb','$fechaIn',$idCo,$idR,'$activo',$idu,NOW(),$IDinmueble)";
		$ejecutar3 = mysql_query($consulta3) or die (mysql_error());

		$modelo = utf8_encode ($modelo);
		$color = utf8_encode ($color);
		$caract = utf8_encode ($caract);
		$areaUb = utf8_encode ($areaUb);

		echo "<script>alert('Registro guardado correctamente')</script>";
	}
?>