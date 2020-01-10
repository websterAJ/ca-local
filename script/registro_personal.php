<?php 
include 'conexion.php';
include 'funciones_admin.php';
if (conexion()) :
	if (isset($_POST)) :
		$data = $_POST;
		$array_data["nombre"]=filter_var($data["nombre"],FILTER_SANITIZE_STRING);
		$array_data["apellido"]=filter_var($data["apellido"],FILTER_SANITIZE_STRING);
		$array_data["correo"]=filter_var($data["correo"],FILTER_SANITIZE_STRING);
		$array_data["telefono"]=filter_var($data["telefono"],FILTER_SANITIZE_STRING);
		$array_data["id_tip_per"]=filter_var($data["id_tip_per"],FILTER_SANITIZE_STRING);
		$array_data["id_dep"]=filter_var($data["id_dep"],FILTER_SANITIZE_STRING);
		if(empty($array_data["nombre"])&&empty($array_data["apellido"])&&empty($array_data["correo"])&&empty($array_data["telefono"])&&empty($array_data["id_tip_per"])&&empty($array_data["id_dep"])):
?>
			<script type="text/javascript">
				alert("Hay campos vacios por favor verificar")
				location.href = "../Personal.php";
			</script>
<?php
		else:

			if(insert_data('personal',$array_data)):
?>
				<script type="text/javascript">
					alert("Datos ingresados con exito")
					location.href = "../Personal.php";
				</script>
<?php
			endif;
		endif;
	endif;
endif;
?>