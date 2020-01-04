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
			if (delete_user($_POST['id_user'])) :
?>
				<script type="text/javascript">
					alert("Usuario eliminado con exito")
					location.href = "../user.php";
				</script>
<?php
			endif;
			break;
		case 'edit_btn':
			echo $_POST['id_user'];
			break;
	}
}

?>