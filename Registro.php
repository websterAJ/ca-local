<?php
include 'header.php';
include 'script/funciones_admin.php';
conexion();
?>
	<section class="panel">
		<article class="panel-heading">
			<h1 class="page-header">Formulario de registro de Visitante</h1>
		</article>
		<form action="script/registro_visita.php" method="POST">
			<article class="panel-body row text-center">
				<h3 class="sub-header">Informacion del Visitante</h3>
				<article class="col-sm-3 col-md-3 form-group">
					<label for="" class="control-label">Categoria</label>
					<select name="categorias_vist" id="categorias_vist" class="form-control">
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
					<select name="categorias_emp" id="categorias_emp" class="form-control">
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
			<article class="panel-footer text-center ">
	  			<button type="submit" class="btn btn-primary">
	  				<span data-feather="send"></span>
	      		</button>
	      		<button type="reset" class="btn btn-primary">
	      			<span data-feather="refresh-cw"></span>
	      		</button>
			</article>
		</form>
	</section>
	<script type="text/javascript">
		$(function() {
			$("#ci").autocomplete({
				source: "script/ajaxVisitante.php",
				minLength: 2,
				select: function(event, ui) {
					event.preventDefault();
					$("#ci").val(ui.item.cedula);
					$("#nombre").val(ui.item.nombre);
					$("#origen").val(ui.item.origen);
					$("#id_visitante").val(ui.item.id_visitante);		
				 }
			});
			$("#ci_emp").autocomplete({
				source: "script/ajaxEmpleado.php",
				minLength: 2,
				select: function(event, ui) {
					event.preventDefault();
					$("#ci_emp").val(ui.item.cedula);
					$("#id_per").val(ui.item.id_per);
					$("#empleado").val(ui.item.nombre);					
				 }
			});
		});
	</script>
<?php include 'footer.php'; ?>
