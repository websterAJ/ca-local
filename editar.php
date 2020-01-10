<?php 
include 'header.php';
include 'script/funciones_admin.php';
conexion(); 
?>
       
   <section class="panel">
		<article class="panel-heading">
			<h1 class="page-header">Formulario de edicion <?php echo $_GET['tb'] ?></h1>
		</article>
		<form action="script/editar.php" method="POST">
			<article class="panel-body row text-center">
				<input id="td" name="td" type="text" value="<?php echo $_GET['tb']?>" hidden>
				<?php 
				switch ($_GET['tb']) {
					case 'usuarios':
						$where="id_user=".$_GET['id'];
						break;
					case 'categorias':
						$where="id_categoria=".$_GET['id'];
						break;
					case 'destino':
						$where="id_destino=".$_GET['id'];
						break;
					case 'departamento':
						$where="id_dep=".$_GET['id'];
						break;
					case 'personal':
						$where="id_per=".$_GET['id'];
						break;
				}
					$consulta=get_data_id($_GET['tb'],$where);
					foreach ($consulta as $key => $value) :
				?>
					<?php if ($key=="name_user") : ?>
						<article class="col-sm-4 col-md-4 form-group">
							<label for="">Nombre de usuario</label>
							<input id="<?php echo $key?>" name="<?php echo $key?>" type="text" class="form-control" value="<?php echo $value?>">
						</article>
					<?php elseif($key=="id_user" || $key=="id_categoria" || $key=="id_destino" || $key=="id_dep" || $key=="id_per"): ?>
						<input id="<?php echo $key?>" name="<?php echo $key?>" type="text" value="<?php echo $value?>" hidden>	
					<?php elseif($key=="id_data_user"): ?>
						<?php 
							$data_user =get_data_id('data_user',"id_data_user=".$value);
							foreach ($data_user as $llave => $data) :
						?>
							<?php if ($llave=="id_data_user"):?>
								<input id="<?php echo $key?>" name="<?php echo $key?>" type="text" value="<?php echo $data?>" hidden>
							<?php elseif ($llave=="direccion"):?>
								<article class="col-sm-8 col-md-8 form-group">
									<label for=""><?php echo $llave; ?></label>
									<textarea name="llave" id="llave" class="form-control" value=""><?php echo $data?></textarea>
								</article>
							<?php else: ?>
								<article class="col-sm-4 col-md-4 form-group">
									<label for=""><?php echo $llave; ?></label>
									<input id="<?php echo $llave?>" name="<?php echo $llave?>" type="text" class="form-control" value="<?php echo $data?>">
								</article>
							<?php endif; ?>
							
	        			<?php endforeach; ?>
					<?php elseif($key=="id_tipo_user"): ?>
						<article class="col-sm-4 col-md-4 form-group">
							<label for="">Tipo de usuario</label>
							<select name="<?php echo $key?>" id="<?php echo $key?>" class="form-control">
								<?php $tipo_user = get_data('tipo_user'); ?>
			        			<?php foreach ($tipo_user as $key => $tipo) :?>
			        				<?php if($tipo[0]==$value):  ?>
			        					<option value="<?= $tipo[0]?>" selected><?= $tipo[1]?></option>
			        				<?php else: ?>
			        					<option value="<?= $tipo[0]?>"><?= $tipo[1]?></option>
			        				<?php endif; ?>
			        			<?php endforeach; ?>
							</select>
						</article>
					<?php elseif($key=="statud_user" ||$key=="statud" || $key=="statud_destino"): ?>
						<article class="col-sm-4 col-md-4 form-group">
							<label for="">Statud</label>
							<select name="<?php echo $key?>" id="<?php echo $key?>" class="form-control">
								<?php if ($value==1): ?>
									<option value="1" selected>Activo</option>
									<option value="2">Inactivo</option>
								<?php else: ?>
									<option value="2" selected>Inactivo</option>
									<option value="1">Activo</option>
								<?php endif; ?>
							</select>
						</article>
					<?php elseif($key=="forgot_pass"): ?>
						<article class="col-sm-4 col-md-4 form-group">
							<label for="">Confirmacion de contraseña</label>
							<input id="<?php echo $key?>" name="<?php echo $key?>" type="password" class="form-control">
						</article>
					<?php elseif($key=="pass_user"): 
						$pass= str_replace($value,"********",$value);
						?>
						<article class="col-sm-4 col-md-4 form-group">
							<label for="">Contraseña</label>
							<input id="<?php echo $key?>" name="<?php echo $key?>" type="password" class="form-control" value="<?php echo $pass?>">
						</article>
					<?php else: ?>
						<article class="col-sm-4 col-md-4 form-group">
							<label for=""><?php echo $key?></label>
							<input id="<?php echo $key?>" name="<?php echo $key?>" type="text" class="form-control" value="<?php echo $value?>">
						</article>
					<?php endif; ?>
				<?php endforeach; ?>
				
			</article>
			<article class="panel-footer text-center">
				<button type="submit" class="btn btn-primary">
	  				<span data-feather="send"></span>
	      		</button>
	      		<button type="reset" class="btn btn-primary">
	      			<span data-feather="refresh-cw"></span>
	      		</button>
			</article>
		</form>
	</section>     
<?php include 'footer.php'; ?>
