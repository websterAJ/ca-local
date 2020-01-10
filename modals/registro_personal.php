	<div id="registro_personal" class="modal fade" role="dialog">
	  	<div class="modal-dialog">
			<div class="modal-content">
		      	<div class="modal-header">
		        	<button type="button" class="close" data-dismiss="modal">&times;</button>
		        	<h4 class="modal-title">Formulario de registro</h4>
		      	</div>
		      	<form action="<?= _BASE_URL_?>script/registro_personal.php" method="POST">
			      	<div class="modal-body">
			      		<div class="row text-center">
			      			<div class="col-sm-6 col-md-6 form-group">
				        		<label for="" class="control-label">Nombre</label>
				        		<input type="text" id="nombre" name="nombre" class="form-control">
				        	</div>
				        	<div class="col-sm-6 col-md-6 form-group">
				        		<label for="" class="control-label">Apellido</label>
				        		<input type="text" id="apellido" name="apellido" class="form-control">
				        	</div>
			      		</div>
			      		<div class="row text-center">
			      			<div class="col-sm-6 col-md-6 form-group">
				        		<label for="" class="control-label">Correo</label>
				        		<input type="text" id="correo" name="correo" class="form-control">
				        	</div>
				        	<div class="col-sm-6 col-md-6 form-group">
				        		<label for="" class="control-label">Telefono</label>
				        		<input type="text" id="telefono" name="telefono" class="form-control">
				        	</div>
			      		</div>
			      		<div class="row text-center">
			      			<div class="col-sm-6 col-md-6 form-group">
				        		<label for="" class="control-label">Tipo de empleado</label>
				        		<select name="id_tip_per" id="id_tip_per" class="form-control">
				        			<option value="">Seleccione una opcion</option>
				        			<?php $tipo_per = get_data('tipo_personal'); ?>
				        			<?php foreach ($tipo_per as $key => $per) :?>
				        				<option value="<?= $per[0]?>"><?= $per[1]?></option>
				        			<?php endforeach; ?>
				        		</select>
				        	</div>
				        	<div class="col-sm-6 col-md-6 form-group">
				        		<label for="" class="control-label">Departamento</label>
				        		<select name="id_dep" id="id_dep" class="form-control">
				        			<option value="">Seleccione una opcion</option>
				        			<?php $dep = get_data('departamento'); ?>
				        			<?php foreach ($dep as $key => $value_dep) :?>
				        				<option value="<?= $value_dep[0]?>"><?= $value_dep[1]?></option>
				        			<?php endforeach; ?>
				        		</select>
				        	</div>
			      		</div>
			      	</div>
			      	<div class="modal-footer">
			      		<div class="text-center ">
			      			<button type="submit" class="btn btn-primary">
			      				<span data-feather="send"></span>
				      		</button>
				      		<button type="reset" class="btn btn-primary">
				      			<span data-feather="refresh-cw"></span>
				      		</button>
			      		</div>
			        	<button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
			      	</div>
		      	</form>
	    	</div>
	  	</div>
	</div>