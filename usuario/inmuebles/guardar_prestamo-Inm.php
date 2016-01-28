<?php
	include '../../librerias/conexion.php';
	include '../../librerias/quitar.php';
	
	$idPre = mysql_real_escape_string(quitar($_REQUEST['idP']));
	$idInm = mysql_real_escape_string(quitar($_REQUEST['idInm']));
	$cadena = mysql_real_escape_string(quitar($_REQUEST['nom']));
	$cadena = utf8_decode($cadena);
	
	$band = 0;
	
	include '../../librerias/libreriaauto.php';
	
	if($cadena !="")
	{
		if(autocadena($cadena)==1)
		{
			$cadena = utf8_encode($cadena);
			echo"<script>alert('Nombre no valido: $cadena')</script>";
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
		$cadena = mb_strtoupper($cadena);
		
		$consulta = "INSERT INTO prestamo_inmuebles (IDprestamo,IDinmueble,nombre)
					VALUES ($idPre,$idInm,'$cadena')";
		$ejecutar = mysql_query($consulta) or die(mysql_error());
		
		$cadena = utf8_encode($cadena);
		echo"<script>alert('Registro guardado correctamente')</script>";
	}
?>