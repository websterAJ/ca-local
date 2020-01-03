<?php  

function get_data($table)
{
	global $con;
	$sql ="SELECT * FROM  $table LIMIT 10 ";
	$respuesta = mysqli_query($con, $sql);
	$data = array();
	while ($fila = $respuesta->fetch_row())
	    $data[] = $fila;
	return $data;
}

function get_data_id($table,$where)
{
	global $con;
	$sql ="SELECT FROM $table WHERE $where";
	$respuesta = mysqli_query($con, $sql);
	$respuestas_array = array();
	while ($fila = $respuesta->fetch_row())
	    $data[] = $fila;
	return $data;
}

function get_data_campo($campo,$table,$where)
{
	global $con;
	$sql ="SELECT $campo FROM $table WHERE $where";
	$respuesta = mysqli_query($con, $sql);
	$data = array();
	while ($fila = $respuesta->fetch_row())
	    $data[] = $fila;
	return $data;
}
function insert_data($table,$campos,$valor)
    {
       global $con;
       $sql="INSERT INTO $table (`id_obj`,`descripcion`,`fecha_ini`,`fecha_fin`,`monto`,`statud`)VALUES(NULL,'".$descripcion."','".$monto."','".date('d/m/Y')."','".$fecha_final."','1')";
       $consulta=mysqli_query($con,$sql);
       if($consulta){
          return true;
       }else{
          return false;
       }
    }
?>