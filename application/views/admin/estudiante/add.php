<?php
$this->load->view('admin/header');
?>


<?php
$this->load->view('admin/navbar');
?>

<div class="" id="exist"></div>

<!-- DataTales Example -->
<div class="card shadow mb-4">
	<div class="card-header py-3">
		<h6 class="m-0 font-weight-bold text-primary"><?= $subtitle ?></h6>
	</div>
	<div class="card-body">

		<div class="col-md-12">

			<form action="" class="user" method="post" enctype="multipart/form-data">


				<div class="form-row align-items-center">
					<input type="hidden" name="dni" id="hidden_dni" autocomplete="off"
						   value="<?php echo set_value("dni"); ?>">
					<div class="col-sm-3 my-1">
						<label class="" for="dni">DNI</label>
					</div>

					<div class="col-sm-3 my-1">
						<input type="text" class="form-control" name="dni" id="dni" placeholder="DNI"
							   autocomplete="off" value="<?php echo set_value("dni"); ?>">
					</div>

					<div class=" col-auto my-1">
						<a class="btn btn-md btn-primary m-0 text-white" onclick="getEstudiante()">Buscar</a>
					</div>
					<div class="col-auto my-1">
						<a class="btn btn-md btn-danger m-0 text-white" onclick="clean()"><i
									class="fas fa-trash"></i></a>
					</div>
					<div class="col-sm-4">
						<!--					error sexo-->
						<?php echo form_error("dni",
								"<label class='text-danger validation_users' style='font-size: 13px;'>
											<i class='fas fa-exclamation-circle'></i> ",
								"</label>") ?>
						<!--					error sexo-->
					</div>
				</div>


				<hr>

				<div class="form-group row">
					<label for="nombres" class="col-sm-3 col-form-label">NOMBRES</label>
					<div class="col-sm-5 mb-3 mb-sm-0">
						<input type="text" class="form-control" name="nombres" id="nombres"
							   value="<?php echo set_value("nombres"); ?>"
							   placeholder="Nombres" autocomplete="off">
					</div>
					<div class="col-sm-4">
						<!--					error sexo-->
						<?php echo form_error("nombres",
								"<label class='text-danger validation_users' style='font-size: 13px;'>
											<i class='fas fa-exclamation-circle'></i> ",
								"</label>") ?>
						<!--					error sexo-->
					</div>
				</div>

				<div class="form-group row">
					<label for="ape_pat" class="col-sm-3 col-form-label">APELLIDO PATERNO</label>
					<div class="col-sm-5 mb-3 mb-sm-0">
						<input type="text" class="form-control" name="ape_pat" id="ape_pat"
							   value="<?php echo set_value("ape_pat"); ?>"
							   placeholder="Apellido paterno" autocomplete="off">
					</div>
					<div class="col-sm-4">
						<!--					error sexo-->
						<?php echo form_error("ape_pat",
								"<label class='text-danger validation_users' style='font-size: 13px;'>
											<i class='fas fa-exclamation-circle'></i> ",
								"</label>") ?>
						<!--					error sexo-->
					</div>
				</div>

				<div class="form-group row">
					<label for="ape_mat" class="col-sm-3 col-form-label">APELLIDO MATERNO</label>
					<div class="col-sm-5 mb-3 mb-sm-0">
						<input type="text" class="form-control" name="ape_mat" id="ape_mat"
							   value="<?php echo set_value("ape_mat"); ?>"
							   placeholder="Apellido materno" autocomplete="off">
					</div>
					<div class="col-sm-4">
						<!--					error sexo-->
						<?php echo form_error("ape_mat",
								"<label class='text-danger validation_users' style='font-size: 13px;'>
											<i class='fas fa-exclamation-circle'></i> ",
								"</label>") ?>
						<!--					error sexo-->
					</div>
				</div>

				<div class="form-group row">
					<label for="sexo" class="col-sm-3 col-form-label">SEXO</label>
					<div class="col-sm-5 mb-3 mb-sm-0">
						<select class="form-control" name="sexo" id="sexo">
							<option value="" disabled selected>Selecciones género</option>
							<?php
							foreach ($sexo as $value):
								?>
								<option
										value="<?= $value->id_sexo ?>"
										<?php echo set_select('sexo', $value->id_sexo); ?>>

									<?= $value->sexo ?>
								</option>
							<?php
							endforeach;
							?>
						</select>
					</div>
					<div class="col-sm-4">
						<!--					error sexo-->
						<?php echo form_error("sexo",
								"<label class='text-danger validation_users' style='font-size: 13px;'>
											<i class='fas fa-exclamation-circle'></i> ",
								"</label>") ?>
						<!--					error sexo-->
					</div>
				</div>


				<div class="form-group row">
					<label for="fecha_nacimiento" class="col-sm-3 col-form-label">FECHA DE NACIMIENTO</label>
					<div class="col-sm-5 mb-3 mb-sm-0">
						<input type="date" class="form-control" name="fecha_nacimiento" id="fecha_nacimiento"
							   value="<?php echo set_value("fecha_nacimiento"); ?>"
							   placeholder="Fecha de nacimiento">
					</div>
					<div class="col-sm-4">
						<!--					error fecha_nacimiento-->
						<?php echo form_error("fecha_nacimiento",
								"<label class='text-danger validation_users' style='font-size: 13px;'>
											<i class='fas fa-exclamation-circle'></i> ",
								"</label>") ?>
						<!--					error fecha_nacimiento-->
					</div>
				</div>

				<div class="form-group row">
					<label for="institucion" class="col-sm-3 col-form-label">INSTITUCIÓN</label>
					<div class="col-sm-5 mb-3 mb-sm-0">
						<select class="form-control" name="institucion" id="institucion">
							<option value="" disabled selected>Selecciona institución</option>
							<?php
							foreach ($institucion as $value):
								?>
								<option
										value="<?= $value->id_institucion ?>"
										<?php echo set_select('institucion', $value->id_institucion); ?>>
									<?= $value->institucion ?>
								</option>
							<?php
							endforeach;
							?>
						</select>
					</div>
					<div class="col-sm-4">
						<!--					error institucion-->
						<?php echo form_error("institucion",
								"<label class='text-danger validation_users' style='font-size: 13px;'>
											<i class='fas fa-exclamation-circle'></i> ",
								"</label>") ?>
						<!--					error institucion-->
					</div>
				</div>


				<div class="form-group row">
					<label for="grado" class="col-sm-3 col-form-label">GRADO</label>
					<div class="col-sm-5 mb-3 mb-sm-0">
						<select class="form-control" name="grado" id="grado">
							<option value="" disabled selected>Selecciona grado</option>
							<?php
							foreach ($grado as $value):
								?>
								<option
										value="<?= $value->id_grado ?>"
										<?php echo set_select('grado', $value->id_grado); ?>>
									<?= $value->grado ?>
								</option>
							<?php
							endforeach;
							?>
						</select>
					</div>
					<div class="col-sm-4">
						<!--					error grado-->
						<?php echo form_error("grado",
								"<label class='text-danger validation_users' style='font-size: 13px;'>
											<i class='fas fa-exclamation-circle'></i> ",
								"</label>") ?>
						<!--					error grado-->
					</div>
				</div>


				<div class="form-group row">
					<label for="seccion" class="col-sm-3 col-form-label">SECCIÓN</label>
					<div class="col-sm-5 mb-3 mb-sm-0">
						<select class="form-control" name="seccion" id="seccion">
							<option value="" disabled selected>Selecciona sección</option>
							<?php
							foreach ($seccion as $value):
								?>
								<option
										value="<?= $value->id_seccion ?>"
										<?php echo set_select('seccion', $value->id_seccion); ?>>
									<?= $value->seccion ?>
								</option>
							<?php
							endforeach;
							?>
						</select>
					</div>
					<div class="col-sm-4">
						<!--					error seccion-->
						<?php echo form_error("seccion",
								"<label class='text-danger validation_users' style='font-size: 13px;'>
											<i class='fas fa-exclamation-circle'></i> ",
								"</label>") ?>
						<!--					error seccion-->
					</div>
				</div>


				<div class="form-group row">
					<label for="celular" class="col-sm-3 col-form-label">CELULAR</label>
					<div class="col-sm-5 mb-3 mb-sm-0">
						<input type="number" class="form-control" name="celular" id="celular"
							   value="<?php echo set_value("celular"); ?>"
							   placeholder="Celular" autocomplete="off">
					</div>
					<div class="col-sm-4">
						<!--					error celular-->
						<?php echo form_error("celular",
								"<label class='text-danger validation_users' style='font-size: 13px;'>
											<i class='fas fa-exclamation-circle'></i> ",
								"</label>") ?>
						<!--					error celular-->
					</div>
				</div>


				<div class="form-group row">
					<label for="dni_resp" class="col-sm-3 col-form-label">DNI RESPONSABLE</label>
					<div class="col-sm-5 mb-3 mb-sm-0">
						<select class="form-control" name="dni_resp" id="dni_resp">
							<option value="" disabled selected>Responsable del estudiante</option>
							<?php
							foreach ($responsable as $value):
								?>
								<option
										value="<?= $value->dni_resp ?>"
										<?php echo set_select('dni_resp', $value->dni_resp); ?>>
									<?= $value->dni_resp ?>
								</option>
							<?php
							endforeach;
							?>
						</select>
					</div>
					<div class="col-sm-4">
						<!--					error dni_resp-->
						<?php echo form_error("dni_resp",
								"<label class='text-danger validation_users' style='font-size: 13px;'>
											<i class='fas fa-exclamation-circle'></i> ",
								"</label>") ?>
						<!--					error dni_resp-->
					</div>
				</div>

				<div class="form-group row">
					<label for="observations" class="col-sm-3 col-form-label">OBSERVACIONES</label>
					<div class="col-sm-5 mb-2 mb-sm-0">
						<textarea class="form-control" name="observations" id="observations">

						</textarea>
					</div>
					<div class="col-sm-4">
						<!--					error observations-->
						<?php echo form_error("observations",
								"<label class='text-danger validation_users' style='font-size: 13px;'>
											<i class='fas fa-exclamation-circle'></i> ",
								"</label>") ?>
						<!--					error observations-->
					</div>
				</div>

				<hr>

				<div class="form-group row">
					<div class="col-sm-10">
						<button type="submit" class="btn btn-primary">GUARDAR</button>
					</div>
				</div>
			</form>
		</div>

	</div>
</div>

<?php
$this->load->view('admin/footer');
?>
