<?php 
include 'conexion.php';
include 'funciones_admin.php';
if (conexion()) :
	if (isset($_POST)) :
		$data = $_POST;
		if ($data['pass_1'] != $data['pass_2']) :
?>
			<script type="text/javascript">
				alert("las contraseñas no son cuenciden")
				location.href = "../user.php";
			</script>
<?php
		else:
			$array_data_user["nombre"]=filter_var($data["Nombre"],FILTER_SANITIZE_STRING);
			$array_data_user["apellido"]=filter_var($data["Apellido"],FILTER_SANITIZE_STRING);
			$array_data_user["correo"]=filter_var($data["Correo"],FILTER_SANITIZE_STRING);
			$array_data_user["telefono"]=filter_var($data["Telefono"],FILTER_SANITIZE_STRING);
			$array_data_user["sexo"]=filter_var($data["Sexo"],FILTER_SANITIZE_STRING);
			$array_data_user["direccion"]=filter_var($data["Direccion"],FILTER_SANITIZE_STRING);

			if(insert_data('data_user',$array_data_user)):
				$last_insert=mysqli_query($con,'SELECT LAST_INSERT_ID()');
				$id_data_user=$last_insert->fetch_row();
				$array_user["name_user"]=filter_var($data["Usuario"],FILTER_SANITIZE_STRING);
				$array_user["pass_user"]=password_hash(filter_var($data["pass_1"],FILTER_SANITIZE_STRING), PASSWORD_DEFAULT);
				$array_user["forgot_pass"]=filter_var($data["pass_1"],FILTER_SANITIZE_STRING);
				$array_user["id_tipo_user"]=filter_var($data["tipo_user"],FILTER_SANITIZE_STRING);
			 	$array_user["statud_user"]=1;
			 	$array_user["id_data_user"]=$id_data_user[0];
				if (insert_data('usuarios',$array_user)) :
?>
					<script type="text/javascript">
						alert("Datos ingresados con exito")
						location.href = "../user.php";
					</script>
<?php
				endif;
			endif;
		endif;
	endif;
endif;
?>