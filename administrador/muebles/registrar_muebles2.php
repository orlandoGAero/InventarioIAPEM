<?php
	include '../../librerias/conexion.php';
	include '../../librerias/quitar.php';
	
	$idM = mysql_real_escape_string(quitar($_REQUEST['idM']));
	$nomM = mysql_real_escape_string(quitar($_REQUEST['nomM']));
	$nomM = utf8_decode($nomM);
	$activo = mysql_real_escape_string(quitar($_REQUEST['activo']));
	$idu = mysql_real_escape_string(quitar($_COOKIE['IDusuario']));
	
	$band = 0;
	
	include '../../librerias/libreriaauto.php';
	
	if($nomM !="")
	{
		if(automueble($nomM)==1)
		{
			$nomM = utf8_encode($nomM);
			echo"<script>alert('Nombre no valido: $nomM')</script>";
			$band = 1;
		}
	}
	else
	{
		$band = 1;
		echo"<script>alert('Llenar toda la información antes de continuar')</script>";
	}
	
	if($band==0)
	{
		$consulta = "SELECT * FROM muebles WHERE nombre='$nomM' AND IDmueble!='$idM'";
		$ejecutar = mysql_query($consulta) or die (mysql_error());
		$filas = mysql_num_rows($ejecutar);
			if($filas !=0)
			{
				$band = 1;
				echo"<script>alert('El artículo $nomM ya se encuentra registrado')</script>";
			}
	}

	if($band==0)
	{
		$nomM = mb_strtoupper($nomM);
		
		$consulta2 = "INSERT INTO muebles (Idmueble,nombre,activo,IDusuario,fecha_mod)
					  VALUES($idM,'$nomM','$activo',$idu,NOW())";
		$ejecutar =mysql_query($consulta2) or die (mysql_error());
		
		$nomM = utf8_encode($nomM);
		echo"<script>alert('Registro guardado correctamente')</script>";
		echo"<meta http-Equiv='Refresh' Content=2>";
	}
?>