<?php
$conexion = mysql_connect("localhost", "root", "") or die ("Error de hosting");
mysql_select_db("inventario_iapem", $conexion) or die ("Error de base");
?>