<?php defined('BASEPATH') or exit('No direct script access allowed'); ?>

<!-- Grid column -->
<div class="col-md-3 mb-3">
	<ul class="list-group">
		<li class="list-group-item primary-color white-text">TUTORIAL PARA INSCRIBIRSE</li>
		<li class="list-group-item">

			<!-- Grid row -->
			<div class="row">

				<!-- Grid column -->
				<div class="col-lg-12 col-md-12">

					<!--Modal: Name-->
					<div class="modal fade" id="modal1" tabindex="-1" role="dialog" aria-labelledby="myModalLabel"
						 aria-hidden="true">
						<div class="modal-dialog modal-lg" role="document">

							<!--Content-->
							<div class="modal-content">

								<!--Body-->
								<div class="modal-body mb-0 p-0">

									<div class="embed-responsive embed-responsive-16by9 z-depth-1-half">
										<iframe class="embed-responsive-item"
												src="https://www.youtube.com/embed/gC2nPaI_ELU"
												allowfullscreen></iframe>
									</div>

								</div>

							</div>
							<!--/.Content-->

						</div>
					</div>
					<!--Modal: Name-->

					<a><img class="img-fluid z-depth-1" src="https://mdbootstrap.com/img/screens/yt/screen-video-1.jpg"
							alt="video"
							data-toggle="modal" data-target="#modal1"></a>

				</div>
				<!-- Grid column -->


			</div>
			<!-- Grid row -->


		</li>

	</ul>

	<br>

	<ul class="list-group">
		<li class="list-group-item primary-color white-text">DISCIPLINAS DISPONIBLES EN ESTE CICLO</li>

		<li class="list-group-item">
			<?php
			$n_ = true;

			foreach ($disciplina as $value):
				if ($value->active && !$value->addressed):
					$n_ = false;
					?>
					<p class="blockquote-footer">
						<?= $value->disciplina ?>
						<span class="badge badge-primary badge-pill"><?= $value->escuela ?></span>

					</p>
				<?php
				endif;
			endforeach;
			if ($n_):
				?>
				<p class="blockquote-footer">
					Por el momento no hay ninguno disponible
				</p>
			<?php
			endif;
			?>

		</li>
		<li class="list-group-item primary-color text-white text-center">
			<div class="md-v-line"></div>
			<i class="fas fa-angle-double-up"></i> &ensp;SOLO ESTUDIANTES
		</li>

		<li class="list-group-item">

			<?php
			$n_ = true;
			foreach ($disciplina as $value):
				if ($value->active && $value->addressed):
					$n_ = false;
					?>
					<p class="blockquote-footer">
						<?= $value->disciplina ?>
						<span class="badge badge-primary badge-pill"><?= $value->escuela ?></span>

					</p>
				<?php

				endif;
			endforeach;
			if ($n_):
				?>
				<p class="blockquote-footer">
					Por el momento no hay ninguno disponible.
				</p>

			<?php
			endif;
			?>

		</li>
		<li class="list-group-item primary-color text-white text-center">
			<div class="md-v-line"></div>
			<i class="fas fa-angle-double-up"></i> &ensp; SOLO ADULTOS
		</li>


	</ul>
	<br>
	<ul class="list-group">
		<li class="list-group-item primary-color white-text">BASES Y TERMINOS PARA EL TALLER</li>
		<li class="list-group-item">
			<p class="blockquote-footer">Los talleres están formados por una serie de temas detallados en el Programa de
				Talleres Educativas de la Municipalidad Provicial de Carabaya.
			</p>
		</li>
		<li class="list-group-item">
			<p class="blockquote-footer">Los talleres se habilitarán para su incripción de acuerdo a las
				fechas establecido, por la comisión.
			</p>
		</li>
		<li class="list-group-item">
			<p class="blockquote-footer">Cada vez que se habilite un taller nuevo para incripciones, estará disponile
				para consultas los números publicados en esta aplicación web.
			</p>
		</li>
	</ul>

</div>
<!-- Grid column -->

