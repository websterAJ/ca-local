<?php 
include 'conexion.php';
include 'funciones_admin.php';
if (conexion()) :
	if (isset($_POST)) :
		$data = $_POST;
		$array_data["destino"]=filter_var($data["destino"],FILTER_SANITIZE_STRING);
		$array_data["statud_destino"]=filter_var($data["statud"],FILTER_SANITIZE_STRING);
		if (empty($array_data["destino"])):
?>
			<script type="text/javascript">
				alert("Debe ingresar un nombre de destino")
				location.href = "../Destinos.php";
			</script>
<?php		
		elseif (empty($array_data["statud_destino"])) :
?>
			<script type="text/javascript">
				alert("Debe seleccionar un statud")
				location.href = "../Destinos.php";
			</script>
<?php
		else:
			$sql =insert_data('destino',$array_data);
		endif;
		if($sql):
?>
			<script type="text/javascript">
				alert("Datos ingresados con exito")
				location.href = "../Destinos.php";
			</script>
<?php
		endif;
	endif;
endif;
?>