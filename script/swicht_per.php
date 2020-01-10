<?php 
include 'conexion.php';
include 'funciones_admin.php';
conexion();
if (isset($_POST)) {
	if (isset($_POST['trash_btn'])) {
		$activador = 'trash_btn';
	}elseif (isset($_POST['edit_btn'])) {
		$activador = 'edit_btn';
	}
	$array_data['id_per']=$_POST['id'];
	switch ($activador) {
		case 'trash_btn':
			if (delete('personal',$array_data)) :
?>
				<script type="text/javascript">
					alert("Empleado eliminado con exito")
					location.href = "../Personal.php";
				</script>
<?php
			endif;
			break;
		case 'edit_btn':
			header('location:../editar.php?tb=personal&id='.$_POST['id']);
			break;
	}
}

?>