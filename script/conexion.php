<?php 
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