<div class="col-md-6" style="font-size: 10px">
	<span class="pull-left border-left-right p-w-sm">Total de <?= $total_rows ?> personas encontradas</span>
</div>
<div class="box-body">
	<div class="table-responsive ">
		<table class="table no-margin table-hover table-striped table-condensed" style="font-size: 11px">
			<thead>
			<tr>

				<th>DNI</th>
				<th>NOMBRES</th>
				<th>PATERNO</th>
				<th>MATERNO</th>
				<th>EDAD</th>
				<th></th>

			</tr>
			</thead>
			<tfoot>
			<tr>

				<th>DNI</th>
				<th>Nombres</th>
				<th>Paterno</th>
				<th>Materno</th>
				<th>Edad</th>
				<th></th>

			</tr>
			</tfoot>
			<tbody>
			<?php

			if (!empty($personas)) : ?>

				<?php foreach ($personas as $persona) : ?>
					<tr>

						<td width="40px"><?= $persona->dni ?></td>
						<td><?= $persona->nombres ?></td>
						<td><?= $persona->ape_pat ?></td>
						<td><?= $persona->ape_mat ?></td>
						<td>
							<?= ($persona->edad) ?>
						</td>


						<td>
							<div class="btn-group">
								<button class="btn btn-outline-primary btn-sm dropdown-toggle" type="button"
										data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
									<span class="fas fa-edit"></span>
								</button>
								<div class="dropdown-menu">
									<a class="dropdown-item"
									   href="<?= base_url() . 'admin/report/constancia/report/1/' . $persona->dni ?>" target="_blank"><span
											class="fas fa-print"></span> Imprimir</a>
									<a class="dropdown-item" href="#"><span class="fas fa-user-edit"></span> Editar</a>
									<a class="dropdown-item" href="#"><span class="fas fa-eye"></span> Ver</a>
									<div class="dropdown-divider"></div>
									<div class="dropdown-info">
										<center><span class="badge badge-secondary"><?= date('Y-m-d h:m.s') ?></span>
											<span class="badge badge-secondary">4</span></center>
									</div>
								</div>
							</div>
						</td>

					</tr>
				<?php endforeach; ?>
			<?php else : ?>
				<tr>
					<td colspan="8" class="no-records">No records</td>
				</tr>
			<?php endif; ?>
			</tbody>
		</table>
	</div>
</div>
<div class="box-footer">
	<div class="row">
		<div class="col-md-8">
			<ul class="pagination" style="margin-top: 6px; font-size: 12px;">
				<?php echo $pagelinks_ ?>
			</ul>
		</div>

	</div>

</div>
