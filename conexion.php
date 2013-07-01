<?php
	//Funcion para conectarse a la base de datos
	function conectarse(){	
	if(!($conexion=mysql_connect('localhost', 'root', '')))//servidor, usuario y contraseña
	{
		echo "Error conectando a la base de datos.";
		exit();
	}
	if(!mysql_select_db('ficha',$conexion))
	{
		echo "Error Conexion con la Base de Datos.";
		exit();
	}
	//Retorna el valor de la conexion.
	return $conexion;
}
?>
