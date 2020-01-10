<?php 
include 'conexion.php';
include 'funciones_admin.php';
if (conexion()) :
	if (isset($_POST)) :
		$data = $_POST;
		$vacio = false;
		
		$array_data_vist['id_categoria']=filter_var($_POST["categorias_vist"],FILTER_SANITIZE_STRING);
	  	$array_data_vist['cedula']=filter_var($_POST["ci"],FILTER_SANITIZE_STRING);
	  	$array_data['id_visitante']=filter_var($_POST["id_visitante"],FILTER_SANITIZE_STRING);
	  	$array_data_vist['nombre']=filter_var($_POST["nombre"],FILTER_SANITIZE_STRING);
	  	$array_data_vist['origen']=filter_var($_POST["origen"],FILTER_SANITIZE_STRING);

	  		if (empty($array_data_vist['cedula']) && empty($array_data_vist['nombre']) && empty($array_data_vist['origen'])) :
?>
			<script type="text/javascript">
				alert("datos del visitantes no puede estar vacios")
				location.href = "../Registro.php";
			</script>
<?php
	  		else:
	  			if (empty($array_data["id_visitante"])):
		  			insert_data('visitantes',$array_data_vist);
					$last_insert=mysqli_query($con,'SELECT LAST_INSERT_ID()');
					$id_data_vis=$last_insert->fetch_row();
					$array_data["id_visitante"]=$id_data_vis[0];
				endif;
			endif;
	  		  	$array_data['id_per']=filter_var($_POST["id_per"],FILTER_SANITIZE_STRING);
			  	$array_data['id_destino']=filter_var($_POST["destino"],FILTER_SANITIZE_STRING);
			  	$array_data['pro_visita']=filter_var($_POST["pro_visita"],FILTER_SANITIZE_STRING);
				$array_data['valides']=filter_var($_POST["validades"],FILTER_SANITIZE_STRING);
				foreach ($array_data as $key=> $value) {
					if($value ==NULL || $value ==""){
						$vacio=false;
					}
				}
				if ($vacio) :
?>
					<script type="text/javascript">
						alert("Debe llenar todos los campos del formulario")
						location.href = "../Registro.php";
					</script>
<?php
				else:

					$visitas=get_data_id('visitas',"id_visitante=".$array_data['id_visitante']);
					
					if (!empty($visitas)) {
						if ($visitas['valides']==$array_data['valides'] || $visitas['valides']==date('Y-m-d')) {
?>
							<script type="text/javascript">
								alert("El visitante ya posee un registro el dia de hoy")
								location.href = "../Registro.php";
							</script>
<?php
						}
					}else{
						$sql =insert_data('visitas',$array_data);
						if($sql):
?>
							<script type="text/javascript">
								alert("Datos ingresados con exito")
								location.href = "../Registro.php";
							</script>
<?php
						endif;
					}
				endif;
	endif;
endif;
?>