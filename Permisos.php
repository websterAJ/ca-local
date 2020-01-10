<?php
include 'header.php';
include 'script/funciones_admin.php';
conexion();
?>
	<h2 class="page-header">Lista de visitas</h2>
		<section class="table-responsive">
			<?php 

				$data=get_data_campo("`visitas`.`id_visitas`,`visitantes`.`nombre` as 'visitante', `personal`.`nombre`, `personal`.`apellido`, `destino`.`destino`,`visitas`.`valides`",'`visitas`, `visitantes`, `destino`, `personal`','`visitas`.`id_visitante`=`visitantes`.`id_visitante` AND `visitas`.`id_per`=`personal`.`id_per` AND `visitas`.`id_destino`=`destino`.`id_destino`');
				if (isset($data)):?>
					<table class="table table-striped" width="100%" cellspacing="0">
						<thead>
							<tr>
								<th><strong>#</strong></th>
								<th class="text-center">VISITANTE</th>
								<th class="text-center">ANFRITIÓN</th>
								<th class="text-center">DESTINO</th>
								<th class="text-center">VALIDES</th>
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
									<td class="text-center"><?= $value[2]." ".$value[3] ?></td>
									<td class="text-center"><?= $value[4] ?></</td>
									<td class="text-center"><?= $value[5] ?></</td>
									<td class="text-center">
										<form action="<?= _BASE_URL_?>ver_permiso.php" method="POST">
											<input type="text" hidden name="id" id="id" value="<?= $value[0] ?>">
											<button class="btn btn-primary" name="edit_btn" id="edit_btn" value="<?= $value[0] ?>">
												<i data-feather="eye"></i>
											</button>
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