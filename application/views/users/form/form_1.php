<?php defined('BASEPATH') or exit('No direct script access allowed'); ?>


<div id="exist"></div>

<!-- Section heading -->

<h2 class="text-center h2-responsive pt-4 mb-1">
	<?= $title ?>
</h2>

<hr>

<!-- Grid row -->
<div class="row pt-lg-3 pt-2">


	<!-- Grid column -->
	<div class="col-md-8 ml-xl-5">

		<form action="" class="needs-validation" novalidate method="post" enctype="multipart/form-data">

			<div class="list-group" id="relo">

				<div class="list-group-item primary-color white-text">DATOS DEL ESTUDIANTE</div>

				<div class="list-group-item">

					<p class="note note-primary" style="font-size: 14px;">
						<strong>Nota: </strong> Complete los datos del estudiante a incribirse en este
						sección.
					</p>

					<p class="note note-danger" style="font-size: 14px;">
						<strong>Importante: </strong> Seleccionar máximo 2 opciones para inscribirse. Si hay más de 2
						opciones, el sistema tomará
						para incribir los 2 primeros que seleccionaste.
					</p>

					<?php
					//echo validation_errors();
					?>

					<div class="form-row">
						<div class="col-md-5 mb-3 pt-3">
							<a type="button" class="btn-floating btn-sm btn-li"
							   data-toggle="popover-hover"
							   title="<strong> <i class='fas fa-info-circle'></i> NOTA</strong>"
							   data-content="Escriba su número de DNI, luego busque para inscribirte. Si no encuentra complete el formulario.">
								<i class="fas fa-info"></i> info
							</a> &nbsp;

							<a type="button" class="btn-floating btn-sm btn-gplus" onclick="enabledDNI()"
							   data-toggle="popover-hover"
							   title="<strong> <i class='fas fa-info-circle'></i> LIMPIAR</strong>"
							   data-content="Limpia todos los campos para volver a escribir.">
								<i class="fas fa-eraser"></i>
							</a>
						</div>
					</div>

					<hr>

					<div class="form-row">
						<!--				Begin disciplina-->

						<div class="col-md-12 mb-3">

							<select name="disciplina[]" id="disciplina" multiple
									class="md-form colorful-select dropdown-primary"
									searchable="Buscar.." size="2"
									required>
								<option value="" selected disabled>Selecciona uno más disciplinas a inscribirte</option>

								<?php
								foreach ($disciplina as $value):
									if ($value->active && !$value->addressed):
										?>
										<option
												value="<?= $value->id_disciplina ?>"

												<?php echo set_select('disciplina[]', $value->id_disciplina); ?>

												data-secondary-text="<span><?= $value->especialidad ?> — <?= $value->escuela ?></span>"

												<?= $value->id_disciplina != null ?: 'selected' ?> >
											<?= $value->disciplina ?>
										</option>
									<?php
									endif;
								endforeach;
								?>

							</select>
							<label for="disciplina">Disciplinas</label>

						</div>

						<?php echo form_error("disciplina[]",
								"<p class='text-danger' style='font-size: 11px;'>
											<i class='fas fa-exclamation-circle'></i> ",
								"</p>") ?>

						<!--				End disciplina -->
					</div>

					<hr>


					<!--				Begin DNI-->
					<div class="form-row">
						<div class="col-md-5 mb-3 pt-3">
							<label for="dni" data-toggle="popover-hover"
								   title="<strong> <i class='fas fa-info-circle'></i> DNI</strong>"
								   data-content="Escriba su DNI del estudiante y click en buscar...">DNI </label>

							<input type="hidden" name="dni" id="hidden_dni" autocomplete="off"
								   value="<?php echo set_value("dni"); ?>">

							<div class="input-group">
								<input type="text" name="dni" class="form-control" placeholder="DNI" id="dni"
									   required value="<?php echo set_value("dni"); ?>">

								<div class="input-group-prepend">
									<a onclick="getDNI()" class="btn btn-md btn-primary m-0 ">Buscar</a>
								</div>

								<div class="invalid-feedback">
									DNI es obligatorio, numérico de 8 digitos.
								</div>

							</div>
							<?php echo form_error("dni",
									"<p class='text-danger' style='font-size: 11px;'>
											<i class='fas fa-exclamation-circle'></i> ",
									"</p>") ?>

						</div>

						<!--				End DNI-->

					</div>

					<hr>

					<div class="form-row">

						<!--				Begin Nombres-->

						<input type="hidden" name="nombres" id="hidden_nombres" autocomplete="off"
							   value="<?php echo set_value("nombres"); ?>">

						<div class="col-md-4 mb-3">
							<label for="nombres">Nombres</label>
							<input type="text" name="nombres" class="form-control" id="nombres" required disabled
								   placeholder="Nombres" value="<?php echo set_value("nombres"); ?>">
							<?php echo form_error("nombres",
									"<p class='text-danger' style='font-size: 11px;'>
											<i class='fas fa-exclamation-circle'></i> ",
									"</p>") ?>
							<div class="invalid-feedback">
								Campo nombres es obligatorio.
							</div>
						</div>

						<!--				End Nombres-->

						<!--				Begin Apellido Paterno-->

						<input type="hidden" name="ape_pat" id="hidden_ape_pat" autocomplete="off"
							   value="<?php echo set_value("ape_pat"); ?>">
						<div class="col-md-4 mb-3">
							<label for="ape_pat">Apellido Paterno</label>
							<input type="text" name="ape_pat" class="form-control" id="ape_pat"
								   placeholder="Apellido Paterno" required disabled
								   value="<?php echo set_value("ape_pat"); ?>">
							<?php echo form_error("ape_pat",
									"<p class='text-danger' style='font-size: 11px;'>
											<i class='fas fa-exclamation-circle'></i> ",
									"</p>") ?>
							<div class="invalid-feedback">
								Campo apellido paterno es obligatorio.
							</div>
						</div>

						<!--				End Apellido Paterno-->

						<!--				Begin Apellido Materno-->

						<input type="hidden" name="ape_mat" id="hidden_ape_mat" autocomplete="off"
							   value="<?php echo set_value("ape_mat"); ?>">
						<div class="col-md-4 mb-3">
							<label for="ape_mat">Apellido Materno</label>
							<input type="text" name="ape_mat" class="form-control" id="ape_mat"
								   placeholder="Apellido Materno" required disabled
								   value="<?php echo set_value("ape_mat"); ?>">
							<?php echo form_error("ape_mat",
									"<p class='text-danger' style='font-size: 11px;'>
											<i class='fas fa-exclamation-circle'></i> ",
									"</p>") ?>
							<div class="invalid-feedback">
								Campo apellido materno es obligatorio.
							</div>
						</div>

						<!--				End Apellido Materno-->

					</div>
					<hr>
					<div class="form-row">
						<!--				Begin Genero-->

						<div class="col-md-4 mb-3 pt-4">

							<!-- Masculino -->


							<div class="form-check form-check-inline sexo">
								<input type="radio" class="form-check-input" value="1"
										<?php echo set_radio('sexo', '1'); ?>
									   id="masculino" name="sexo">
								<label class="form-check-label" for="masculino">Masculino</label>
							</div>

						</div>


						<div class="col-md-4 mb-3 pt-4">

							<!-- Femenino -->
							<div class="form-check form-check-inline sexo">
								<input type="radio" class="form-check-input" value="2"
										<?php echo set_radio('sexo', '2'); ?>
									   id="femenino" name="sexo">
								<label class="form-check-label" for="femenino">Femenino</label>
							</div>

						</div>


						<!--				End Genero-->

						<!--				Begin fecha_nacimiento-->


						<input type="hidden" name="fecha_nacimiento" class="form-control" id="fecha_nacimiento"
							   required value="<?php echo set_value("fecha_nacimiento"); ?>">


						<!--				End fecha_nacimiento-->

						<!--				Begin Celular-->

						<div class="col-md-4 mb-3">
							<label for="celular">Celular</label>
							<input type="text" name="celular" class="form-control" id="celular"
								   placeholder="Celular" required
								   value="<?php echo set_value("celular"); ?>">

							<?php echo form_error("celular",
									"<p class='text-danger validation_users' style='font-size: 11px;'>
											<i class='fas fa-exclamation-circle'></i> ",
									"</p>") ?>
						</div>

						<!--				End Celular-->
					</div>

					<!--					error sexo-->
					<?php echo form_error("sexo",
							"<p class='text-danger validation_users' style='font-size: 11px;'>
											<i class='fas fa-exclamation-circle'></i> ",
							"</p>") ?>
					<!--					error sexo-->
					<hr>


					<div class="form-row">

						<!--				Begin Institución -->

						<div class="col-md-7 mb-3">
							<label for="institucion">Institución</label>
							<select name="institucion" id="institucion"
									class="mdb-select md-form colorful-select dropdown-primary" searchable="Buscar.."
									searchable="Buscar..." required>
								<option value="" selected disabled>Institución</option>
								<?php
								foreach ($institucion as $value):
									?>
									<option
											value="<?= $value->id_institucion ?>"

											<?php echo set_select('institucion', $value->id_institucion); ?>

											<?= $value->id_institucion != null ?: 'selected' ?> >
										<?= $value->institucion ?></option>
								<?php
								endforeach;
								?>
							</select>
							<?php echo form_error("institucion",
									"<p class='text-danger' style='font-size: 11px;'>
											<i class='fas fa-exclamation-circle'></i> ",
									"</p>") ?>

							<div class="invalid-feedback">
								Campo institución es obligatorio.
							</div>
						</div>

						<!--				End Institución -->


						<!--				Begin Grado -->

						<div class="col-md-3 mb-3">
							<label for="grado">Grado</label>
							<select name="grado" id="grado" class="mdb-select md-form colorful-select dropdown-primary"
									searchable="Buscar.."
									required>
								<option value="" selected disabled>Grado</option>

								<?php
								foreach ($grado as $value):
									?>
									<option
											value="<?= $value->id_grado ?>"

											<?php echo set_select('grado', $value->id_grado); ?>

											<?= $value->id_grado != null ?: 'selected' ?> >
										<?= $value->grado ?></option>
								<?php
								endforeach;
								?>

							</select>
							<?php echo form_error("grado",
									"<p class='text-danger' style='font-size: 11px;'>
											<i class='fas fa-exclamation-circle'></i> ",
									"</p>") ?>
							<div class="invalid-feedback">
								Campo grado es obligatorio.
							</div>
						</div>

						<!--				End Grado-->

						<!--				Begin Seccion-->

						<div class="col-md-2 mb-3">
							<label for="seccion">Sección</label>
							<select name="seccion" id="seccion"
									class="mdb-select md-form colorful-select dropdown-primary" searchable="Buscar.."
									required>
								<option value="" selected disabled>Sección</option>

								<?php
								foreach ($seccion as $value):
									?>
									<option
											value="<?= $value->id_seccion ?>"

											<?php echo set_select('seccion', $value->id_seccion); ?>

											<?= $value->id_seccion != null ?: 'selected' ?> >
										<?= $value->seccion ?></option>
								<?php
								endforeach;
								?>

							</select>
							<?php echo form_error("seccion",
									"<p class='text-danger' style='font-size: 11px;'>
											<i class='fas fa-exclamation-circle'></i> ",
									"</p>") ?>

							<div class="invalid-feedback">
								Campo sección es obligatorio.
							</div>
						</div>

						<!--				End Seccion -->

					</div>
				</div>

				<div class="list-group-item primary-color white-text">DATOS DEL RESPONSABLE</div>

				<div class="list-group-item">

					<p class="note note-primary" style="font-size: 14px;">
						<strong>Nota: </strong> Complete los datos del responsable del estudiante a incribirse.
					</p>

					<div class="form-row">
						<div class="col-md-5 mb-3 pt-3">
							<a type="button" class="btn-floating btn-sm btn-li"
							   data-toggle="popover-hover"
							   title="<strong> <i class='fas fa-info-circle'></i> NOTA</strong>"
							   data-content="Escriba su número de DNI, luego busque para inscribirte. Si no encuentra complete el formulario.">
								<i class="fas fa-info"></i> info
							</a> &nbsp;

							<a type="button" class="btn-floating btn-sm btn-gplus" onclick="enabledDNI_()"
							   data-toggle="popover-hover"
							   title="<strong> <i class='fas fa-info-circle'></i> LIMPIAR</strong>"
							   data-content="Limpia todos los campos para volver a escribir.">
								<i class="fas fa-eraser"></i>
							</a>
						</div>
					</div>

					<!--				Begin DNI-->
					<div class="form-row">
						<div class="col-md-5 mb-3 pt-3">
							<label for="dni" data-toggle="popover-hover"
								   title="<strong> <i class='fas fa-info-circle'></i> DNI</strong>"
								   data-content="Escriba su DNI del responsable del estudiante y click en buscar...">DNI</label>

							<input type="hidden" name="dni_resp" id="hidden_dni_resp" autocomplete="off"
								   value="<?php echo set_value("dni_resp"); ?>">

							<div class="input-group">
								<input type="text" name="dni_resp" class="form-control" placeholder="DNI" id="dni_resp"
									   required value="<?php echo set_value("dni_resp"); ?>">

								<div class="input-group-prepend">
									<a onclick="getDNI_()" class="btn btn-md btn-primary m-0 ">Buscar</a>
								</div>

							</div>
							<?php echo form_error("dni_resp",
									"<p class='text-danger' style='font-size: 11px;'>
											<i class='fas fa-exclamation-circle'></i> ",
									"</p>") ?>

						</div>

						<!--				End DNI-->
					</div>
					<hr>

					<div class="form-row">

						<!--				Begin Nombres-->

						<input type="hidden" name="nombres_resp" id="hidden_nombres_resp" autocomplete="off"
							   value="<?php echo set_value("nombres_resp"); ?>">

						<div class="col-md-4 mb-3">
							<label for="nombres_resp">Nombres</label>
							<input type="text" name="nombres_resp" class="form-control" id="nombres_resp" required
								   disabled
								   placeholder="Nombres" value="<?php echo set_value("nombres_resp"); ?>">
							<?php echo form_error("nombres_resp",
									"<p class='text-danger' style='font-size: 11px;'>
											<i class='fas fa-exclamation-circle'></i> ",
									"</p>") ?>

						</div>

						<!--				End Nombres-->

						<!--				Begin Apellido Paterno-->

						<input type="hidden" name="ape_pat_resp" id="hidden_ape_pat_resp" autocomplete="off"
							   value="<?php echo set_value("ape_pat_resp"); ?>">
						<div class="col-md-4 mb-3">
							<label for="ape_pat">Apellido Paterno</label>
							<input type="text" name="ape_pat_resp" class="form-control" id="ape_pat_resp"
								   placeholder="Apellido Paterno" required disabled
								   value="<?php echo set_value("ape_pat_resp"); ?>">
							<?php echo form_error("ape_pat_resp",
									"<p class='text-danger' style='font-size: 11px;'>
											<i class='fas fa-exclamation-circle'></i> ",
									"</p>") ?>

						</div>

						<!--				End Apellido Paterno-->

						<!--				Begin Apellido Materno-->

						<input type="hidden" name="ape_mat_resp" id="hidden_ape_mat_resp" autocomplete="off"
							   value="<?php echo set_value("ape_mat_resp"); ?>">
						<div class="col-md-4 mb-3">
							<label for="ape_mat_resp">Apellido Materno</label>
							<input type="text" name="ape_mat_resp" class="form-control" id="ape_mat_resp"
								   placeholder="Apellido Materno" required disabled
								   value="<?php echo set_value("ape_mat_resp"); ?>">
							<?php echo form_error("ape_mat_resp",
									"<p class='text-danger' style='font-size: 11px;'>
											<i class='fas fa-exclamation-circle'></i> ",
									"</p>") ?>

						</div>

						<!--				End Apellido Materno-->

					</div>

					<hr>

					<div class="form-row">

						<!--				Begin Dirección-->

						<div class="col-md-5 mb-3">
							<label for="direccion">Dirección</label>
							<input type="text" name="direccion" class="form-control" id="direccion"
								   placeholder="Av. Bolivar 1555" required
								   value="<?php echo set_value("direccion"); ?>">

							<?php echo form_error("direccion",
									"<p class='text-danger' style='font-size: 11px;'>
											<i class='fas fa-exclamation-circle'></i> ",
									"</p>") ?>

						</div>

						<!--				End Dirección-->

						<!--				Begin Barrio-->

						<div class="col-md-4 mb-3">
							<label for="barrio">Barrio</label>
							<select name="barrio" id="barrio"
									class="mdb-select md-form colorful-select dropdown-primary" searchable="Buscar.."
									required>
								<option value="" selected disabled>Barrio</option>

								<?php
								foreach ($barrio as $value):
									?>
									<option
											value="<?= $value->id_barrio ?>"

											<?php echo set_select('barrio', $value->id_barrio); ?>

											<?= $value->id_barrio != null ?: 'selected' ?> >
										<?= $value->barrio ?>

									</option>

								<?php
								endforeach;
								?>

							</select>
							<?php echo form_error("barrio",
									"<p class='text-danger' style='font-size: 11px;'>
											<i class='fas fa-exclamation-circle'></i> ",
									"</p>") ?>


						</div>

						<!--				End Barrio-->


						<!--				Begin Celular-->

						<div class="col-md-3 mb-3">
							<label for="celular_resp">Celular</label>
							<input type="text" name="celular_resp" class="form-control" id="celular_resp"
								   placeholder="Celular" required
								   value="<?php echo set_value("celular_resp"); ?>">

							<?php echo form_error("celular_resp",
									"<p class='text-danger validation_users' style='font-size: 11px;'>
											<i class='fas fa-exclamation-circle'></i> ",
									"</p>") ?>
						</div>

						<!--				End Celular-->

					</div>


					<hr>
					<div class="form-group">
						<div class="form-check">
							<input class="form-check-input" name="invalidCheck" type="checkbox" value="set"
								   id="invalidCheck"
									<?php echo set_checkbox('invalidCheck', 'set'); ?> required>
							<label class="form-check-label" for="invalidCheck">
								Aceptar los terminos y bases
							</label>
							<?php echo form_error("invalidCheck",
									"<p class='text-danger validation_users' style='font-size: 11px;'>
											<i class='fas fa-exclamation-circle'></i> ",
									"</p>") ?>
							<div class="invalid-feedback">
								Debes estar de acuerdo antes de enviar.
							</div>
						</div>
					</div>


					<button class="btn btn-primary btn-md" id="btn-one" type="submit" value="Guardar">Guardar</button>

				</div>


		</form>

	</div>
	<br>


</div>
<!-- Grid Column -->
