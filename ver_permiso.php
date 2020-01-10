<?php
include 'header.php';
include 'script/funciones_admin.php';
conexion();

if (isset($_POST)) :
	$id=$_POST['id'];
	$data=get_data_campo("`visitas`.`id_visitas`,`visitantes`.`nombre` as 'visitante', `personal`.`nombre`, `personal`.`apellido`, `destino`.`destino`,`visitas`.`valides`",'`visitas`, `visitantes`, `destino`, `personal`','`visitas`.`id_visitante`=`visitantes`.`id_visitante` AND `visitas`.`id_per`=`personal`.`id_per` AND `visitas`.`id_destino`=`destino`.`id_destino` AND `visitas`.`id_visitas`='.$id);
?>
	<section class="panel">
		<article class="panel-heading">
			<h1 class="page-header">Detalle de visita</h1>
		</article>
			<article class="panel-body row text-center">
				<h3 class="sub-header">Informacion del Visitante</h3>
				<article class="col-sm-3 col-md-3 form-group">
					<label for="" class="control-label">Categoria</label>
					<select name="categorias" id="categorias" class="form-control">
						<?php $categorias = get_data('categorias'); ?>
						<option value="null">Seleccione una opcion</option>
	        			<?php foreach ($categorias as $key => $cat) :?>
	        				<?php if ($cat[0]==1): ?>
	        					<option value="<?= $cat[0]?>" selected><?= $cat[1]?></option>
	        				<?php elseif($cat[0]<>3 && $cat[0]<>4): ?>
	        					<option value="<?= $cat[0]?>"><?= $cat[1]?></option>
	        				<?php endif ?>
	        			<?php endforeach; ?>
					</select>
				</article>
				<article class="col-sm-3 col-md-3 form-group">
					<label for="" class="control-label">Cedula</label>
					<input type="number" name="ci" id="ci" class="form-control">
					<input type="hidden" name="id_visitante" id="id_visitante">
				</article>
				<article class="col-sm-3 col-md-3 form-group">
					<label for="" class="control-label">Nombre y apellido</label>
					<input type="text" name="nombre" id="nombre" class="form-control">
				</article>
				<article class="col-sm-3 col-md-3 form-group">
					<label for="" class="control-label">Empresa/origen</label>
					<input type="text" name="origen" id="origen" class="form-control">
				</article>
				<h3 class="sub-header">Informacion del Anfritión</h3>
				<article class="col-sm-4 col-md-4 form-group">
					<label for="" class="control-label">Categoria</label>
					<select name="categorias" id="categorias" class="form-control">
						<?php $categorias = get_data('categorias'); ?>
						<option value="null">Seleccione una opcion</option>
	        			<?php foreach ($categorias as $key => $cat) :?>
	        				<?php if ($cat[0]==3): ?>
	        					<option value="<?= $cat[0]?>" selected><?= $cat[1]?></option>
	        				<?php elseif($cat[0]<>1 && $cat[0]<>2): ?>
	        					<option value="<?= $cat[0]?>"><?= $cat[1]?></option>
	        				<?php endif ?>
	        			<?php endforeach; ?>
					</select>
				</article>
				<article class="col-sm-4 col-md-4 form-group">
					<label for="" class="control-label">Cedula</label>
					<input type="number" name="ci_emp" id="ci_emp" class="form-control">
				</article>
				<article class="col-sm-4 col-md-4 form-group">
					<label for="" class="control-label">Visitando a</label>
					<input type="text" name="empleado" id="empleado" class="form-control disabled" readonly>
					<input name="id_per" id="id_per" type='text' hidden="true">
				</article>
				<h3 class="sub-header">Informacion de la visita</h3>
				<article class="col-sm-3 col-md-3 form-group">
					<label for="" class="control-label">Destino</label>
					<select name="destino" id="destino" class="form-control">
						<?php $categorias = get_data('Destino'); ?>
						<option value="null">Seleccione una opcion</option>
	        			<?php foreach ($categorias as $key => $cat) :?>
	        				<option value="<?= $cat[0]?>"><?= $cat[1]?></option>
	        			<?php endforeach; ?>
					</select>
				</article>
				<article class="col-sm-6 col-md-6 form-group">
					<label for="" class="control-label">Proposito de la visita</label>
					<textarea name="pro_visita" id="pro_visita" class="form-control"></textarea>
				</article>
				<article class="col-sm-3 col-md-3 form-group">
					<label for="" class="control-label">Validad hasta</label>
					<?php
					$dia = date('d')-1;
					if ($dia<10) {
						$dia = "0".$dia;
					}
					
					?>
					<input type="date" name="validades" id="validades" class="form-control" min="<?php echo date('Y').'-'.date('m').'-'.$dia?>">
				</article>
			</article>
	</section>
<?php 
endif;
include 'footer.php'; 
?>
