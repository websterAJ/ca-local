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
	switch ($activador) {
		case 'trash_btn':
			if (delete('categorias',$_POST['id'])) :
?>
				<script type="text/javascript">
					alert("Categoria eliminado con exito")
					location.href = "../Categorias.php";
				</script>
<?php
			endif;
			break;
		case 'edit_btn':
			header('location:../editar.php?tb=categorias&id='.$_POST['id']);
			break;
	}
}

?>