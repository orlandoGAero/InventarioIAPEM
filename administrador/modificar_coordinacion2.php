<?php
	include '../librerias/conexion.php';
	include '../librerias/quitar.php';
	
	$idCo = mysql_real_escape_string(quitar($_REQUEST['idCo']));
	$nomCo = mysql_real_escape_string(quitar($_REQUEST['nomCo']));
	$nomCo = utf8_decode($nomCo);
	$activo = mysql_real_escape_string(quitar($_REQUEST['activo']));
	$idu = mysql_real_escape_string(quitar($_COOKIE['IDusuario']));
	
	 $band = 0;
	 
	include '../librerias/libreriaauto.php';

	if($nomCo !="")
	{
		if(autocoo($nomCo)==1)
		{
			$nomCo = utf8_encode($nomCo);
			echo"<script>alert('Nombre no valido: $nomCo')</script>";
			$band = 1;
		}
	}
	else
	{
		$band = 1;
		echo"<script>alert(' Llenar toda la información antes de continuar')</script>";
	}
	
	if($band==0)
	{
		$consulta = "SELECT * FROM coordinaciones WHERE coordinacion='$nomCo' and IDcoordinacion!='$idCo'";
		$ejecutar = mysql_query($consulta) or die (mysql_error());
		$filas = mysql_num_rows($ejecutar);
			if($filas !=0)
			{
				$band = 1;
				echo"<script>alert('La coordinación ya se encuentra registrada')</script>";
			}
	}
	
	if($band==0)
	{
		$nomCo = mb_strtoupper($nomCo);
		
		$consulta2 = "CALL modificarcoordinacion ($idCo,'$nomCo','$activo',$idu)";
		$ejecutar = mysql_query($consulta2) or die (mysql_error());
		
		$nomCo=utf8_encode($nomCo);		
		echo"<script>alert('Registro modificado correctamente')</script>";
	}
	
?>