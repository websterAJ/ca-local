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
			$array_data_user["nombre"]=$data["Nombre"];
			$array_data_user["apellido"]=$data["Apellido"];
			$array_data_user["correo"]=$data["Correo"];
			$array_data_user["telefono"]=$data["Telefono"];
			$array_data_user["sexo"]=$data["Sexo"];
			$array_data_user["direccion"]=$data["Direccion"];

			if(insert_data('data_user',$array_data_user)):
				$last_insert=mysqli_query($con,'SELECT LAST_INSERT_ID()');
				$id_data_user=$last_insert->fetch_row();
				$array_user["name_user"]=$data["Usuario"];
				$array_user["pass_user"]=password_hash($data["pass_1"], PASSWORD_DEFAULT);
				$array_user["forgot_pass"]=$data["pass_1"];
				$array_user["id_tipo_user"]=$data["tipo_user"];
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