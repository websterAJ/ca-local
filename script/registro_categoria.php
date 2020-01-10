<?php 
include 'conexion.php';
include 'funciones_admin.php';
if (conexion()) :
	if (isset($_POST)) :
		$data = $_POST;
		$array_data["categoria"]=filter_var($data["Categoria"],FILTER_SANITIZE_STRING);
		$array_data["statud"]=filter_var($data["statud"],FILTER_SANITIZE_STRING);
		if (empty($array_data["categoria"])):
?>
			<script type="text/javascript">
				alert("Debe ingresar un nombre de categoria")
				location.href = "../Categorias.php";
			</script>
<?php		
		elseif (empty($array_data["statud"])) :
?>
			<script type="text/javascript">
				alert("Debe seleccionar un statud")
				location.href = "../Categorias.php";
			</script>
<?php
		else:
			$sql =insert_data('categorias',$array_data);
		endif;
		if($sql):
?>
			<script type="text/javascript">
				alert("Datos ingresados con exito")
				location.href = "../Categorias.php";
			</script>
<?php
		endif;
	endif;
endif;
?>