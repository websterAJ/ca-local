<?php  

function get_data($table)
{
	global $con;
	$sql ="SELECT * FROM  `$table`";
	$respuesta = mysqli_query($con, $sql);
	$data = array();
	while ($fila = $respuesta->fetch_row())
	    $data[] = $fila;
	return $data;
}
function get_data_ajax($table)
{
	global $con;
	$sql ="SELECT * FROM  `$table`";
	$respuesta = mysqli_query($con, $sql);
	$data = array();
	while ($fila = $respuesta->fetch_assoc())
	    $data[] = $fila;
	return $data;
}

function get_data_id($table,$where)
{
	global $con;
	$sql ="SELECT * FROM $table WHERE $where";
	$respuesta = mysqli_query($con, $sql);
	$data = array();
	$respuesta =$respuesta->fetch_assoc();
	if ($respuesta!=NULL) {
		foreach ($respuesta->fetch_assoc() as $key => $value) {
			$data[$key] = $value;
		}
	}else{
		$data="";
	}
	
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
function insert_data($table,$data)
    {
       	global $con;
       	$columnas=null;
      	$datos=null;
		foreach ($data as $key => $value) {
	        $columnas.=$key.",";
	        $datos.="'".$value."',";
  		}
    	$columnas = substr($columnas, 0, -1);
  		$datos = substr($datos, 0, -1);
		$sql = "INSERT INTO $table ($columnas) VALUES ($datos)";
       	$consulta=mysqli_query($con,$sql);
       	if($consulta){
          return true;
       	}else{
          return false;
       	}
    }
function delete($table,$data)
{
	global $con;
	$columnas=null;
    $datos=null;
	foreach ($data as $key => $value) {
        $columnas=$key;
        $datos.="'".$value."'";
	}
	$sql="DELETE FROM `$table` WHERE `$table`.`$columnas` = $datos";
	$respuesta = mysqli_query($con, $sql);
	if ($respuesta) {
		return true;
	}else{
		return false;
	}
}
function update($table,$data,$where)
{
	global $con;
	$valores=null;
	foreach ($data as $key => $value) {
	    $valores .="`$key`='".$value."',";
    }      	
	$valores = substr($valores,0,strlen($valores)-1);
	$sql = "UPDATE `$table` SET $valores WHERE $where;";    
	$respuesta = mysqli_query($con, $sql);
	if ($respuesta) {
		return true;
	}else{
		return false;
	}
}
function delete_user($id)
{
	global $con;
	$sql ="SELECT * FROM usuarios WHERE id_user='$id'";
	$respuesta = mysqli_query($con, $sql);
	$fila = $respuesta->fetch_row();
	if (isset($fila)) {
		$sql="DELETE FROM `usuarios` WHERE `usuarios`.`id_user` = $id";
		$respuesta = mysqli_query($con, $sql);
		if ($respuesta) {
			$sql="DELETE FROM `data_user` WHERE `data_user`.`id_data_user` = $fila[5]";
			$respuesta = mysqli_query($con, $sql);
			if ($respuesta) {
				return true;
			}else{
				return false;
			}
		}
	}
}
?>