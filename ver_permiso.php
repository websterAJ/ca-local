<?php
include 'header.php';
include 'script/funciones_admin.php';
conexion();

if (isset($_POST)) :
	$id=$_POST['id'];
	$campos="`visitas`.`id_visitas`,`visitantes`.`nombre` as 'visitante',`visitantes`.`cedula` as 'ci_visitante',`visitantes`.`origen`, `personal`.`nombre`, `personal`.`apellido`, `personal`.`cedula`, `destino`.`destino`,`visitas`.`valides`,`visitas`.`pro_visita`, `tipo_personal`.`tipo_empleado`,`categorias`.`categoria`";
	$table='`visitas`, `visitantes`, `destino`, `personal`,`tipo_personal`,`categorias`';
	$where=' `visitas`.`id_visitante`=`visitantes`.`id_visitante` AND `visitas`.`id_per`=`personal`.`id_per` AND `visitas`.`id_destino`=`destino`.`id_destino` AND `personal`.`id_tip_per`=`tipo_personal`.`id_tip_per` AND `visitantes`.`id_categoria`=`categorias`.`id_categoria` AND `visitas`.`id_visitas`='.$id;
	$data=get_data_campo_assoc($campos,$table,$where);
	$data =$data[0];
?>
	<section class="panel">
		<article class="panel-heading">
			<h1 class="page-header">Detalle de visita</h1>
		</article>
			<article class="panel-body row text-center">
				<h3 class="sub-header">Informacion del Visitante</h3>
				<article class="col-sm-3 col-md-3 form-group">
					<label for="" class="control-label">Categoria</label>
					<input name="categorias" id="categorias" class="form-control" value="<?php echo $data['categoria']?>" readonly>
				</article>
				<article class="col-sm-3 col-md-3 form-group">
					<label for="" class="control-label">Cedula</label>
					<input type="number" name="ci" id="ci" class="form-control" value="<?php echo $data['ci_visitante']?>" readonly>
					<input type="hidden" name="id_visitante" id="id_visitante">
				</article>
				<article class="col-sm-3 col-md-3 form-group">
					<label for="" class="control-label">Nombre y apellido</label>
					<input type="text" name="nombre" id="nombre" class="form-control" value="<?php echo $data['visitante']?>" readonly>
				</article>
				<article class="col-sm-3 col-md-3 form-group">
					<label for="" class="control-label">Empresa/origen</label>
					<input type="text" name="origen" id="origen" class="form-control" value="<?php echo $data['origen']?>" readonly>
				</article>
				<h3 class="sub-header">Informacion del Anfritión</h3>
				<article class="col-sm-4 col-md-4 form-group">
					<label for="" class="control-label">Categoria</label>
					<input name="categorias_emp" id="categorias_emp" class="form-control" value="<?php echo $data['tipo_empleado']?>" readonly>
				</article>
				<article class="col-sm-4 col-md-4 form-group">
					<label for="" class="control-label">Cedula</label>
					<input type="number" name="ci_emp" id="ci_emp" class="form-control" readonly value="<?php echo $data['cedula']?>">
				</article>
				<article class="col-sm-4 col-md-4 form-group">
					<label for="" class="control-label">Visitando a</label>
					<input type="text" name="empleado" id="empleado" class="form-control disabled" readonly value="<?php echo $data['nombre'].' '.$data['apellido']?>">
					<input name="id_per" id="id_per" type='text' hidden="true">
				</article>
				<h3 class="sub-header">Informacion de la visita</h3>
				<article class="col-sm-3 col-md-3 form-group">
					<label for="" class="control-label">Destino</label>
					<input type="text" name="destino" id="destino" class="form-control" readonly value="<?php echo $data['destino']?>">
				</article>
				<article class="col-sm-6 col-md-6 form-group">
					<label for="" class="control-label">Proposito de la visita</label>
					<textarea name="pro_visita" id="pro_visita" class="form-control" readonly><?php echo $data['pro_visita']?></textarea>
				</article>
				<article class="col-sm-3 col-md-3 form-group">
					<label for="" class="control-label">Validad hasta</label>
					<?php
					$dia = date('d')-1;
					if ($dia<10) {
						$dia = "0".$dia;
					}
					
					?>
					<input type="date" name="validades" id="validades" class="form-control" min="<?php echo date('Y').'-'.date('m').'-'.$dia?>" value="<?php echo $data['valides']?>" readonly>
				</article>
			</article>
	</section>
<?php 
endif;
include 'footer.php'; 
?>
