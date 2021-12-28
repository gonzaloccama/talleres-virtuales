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

				<div class="list-group-item primary-color white-text">DATOS DEL INTERESADO</div>

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
									if ($value->active && $value->addressed):
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
									<a onclick="getDniPer()" class="btn btn-md btn-primary m-0 ">Buscar</a>
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

						<div class="col-md-6 mb-3 pt-4">

							<!-- Masculino -->


							<div class="form-check form-check-inline sexo">
								<input type="radio" class="form-check-input" value="1"
										<?php echo set_radio('sexo', '1'); ?>
									   id="masculino" name="sexo">
								<label class="form-check-label" for="masculino">Masculino</label>
							</div>

						</div>


						<div class="col-md-6 mb-3 pt-4">

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


					</div>

					<!--					error sexo-->
					<?php echo form_error("sexo",
							"<p class='text-danger validation_users' style='font-size: 11px;'>
											<i class='fas fa-exclamation-circle'></i> ",
							"</p>") ?>
					<!--					error sexo-->
					<hr>

					<!--				begin upload dni frontal-->

<!--					<div class="form-row">-->
<!---->
<!---->
<!--						<div class="col-md-6">-->
<!--							<div class="input-group">-->
<!--								<div class="input-group-prepend">-->
<!--									<span class="input-group-text" id="frontal_addon">DNI frontal</span>-->
<!--								</div>-->
<!--								<div class="custom-file">-->
<!--									<input type="file" class="custom-file-input" id="frontal"-->
<!--										   aria-describedby="frontal_addon" name="frontal">-->
<!--									<label class="custom-file-label" for="frontal">Elija el archivo</label>-->
<!--								</div>-->
<!--							</div>-->
<!--						</div>-->
<!---->
<!---->
<!--						<div class="col-md-6">-->
<!--							<div class="input-group">-->
<!--								<div class="input-group-prepend">-->
<!--									<span class="input-group-text" id="reverso_addon">DNI reverso</span>-->
<!--								</div>-->
<!--								<div class="custom-file">-->
<!--									<input type="file" class="custom-file-input" id="reverso"-->
<!--										   aria-describedby="reverso_addon" name="reverso">-->
<!--									<label class="custom-file-label" for="reverso">Elija el archivo</label>-->
<!--								</div>-->
<!---->
<!--							</div>-->
<!--						</div>-->
<!---->
<!--					</div>-->
<!--					<hr>-->

					<div class="form-row">

						<div class="col-md-6">
							<?php echo form_error("frontal",
									"<p class='text-danger validation_users' style='font-size: 11px;'>
											<i class='fas fa-exclamation-circle'></i> ",
									"</p>") ?>
						</div>
						<div class="col-md-6">
							<?php echo form_error("reverso",
									"<p class='text-danger validation_users' style='font-size: 11px;'>
											<i class='fas fa-exclamation-circle'></i> ",
									"</p>") ?>
						</div>
					</div>


					<!--				End pload dni frontal-->

<!--					<hr>-->

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
