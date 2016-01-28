<?php
	include '../../librerias/conexion.php';
	include '../../librerias/quitar.php';
	
	$idInm = mysql_real_escape_string(quitar($_REQUEST['idInm']));
	$idCo = mysql_real_escape_string(quitar($_REQUEST['idCo']));
	$idR = mysql_real_escape_string(quitar($_REQUEST['idR']));
	$fechaIn = mysql_real_escape_string(quitar($_REQUEST['fecha']));
	$nuevoCodigo = mysql_real_escape_string(quitar($_REQUEST['nuevoCodM']));
	$anteriorCodigo = mysql_real_escape_string(quitar($_REQUEST['anteriorCodM']));
	$idM = mysql_real_escape_string(quitar($_REQUEST['idM']));
	$caract = mysql_real_escape_string(quitar($_REQUEST['caract']));
	$caract = utf8_decode($caract);
	$areaUb = mysql_real_escape_string(quitar($_REQUEST['area']));
	$areaUb = utf8_decode($areaUb);
	$activo = mysql_real_escape_string(quitar($_REQUEST['activo']));
	$idu = mysql_real_escape_string(quitar($_COOKIE['IDusuario']));
	
	$band = 0;
	
	include '../../librerias/libreriaauto.php';
	
	if($fechaIn !="" && $nuevoCodigo !="" && $caract !="" && $areaUb !="")
	{
		if(codNuevo($nuevoCodigo)==1)
		{
			echo"<script>alert('Código Nuevo no valido: $nuevoCodigo')</script>";
			$band = 1;
		}
		
		if(autoubicacion($areaUb)==1)
		{
			$areaUb = utf8_encode($areaUb);
			echo"<script>alert('Área de Ubicación no valida: $areaUb')</script>";
			$band = 1;
		}
	}
	else
	{
		echo"<script>alert('Llenar toda la información antes de continuar')</script>";
		$band = 1;
	}
	
	if($band==0)
	{
		if($anteriorCodigo !="")
		{
			if(codAnterior($anteriorCodigo)==1)
			{
				echo"<script>alert('Código Anterior no valido: $anteriorCodigo')</script>";
				$band = 1;
			}
			
			$consulta = "SELECT * FROM bienes_muebles WHERE codigoAnterior='$anteriorCodigo' AND codigoNuevoM!='$nuevoCodigo'";
			$ejecutar = mysql_query($consulta) or die (mysql_error());
			$filas = mysql_num_rows($ejecutar);
				if($filas != 0)
				{
					$band = 1;
					echo"<script>alert('El código anterior ya se encuentra registrado')</script>";
				}
		}
	}
	
	if($band==0)
	{
		$nuevoCodigo = mb_strtoupper($nuevoCodigo);
		$anteriorCodigo = mb_strtoupper($anteriorCodigo);
		$areaUb = mb_strtoupper($areaUb);
		$caract = mb_strtoupper($caract);
		
		$consulta2 = "CALL modificar_inv_muebles('$nuevoCodigo','$anteriorCodigo',$idM,'$caract','$areaUb','$fechaIn',$idCo,$idR,'$activo',$idu,$idInm)";
		$ejecutar = mysql_query($consulta2) or die (mysql_error());
		
		$caract = utf8_encode($caract);
		$areaUb = utf8_encode($areaUb);
		
		echo"<script>alert('Registro modificado correctamente')</script>";
	}
?>