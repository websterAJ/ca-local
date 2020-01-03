<?php 
include 'conexion.php';
include 'funciones.php';
$user=filter_var($_POST['user'],FILTER_SANITIZE_STRING);
$pass=filter_var($_POST['pass'],FILTER_SANITIZE_STRING);
	conexion();
	if (conexion()) {
		if(validarLogin($user,$pass)){
				header('location:../panel.php');
		}else{
?>
		<script>
			alert('Los datos ingresados son incorrectos.')
			location.href = "../index.php";
		</script>
<?php
		}
	}else{
		echo "error al conectarse a la base de dato";
	}
 ?>