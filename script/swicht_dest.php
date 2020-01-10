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
	$array_data['id_destino']=$_POST['id_destino'];
	switch ($activador) {
		case 'trash_btn':
			if (delete('destino',$array_data)) :
?>
				<script type="text/javascript">
					alert("Destino eliminado con exito")
					location.href = "../Destinos.php";
				</script>
<?php
			endif;
			break;
		case 'edit_btn':
			header('location:../editar.php?tb=destino&id='.$_POST['id_destino']);
			break;
	}
}

?>