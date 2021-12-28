<?php
$this->load->view('admin/header');
?>

<?php
$this->load->view('admin/navbar');


?>

<!-- Content Row -->
<div class="row">

	<!-- Earnings (Monthly) Card Example -->
	<div class="col-xl-4 col-md-6 mb-4">
		<div class="card border-left-primary shadow h-100 py-2">
			<div class="card-body">
				<div class="row no-gutters align-items-center">
					<div class="col mr-2">
						<div class="text-xs font-weight-bold text-primary text-uppercase mb-1">Total de estudiantes
							inscritos
							(<?= $cicle[0]->cicle ?>)

						</div>
						<div class="h5 mb-0 font-weight-bold text-gray-800"><h3><?= $total_estudiantes ?></h3></div>
					</div>
					<div class="col-auto">
						<!--							<i class="fas fa-user-graduate"></i>-->
						<i class="fas fa-user-graduate fa-3x text-gray-300"></i>
					</div>
				</div>
			</div>
		</div>
	</div>

	<!-- Earnings (Monthly) Card Example -->
	<div class="col-xl-4 col-md-6 mb-4">
		<div class="card border-left-primary shadow h-100 py-2">
			<div class="card-body">
				<div class="row no-gutters align-items-center">
					<div class="col mr-2">
						<div class="text-xs font-weight-bold text-primary text-uppercase mb-1">Total de mayores
							inscritos
							(<?= $cicle[0]->cicle ?>)

						</div>
						<div class="h5 mb-0 font-weight-bold text-gray-800"><h3><?= $total_adultos ?></h3></div>
					</div>
					<div class="col-auto">
						<!--							<i class="fas fa-user-tie"></i>-->
						<i class="fas fa-user-tie fa-3x text-gray-300"></i>
					</div>
				</div>
			</div>
		</div>
	</div>


	<!-- Earnings (Monthly) Card Example -->
	<div class="col-xl-4 col-md-6 mb-4">
		<div class="card border-left-danger shadow h-100 py-2">
			<div class="card-body">
				<div class="row no-gutters align-items-center">
					<div class="col mr-2">
						<div class="text-xs font-weight-bold text-danger text-uppercase mb-1">Total de inscritos
							(<?= $cicle[0]->cicle ?>)

						</div>
						<div class="h5 mb-0 font-weight-bold text-gray-800"><h3><?= $total_de_iscritos ?></h3></div>
					</div>
					<div class="col-auto">
						<!--							<i class="fas fa-user-tie"></i>-->
						<i class="fas fa-user-tie fa-3x text-gray-300"></i>
					</div>
				</div>
			</div>
		</div>
	</div>
</div>

<div class="row">
	<div class="col-xl-6 col-md-6 mb-4">
		<div class="card shadow">
			<div class="card-header py-3">
				<h6 class="m-0 font-weight-bold text-primary"><h4>Estudiantes escolares</h4></h6>
			</div>
			<div class="card-body">
				<!-- Topbar Search -->
				<div class="d-none d-sm-inline-block form-inline mr-auto navbar-search">
					<div class="input-group">
						<input type="text" class="form-control bg-light border-0 small" id="search_text"
							   name="search_text"
							   placeholder="Buscar..." aria-label="Search" aria-describedby="basic-addon2">
						<div class="input-group-append">
							<button class="btn btn-primary" type="button" id="searchBtn">
								<i class="fas fa-search fa-sm"></i>
							</button>
						</div>
					</div>
					<br>
					<div id="result"></div>
				</div>

			</div>

		</div>
	</div>

	<div class="col-xl-6 col-md-6 mb-4">
		<div class="card shadow">
			<div class="card-header py-3">
				<h6 class="m-0 font-weight-bold text-primary"><h4>Estudiantes adultos</h4></h6>
			</div>
			<div class="card-body">
				<!-- Topbar Search -->
				<div class="d-none d-sm-inline-block form-inline mr-auto navbar-search">
					<div class="input-group">
						<input type="text" class="form-control bg-light border-0 small" id="search_text2"
							   name="search_text2"
							   placeholder="Buscar..." aria-label="Search" aria-describedby="basic-addon2">
						<div class="input-group-append">
							<button class="btn btn-primary" type="button" id="searchBtn2">
								<i class="fas fa-search fa-sm"></i>
							</button>
						</div>
					</div>
					<br>
					<div id="result2"></div>
				</div>

			</div>

		</div>
	</div>

</div>


<div class="card shadow mb-4">
	<div class="card-header py-3">
		<h6 class="m-0 font-weight-bold text-primary"><h4>Participantes escolares</h4></h6>
	</div>
	<div class="row">
		<?php
		foreach ($disciplina_e as $item):
			?>
			<div class="col-sm-3 card-body">
				<div class="card">
					<div class="card bg-gray-700 text-white shadow">
						<div class="card-body">
							<p class="card-title text-center"><?= $item->disciplina ?></p>
							<p class="card-text h2 text-center"><?= $item->count ?> &ensp; <span
										class="fas fa-list-alt"></span></p>

						</div>
					</div>
				</div>
			</div>
		<?php
		endforeach;
		?>

	</div>


</div>

<div class="card shadow mb-4">
	<div class="card-header py-3">
		<h6 class="m-0 font-weight-bold text-primary"><h4>Particpantes mayores</h4></h6>
	</div>
	<div class="row">
		<?php
		foreach ($disciplina_a as $item):
			?>
			<div class="col-sm-3 card-body">
				<div class="card">
					<div class="card bg-gray-700 text-white shadow">
						<div class="card-body">
							<p class="card-title text-center"><?= $item->disciplina ?></p>
							<p class="card-text h2 text-center"><?= $item->count ?> &ensp; <span
										class="fas fa-list-alt"></span></p>

						</div>
					</div>
				</div>
			</div>
		<?php
		endforeach;
		?>

	</div>

</div>


<?php
$this->load->view('admin/footer');
?>
