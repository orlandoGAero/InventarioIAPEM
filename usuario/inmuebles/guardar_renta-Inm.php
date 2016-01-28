<?php
	include '../../librerias/conexion.php';
	include '../../librerias/quitar.php';
	
	$idRent = mysql_real_escape_string(quitar($_REQUEST['idRe']));
	$idInm = mysql_real_escape_string(quitar($_REQUEST['idInm']));
	$cadena = mysql_real_escape_string(quitar($_REQUEST['nom']));
	$cadena = utf8_decode($cadena);
	$costo = mysql_real_escape_string(quitar($_REQUEST['costo']));
	$fecha_Rent = mysql_real_escape_string(quitar($_REQUEST['fecha_r']));
	$fecha_RentEnt = mysql_real_escape_string(quitar($_REQUEST['fecha_e']));
	
	$band = 0;
	
	include '../../librerias/libreriaauto.php';
	
	if($cadena !="" && $costo !="" && $fecha_Rent !="" && $fecha_RentEnt !="")
	{
		if(autocadena($cadena)==1)
		{
			$cadena = utf8_encode($cadena);
			echo"<script>alert('Nombre no valido: $cadena')</script>";
			$band = 1;
		}
		
		if(autocost($costo)==1)
		{
			echo"<script>alert('Costo no valido: $costo')</script>";
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
		
		$consulta = "INSERT INTO renta_inmuebles (IDrenta,IDinmueble,costo,fechaRenta,fechaEntrega,nombre)
					VALUES ($idRent,$idInm,'$costo','$fecha_Rent','$fecha_RentEnt','$cadena')";
		$ejecutar = mysql_query($consulta) or die(mysql_error());
		
		$cadena = utf8_encode($cadena);
		echo"<script>alert('Registro guardado correctamente')</script>";
	}
?>