<?php 
include 'conexion.php';
include 'funciones_admin.php';
if (conexion()) :
	$return_arr = array();
	if (!empty($_GET['term'])) {
		$fetch = mysqli_query($con,"SELECT * FROM visitantes where cedula like '%" . mysqli_real_escape_string($con,($_GET['term'])) . "%' LIMIT 0 ,50"); 
		while ($row = mysqli_fetch_array($fetch)) {

			$id=$row['id_visitante'];
			$row_array['value'] = $row['nombre']." ".$row['apellido'];
			$row_array['id_visitante']=$id;
			$row_array['nombre']=$row['nombre']." ".$row['apellido'];
			$row_array['origen']=$row['origen'];
			$row_array['cedula']=$row['cedula'];
			array_push($return_arr,$row_array);
	    }
		echo json_encode($return_arr);
	}
endif;

 ?>