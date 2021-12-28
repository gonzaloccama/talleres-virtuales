<?php
$this->load->view('admin/header');
?>


<?php
$this->load->view('admin/navbar');
?>




<!-- DataTales Example -->
<div class="card shadow mb-4">
	<div class="card-header py-3">
		<h6 class="m-0 font-weight-bold text-primary"><?= $subtitle ?></h6>
	</div>
	<div class="card-body">

		<div class="d-sm-flex align-items-center justify-content-between mb-4">
			<a href="<?= base_url() ?>admin/estudiante/add" class="d-none d-sm-inline-block btn btn-sm btn-primary shadow-sm"><i
					class="fas fa-plus-circle fa-sm text-white-50"></i> Nuevo</a>
			<a href="#" class="d-none d-sm-inline-block btn btn-sm btn-primary shadow-sm"><i
					class="fas fa-print fa-sm text-white-50"></i> Imprimir</a>
		</div>
		<div class="table-responsive">
			<table class="table table-bordered" id="dataTable" width="100%" cellspacing="0" style="font-size: 13px; font-family: Arsenal">
				<thead>
				<tr>
					<th>DNI</th>
					<th>NOMBRES</th>
					<th>PATERNO</th>
					<th>MATERNO</th>
					<th>SEXO</th>
					<th>EDAD</th>
					<th>CELULAR</th>
					<th>INSTITUCION</th>
					<th>DNI_RESP</th>
					<th>ACCIÓN</th>
				</tr>
				</thead>
				<tfoot>
				<tr>
					<th>DNI</th>
					<th>Nombres</th>
					<th>Paterno</th>
					<th>Materno</th>
					<th>Sexo</th>
					<th>Edad</th>
					<th>Celular</th>
					<th>Institución</th>
					<th>DNI_resp</th>
					<th>Acción</th>
				</tr>
				</tfoot>
				<tbody>
				<?php
				foreach ($estudiante as $value):
					?>
					<tr>
						<td><?= $value->dni ?></td>
						<td><?= $value->nombres ?></td>
						<td><?= $value->ape_pat ?></td>
						<td><?= $value->ape_mat ?></td>
						<td><?= $value->sexo ?></td>
						<td><?= $value->edad ?></td>
						<td><?= $value->celular ?></td>
						<td><?= $value->institucion ?></td>
						<td><?= $value->dni_resp ?></td>
						<td>
							<div class="btn-toolbar" role="toolbar" aria-label="Toolbar with button groups">
								<div class="btn-group mr-2 text-white" role="group" aria-label="First group">
									<a type="button" class="btn btn-sm btn-primary " title="VER">
										<span class="icon text-white-50">
											<i class="fas fa-eye"></i>
										</span>
									</a>
									<a type="button" class="btn btn-sm btn-primary" title="EDITAR">
										<span class="icon text-white-50">
											<i class="fas fa-edit"></i>
										</span>
									</a>
									<a type="button" class="btn btn-sm btn-danger" title="ELIMINAR">
										<span class="icon text-white-50">
											<i class="fas fa-trash"></i>
										</span>
									</a>
								</div>
							</div>
						</td>

					</tr>
				<?php
				endforeach;
				?>

				</tbody>
			</table>
		</div>
	</div>
</div>

<?php
$this->load->view('admin/footer');
?>
