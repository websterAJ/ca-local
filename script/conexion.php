<?php 
/**
 * Archivo encargado de realizar las conexion a la base de datos
 */
	require 'config.php';
	$con=null;
	function conexion()
	{
		global $con;
		$con=mysqli_connect(SERVER,USER,PASS,DATABASE);
		if ($con) {
			return $con;
		}else{
			return false;
		}
	}
 ?>