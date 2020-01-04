	<div id="registro_user" class="modal fade" role="dialog">
	  	<div class="modal-dialog modal-lg">
			<div class="modal-content">
		      	<div class="modal-header">
		        	<button type="button" class="close" data-dismiss="modal">&times;</button>
		        	<h4 class="modal-title">Formulario de registro de usuarios</h4>
		      	</div>
		      	<form action="<?= _BASE_URL_?>script/registro_user.php" method="POST">
			      	<div class="modal-body">
			      		<div class="row text-center">
			      			<div class="col-sm-3 col-md-3 form-group">
				        		<label for="" class="control-label">Nombre</label>
				        		<input type="text" id="Nombre" name="Nombre" class="form-control">
				        	</div>
				        	<div class="col-sm-3 col-md-3 form-group">
				        		<label for="" class="control-label">Apellido</label>
				        		<input type="text" id="Apellido" name="Apellido" class="form-control">
				        	</div>
				        	<div class="col-sm-3 col-md-3 form-group">
				        		<label for="" class="control-label">Correo</label>
				        		<input type="email" id="Correo" name="Correo" class="form-control">
				        	</div>
				        	<div class="col-sm-3 col-md-3 form-group">
				        		<label for="" class="control-label">Telefono</label>
				        		<input type="tlf" id="Telefono" name="Telefono" class="form-control">
				        	</div>
			      		</div>
			      		<div class="row text-center">
			      			<div class="col-sm-3 col-md-3 form-group">
				        		<label for="" class="control-label">Sexo</label>
				        		<select name="Sexo" id="Sexo" class="form-control">
				        			<option value="null" selected="true">Seleccione una opcion</option>
				        			<option value="1">Masculino</option>
				        			<option value="2">Femenino</option>
				        		</select>
				        	</div>
				        	<div class="col-sm-3 col-md-3 form-group">
				        		<label for="" class="control-label">Usuario</label>
				        		<input type="text" id="Usuario" name="Usuario" class="form-control">
				        	</div>
				        	<div class="col-sm-3 col-md-3 form-group">
				        		<label for="" class="control-label">Contraseña</label>
				        		<input type="password" id="pass_1" name="pass_1" class="form-control">
				        	</div>
				        	<div class="col-sm-3 col-md-3 form-group">
				        		<label for="" class="control-label">Confirmacion Contraseña</label>
				        		<input type="password" id="pass_2" name="pass_2" class="form-control">
				        	</div>
			      		</div>
			      		<div class="row text-center">
			      			<div class="col-sm-3 col-md-3 form-group" >
				        		<label for="" class="control-label">Tipo de usuario</label>
				        		<select name="tipo_user" id="tipo_user" class="form-control">
				        			<option value="null" selected="true">Seleccione una opcion</option>
				        			<?php $tipo_user = get_data('tipo_user'); ?>
				        			<?php foreach ($tipo_user as $key => $tipo) :?>
				        				<option value="<?= $tipo[0]?>"><?= $tipo[1]?></option>
				        			<?php endforeach; ?>
				        		</select>
				        	</div>
			      			<div class="col-sm-9 col-md-9 form-group" >
				        		<label for="" class="control-label">Direccion</label>
				        		<textarea name="Direccion" id="Direccion" cols="10" rows="5" class="form-control"></textarea>
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