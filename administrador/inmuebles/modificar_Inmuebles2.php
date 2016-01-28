<?php
	include '../../librerias/conexion.php';
	include '../../librerias/quitar.php';

	$idInm = mysql_real_escape_string(quitar($_REQUEST['idInm']));
	$nomInm = mysql_real_escape_string(quitar($_REQUEST['nomInm']));
	$nomInm = utf8_decode($nomInm);
	$calle = mysql_real_escape_string(quitar($_REQUEST['calle']));
	$calle = utf8_decode($calle);
	$numero = mysql_real_escape_string(quitar($_REQUEST['numer']));
	$colonia = mysql_real_escape_string(quitar($_REQUEST['col']));
	$colonia = utf8_decode($colonia);
	$cp = mysql_real_escape_string(quitar($_REQUEST['cp']));
	$ciudad = mysql_real_escape_string(quitar($_REQUEST['ciudad']));
	$ciudad = utf8_decode($ciudad);
	$telefono = mysql_real_escape_string(quitar($_REQUEST['tel']));
	$idR = mysql_real_escape_string(quitar($_REQUEST['idR']));
	$idE = mysql_real_escape_string(quitar($_REQUEST['idE']));
	$fechaIn = mysql_real_escape_string(quitar($_REQUEST['fecha']));
	$activo = mysql_real_escape_string(quitar($_REQUEST['activo']));
	$idu = mysql_real_escape_string(quitar($_COOKIE['IDusuario']));
							
	$band = 0;

	include '../../librerias/libreriaauto.php';
		
		if($nomInm !="" && $calle !="" && $colonia !="" && $cp !="" && $ciudad !="" && $fechaIn !="")
		{
			if(autonomInm($nomInm)==1)
			{
				$nomInm = utf8_encode($nomInm);
				echo"<script>alert('Nombre no valido: $nomInm')</script>";
				$band = 1;
			}
			
			if(autocalle($calle)==1)
			{
				$calle = utf8_encode($calle);
				echo"<center>
						<table border='0'>
							<tr>
								<td>
									<img src='../../imagenes/tache.png' vspace=10/>
								</td>
								<td>
									<font size='4' face='Candara Italic' text color='#f40b0b'>Calle no valida: <b>$calle</b></font>
								</td>
							</tr>
						</table>
					</center>";									
				$band = 1;
			}
											
			if(autocolonia($colonia)==1)
			{
				$colonia = utf8_encode($colonia);
				echo"<script>alert('Colonia no valida: $colonia')</script>";
				$band = 1;
			}
			
			if(autocp($cp)==1)
			{
				echo"<script>alert('Código Postal no valido: $cp')</script>";							
				$band = 1;
			}
			
			if(autociudad($ciudad)==1)
			{
				$ciudad = utf8_encode($ciudad);
				echo"<script>alert('Ciudad no valida: $ciudad')</script>";
				$band = 1;
			}
		}
		else
		{
			echo"<script>alert('Llenar toda la información antes de continuar')</script>";
			$band =1;
		}
		
		/*Validación de campos no obligatorios*/
		if($numero=="")
		{
			$numero='S/N';
		}
		else
		{
			if(autonum($numero)==1)
			{
				echo"<script>alert('Número no valido: $numero')</script>";									
				$band = 1;
			}
		}
		
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
		
		if($band==0)
		{
			$consulta = "SELECT * FROM bienes_inmuebles WHERE nombre_sede='$nomInm' AND IDinmueble!='$idInm'";
			$ejecutar = mysql_query($consulta) or die (mysql_error());
			$filas = mysql_num_rows($ejecutar);
				if($filas !=0)
				{
					echo"<script>alert('El nombre del inmueble ya se encuentra registrado')</script>";
					$band = 1;
				}
		}
		
		if($band==0)
		{
			$nomInm = mb_strtoupper($nomInm);
			$calle = mb_strtoupper($calle);
			$colonia = mb_strtoupper($colonia);
			$ciudad = mb_strtoupper($ciudad);
			
			$consulta2 = "CALL modificar_inv_inm($idInm,'$nomInm','$calle','$numero','$colonia',$cp,'$ciudad','$telefono',$idR,$idE,'$fechaIn','$activo',$idu)";
			$ejecutar2 = mysql_query($consulta2) or die (mysql_error());
			
			$nomInm = utf8_encode($nomInm);
			$calle = utf8_encode($calle);
			$colonia = utf8_encode($colonia);
			$ciudad = utf8_encode($ciudad);
			
			echo"<script>alert('Registro modificado correctamente')</script>";
		}
?>