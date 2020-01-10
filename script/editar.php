<?php 
include 'conexion.php';
include 'funciones_admin.php';
if (conexion()) :
	if (isset($_POST)) :
		$data = $_POST;
		$validar = NULL;
		$msj= NULL;
		$where= NULL;
		switch ($data['td']) {
			case 'usuarios':
				$where="id_user=".$data['id_user'];
				$array_data["name_user"]=filter_var($data["name_user"],FILTER_SANITIZE_STRING);
			  	$array_data["pass_user"]=password_hash(filter_var($data["pass_user"],FILTER_SANITIZE_STRING), PASSWORD_DEFAULT);
			  	$array_data["forgot_pass"]=filter_var($data["forgot_pass"],FILTER_SANITIZE_STRING);
			  	$array_data["statud_user"]=filter_var($data["statud_user"],FILTER_SANITIZE_STRING);

			  	$array_data_user["nombre"]=filter_var($data["nombre"],FILTER_SANITIZE_STRING);
			  	$array_data_user["apellido"]=filter_var($data["apellido"],FILTER_SANITIZE_STRING);
			  	$array_data_user["correo"]=filter_var($data["correo"],FILTER_SANITIZE_STRING);
			  	$array_data_user["telefono"]=filter_var($data["telefono"],FILTER_SANITIZE_STRING);
			  	$array_data_user["sexo"]=filter_var($data["sexo"],FILTER_SANITIZE_STRING);
			  	$array_data_user["llave"]=filter_var($data["llave"],FILTER_SANITIZE_STRING);
			  	$array_data_user["id_tipo_user"]=filter_var($data["id_tipo_user"],FILTER_SANITIZE_STRING);
			  	$where2="id_data_user=".$data["id_data_user"];
			  	$url="../user.php";
			  	if ($data["pass_user"] == $data["forgot_pass"]) {
			  		if(update($data['td'],$array_data,$where)):
				  		if(update('data_user',$array_data_user,$where2)):
				  			$validar = NULL;
				  		endif;
			  		endif;
					
				}else{
					$msj="Los campos contraseñas no concuerdan";
					$validar=true;
				}
			  	
				break;
			case 'categorias':
				$where="id_categoria=".$data['id_categoria'];
				$array_data["categoria"]=filter_var($data["Categoria"],FILTER_SANITIZE_STRING);
				$array_data["statud"]=filter_var($data["statud"],FILTER_SANITIZE_STRING);
				if (empty($array_data["categoria"]) || empty($array_data["statud"])) {
					$msj="Los campos categoria, statud no puede estar vacios";
					$validar=true;
				}
				$url="../Categorias.php";
				if(update($data['td'],$array_data,$where)):
			  		$validar = NULL;
			  	endif;
				break;
			case 'destino':
				$where="id_destino=".$data['id_destino'];
				$array_data["destino"]=filter_var($data["destino"],FILTER_SANITIZE_STRING);
				$array_data["statud"]=filter_var($data["statud"],FILTER_SANITIZE_STRING);
				if (empty($array_data["destino"]) || empty($array_data["statud"])) {
					$msj="Los campos destino, statud no puede estar vacios";
					$validar=true;
				}
				$url="../Destinos.php";
				if(update($data['td'],$array_data,$where)):
			  		$validar = NULL;
			  	endif;
				break;
			case 'departamento':
				$where="id_dep=".$data['id_dep'];
				$array_data["departamento"]=filter_var($data["destino"],FILTER_SANITIZE_STRING);
				$array_data["statud"]=filter_var($data["statud"],FILTER_SANITIZE_STRING);
				if (empty($array_data["departamento"]) || empty($array_data["statud"])) {
					$msj="Los campos departamento, statud no puede estar vacios";
					$validar=true;
				}
				$url="../Departamento.php";
				if(update($data['td'],$array_data,$where)):
			  		$validar = NULL;
			  	endif;
				break;
			case 'personal':
				$where="id_per=".$data['id_per'];
				$url="../Personal.php";
				$array_data["nombre"]=filter_var($data["nombre"],FILTER_SANITIZE_STRING);
				$array_data["apellido"]=filter_var($data["apellido"],FILTER_SANITIZE_STRING);
				$array_data["correo"]=filter_var($data["correo"],FILTER_SANITIZE_STRING);
				$array_data["telefono"]=filter_var($data["telefono"],FILTER_SANITIZE_STRING);
				$array_data["id_tip_per"]=filter_var($data["id_tip_per"],FILTER_SANITIZE_STRING);
				$array_data["id_dep"]=filter_var($data["id_dep"],FILTER_SANITIZE_STRING);
				if(update($data['td'],$array_data,$where)):
			  		$validar = NULL;
			  	endif;
				break;
		}
		if ($validar!=NULL):
?>
			<script type="text/javascript">
				var msg = '<?php echo $msj ?>';
				var url = '<?php echo $url ?>';
				alert(msg)
				location.href = url;
			</script>
<?php		
		else:
?>
			<script type="text/javascript">
				var url = '<?php echo $url ?>';
				alert("Datos ingresados con exito")
				location.href = url;
			</script>
<?php
		endif;
	endif;
endif;
?>