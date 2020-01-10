<?php
include 'header.php';
include 'script/funciones_admin.php';
conexion();
?>
	<h2 class="page-header">Lista de categorias</h2>
	<section class="btn-group">
		<button type="button" data-toggle="modal" data-target="#registro_categoria" class="btn btn-primary">
			<span data-feather="plus"></span>
			Nuevo categoria
		</button>
	</section>
	<!-- Modal -->
	<?php include 'modals/registro_categoria.php'; ?>
		<section class="table-responsive">
			<?php 
				$data=get_data('categorias');
				if (isset($data)):?>
					<table class="table table-striped" width="100%" cellspacing="0">
						<thead>
							<tr>
								<th><strong>#</strong></th>
								<th class="text-center">CATEGORIAS</th>
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
									<td class="text-center"><?= $value[1] ?></</td>
									<td class="text-center">
										<form action="<?= _BASE_URL_?>script/swicht_cat.php" method="POST">
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