<?php
include 'header.php';
include 'script/funciones_admin.php';
conexion();
?>
	<h2 class="page-header">Lista de personal</h2>
	<section class="btn-group">
		<button type="button" data-toggle="modal" data-target="#registro_personal" class="btn btn-primary">
			<span data-feather="plus"></span>
			Nuevo empleado
		</button>
	</section>
	<!-- Modal -->
	<?php include 'modals/registro_personal.php'; ?>
		<section class="table-responsive">
			<?php 
				$data=get_data('personal');
				if (isset($data)):?>
					<table class="table table-striped" width="100%" cellspacing="0">
						<thead>
							<tr>
								<th><strong>#</strong></th>
								<th class="text-center">NOMBRE</th>
								<th class="text-center">CORREO</th>
								<th class="text-center">CARGO</th>
								<th class="text-center">ACCION</th>
							</tr>
						</thead>
						<tbody>
						<?php 
						$i=1;
						foreach ($data as $key => $value):
						?>
								<tr>
									<td><?= $i++ ?></td>
									<td class="text-center"><?= $value[1]." ".$value[2] ?></</td>
									<td class="text-center"><?= $value[3] ?></</td>
									<td class="text-center"><?= $value[6] ?></</td>
									<td class="text-center">
										<form action="<?= _BASE_URL_?>script/swicht_per.php" method="POST">
											<input type="text" hidden name="id" id="id" value="<?= $value[0] ?>">
											<?php if ($value[2]=="administrador") :?>
												<button class="btn btn-primary disabled" name="edit_btn" id="edit_btn">
													<i data-feather="edit"></i>
												</button>
												<button class="btn btn-primary disabled" name="trash_btn" id="trash_btn">
													<i data-feather="trash"></i>
												</button>
											<?php else: ?>
												<button class="btn btn-primary" name="edit_btn" id="edit_btn" value="<?= $value[0] ?>">
													<i data-feather="edit"></i>
												</button>
												<button class="btn btn-primary" name="trash_btn" id="trash_btn" value="<?= $value[0] ?>">
													<i data-feather="trash"></i>
												</button>
											<?php endif; ?>
										</form>
									</td>
								</tr>
						<?php endforeach; ?>
						</tbody>
					</table>
			<?php else: ?>
				<article class="text-center">
					<h1>No hay datos para mostrar</h1>
				</article>
			<?php endif; ?>
		</section>
<?php include 'footer.php'; ?>