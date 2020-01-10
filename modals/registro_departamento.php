	<div id="registro_departamento" class="modal fade" role="dialog">
	  	<div class="modal-dialog">
			<div class="modal-content">
		      	<div class="modal-header">
		        	<button type="button" class="close" data-dismiss="modal">&times;</button>
		        	<h4 class="modal-title">Formulario de registro</h4>
		      	</div>
		      	<form action="<?= _BASE_URL_?>script/registro_departamento.php" method="POST">
			      	<div class="modal-body">
			      		<div class="row text-center">
			      			<div class="col-sm-6 col-md-6 form-group">
				        		<label for="" class="control-label">Departamento</label>
				        		<input type="text" id="departamento" name="departamento" class="form-control">
				        	</div>
				        	<div class="col-sm-6 col-md-6 form-group">
				        		<label for="" class="control-label">Estado</label>
				        		<select name="statud" id="statud" class="form-control">
				        			<option value="" selected="true">Seleccione una opcion</option>
				        			<option value="1">Activo</option>
				        			<option value="2">Inactivo</option>
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