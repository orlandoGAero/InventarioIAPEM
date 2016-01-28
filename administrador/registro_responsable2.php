<?php
	include '../librerias/conexion.php';
	include '../librerias/quitar.php';
	
	$idR = mysql_real_escape_string(quitar($_REQUEST['idR']));
	$nombre = mysql_real_escape_string(quitar($_REQUEST['nombre']));
	$nombre = utf8_decode($nombre);
	$ap = mysql_real_escape_string(quitar($_REQUEST['ap']));
	$ap = utf8_decode($ap);
	$am = mysql_real_escape_string(quitar($_REQUEST['am']));
	$am = utf8_decode($am);
	$cargo = mysql_real_escape_string(quitar($_REQUEST['cargo']));
	$cargo = utf8_decode($cargo);
	$activo = mysql_real_escape_string(quitar($_REQUEST['activo']));
	$telefono = mysql_real_escape_string(quitar($_REQUEST['telP']));
	$telIAPEM = mysql_real_escape_string(quitar($_REQUEST['telI']));
	$idu = mysql_real_escape_string(quitar($_COOKIE['IDusuario']));
	
	 $band = 0;

	include '../librerias/libreriaauto.php';
	
	if($nombre !="" & $ap !="" & $am !="" & $cargo !="" )
	{
		if(autonombre($nombre)==1)
		{
			$nombre = utf8_encode($nombre);
			echo"<script>alert('Nombre no valido: $nombre')</script>";
			$band = 1;
		}
		
		if(autoap($ap)==1)
		{
			$ap = utf8_encode($ap);
			echo"<script>alert('Apellido Paterno no valido: $ap')</script>";
			$band = 1;
		}
		
		if(autoam($ap)==1)
		{
			$am = utf8_encode($am);
			echo"<script>alert('Apellido Materno no valido: $am')</script>";
			$band = 1;
		}
	}
	else
	{
		echo"<script>alert(' Llenar toda la información antes de continuar')</script>";
		$band = 1;
	}
	
	/*Campos no obligatrios*/
	if($telefono=="")
	{
		$telefono=NULL;
	}
	else
	{
		if(autotel($telefono)==1)
		{
			echo"<script>alert('Teléfono no valido: $telefono')</script>";
			$band = 1;
		}
	}
	
	if($telIAPEM=="")
	{
		$telIAPEM=NULL;
	}
	else
	{
		if(autoext($telIAPEM)==1)
		{
			echo"<script>alert('Extensión no valida: $telIAPEM')</script>";
			$band = 1;
		}
	}
	
	if($band==0)
	{
		$consulta = "SELECT * FROM resguardatarios WHERE nombre='$nombre' and ap_paterno='$ap' and ap_materno='$am' and IDresguardatario!='$idR'";
		$ejecutar = mysql_query($consulta) or die (mysql_error());
		$filas = mysql_num_rows($ejecutar);
			if($filas !=0)
			{
				echo"<script>alert(' El responsable ingresado $nombre $ap $am ya se encuentra registrado')</script>";
				$band = 1;
			}
	}
	
	if($band==0)
	{
		$nombre= mb_strtoupper($nombre);
		$ap = mb_strtoupper($ap);
		$am = mb_strtoupper($am);
		$cargo = mb_strtoupper($cargo);
			
		$consulta2 = "INSERT INTO resguardatarios (IDresguardatario,nombre,ap_paterno,ap_materno,cargo,tel_part,tel_iapem,activo,IDusuario,fecha_mod) VALUES('$idR','$nombre','$ap','$am','$cargo','$telefono','$telIAPEM','$activo',$idu,NOW())";
		$ejecutar = mysql_query($consulta2) or die (mysql_error());
		
		$nombre=utf8_encode($nombre);		
		$ap=utf8_encode($ap);		
		$am=utf8_encode($am);		
		$cargo=utf8_encode($cargo);		
		echo"<script>alert('Registro guardado correctamente')</script>";
	}
	
?>