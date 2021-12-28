<?php defined('BASEPATH') or exit('No direct script access allowed');
$this->load->view('users/template/header');
?>

<?php if ($this->session->flashdata('message')): ?>


	<div class="alert alert-success alert-dismissible fade show" role="alert">
		<div class="text-center"><?php echo $this->session->flashdata('message'); ?></div>
		<a type="button" class="close" data-dismiss="alert" aria-label="Close">
			<span aria-hidden="true">&times;</span>
		</a>
	</div>

<?php endif; ?>


<!-- Section heading -->

<h2 class="text-center h2-responsive pt-4 mb-1">
	<?= $title ?>
</h2>

<hr>

<!-- Grid row -->
<div class="row pt-lg-3 pt-2">

	<!-- Grid column -->
	<div class="col-md-8 ml-xl-5">

		<div class="list-group" id="relo">

			<div class="">

				<ul class="nav nav-tabs md-tabs primary-color shadow-none" id="myTabEx" role="tablist">
					<li class="nav-item">
						<a class="nav-link active show" id="home-tab-ex" data-toggle="tab" href="#home-ex" role="tab"
						   aria-controls="home-ex"
						   aria-selected="true" style="width: 220px;">
							<i class="fas fa-graduation-cap"></i> &ensp; ESTUDIANTES
						</a>
					</li>
					<li class="nav-item">
						<a class="nav-link" id="profile-tab-ex" data-toggle="tab" href="#profile-ex" role="tab"
						   aria-controls="profile-ex"
						   aria-selected="false" style="width: 220px;">
							<i class="fas fa-user-tie"></i> &ensp; ADULTOS
						</a>
					</li>

				</ul>

				<div class="tab-content pt-5 border border-light" id="myTabContentEx">
					<div class="tab-pane fade active show" id="home-ex" role="tabpanel" aria-labelledby="home-tab-ex">


						<div id="carousel-example-multi" class="carousel slide carousel-multi-item v-2"
							 data-ride="carousel">

							<!-- Indicators -->
							<ol class="carousel-indicators">
								<?php
								$slide = 0;
								foreach ($poster_img as $item):
									if ($item->active && !$item->addressed):
										if ($slide == 0):
											?>
											<li data-target="#carousel-example-multi" data-slide-to="<?= $slide ?>"
												class="active"></li>
										<?php
										else:
											?>
											<li data-target="#carousel-example-multi"
												data-slide-to="<?= $slide ?>"></li>
										<?php
										endif;
									endif;
									$slide++;
								endforeach;

								?>
							</ol>
							<!--/.Indicators-->

							<div class="carousel-inner v-2" role="listbox">
								<?php
								$active = 1;
								foreach ($poster_img as $item):
									if ($item->active && !$item->addressed):
										?>
										<div class="carousel-item <?= $active == 1 ? 'active' : '' ?>">
											<div class="col-12 col-md-6">
												<div class="card mb-2">
													<img class="card-img-top"
														 src="<?= base_url() ?>assets/users/img/poster/ciclo-medio-2020/<?= $item->poster_img ?>"
														 alt="Card image cap">
													<div class="card-body">
														<h4 class="card-title"
															style="text-align: center"><?= strtoupper($item->title) ?></h4>
														<p class="card-text"><?= $item->description ?></p>
													</div>
												</div>
											</div>
										</div>
									<?php
										$active++;
									endif;
								endforeach;
								?>

							</div>

						</div>


						<p class="note note-success">Si estudias en algunas de la
							Instituciones Educativas de
							Macusani, sigue
							por botón de abajo haciendo clic.</p>

						<a href="<?= base_url() ?>users/inscripciones/add/1" class="btn btn-dark-green" id="btn-one">IR
							A INSCRIBIRME</a>

					</div>

					<div class="tab-pane fade" id="profile-ex" role="tabpanel" aria-labelledby="profile-tab-ex">

						<div id="carousel-example-multi_1" class="carousel slide carousel-multi-item v-2"
							 data-ride="carousel">

							<!-- Indicators -->
							<ol class="carousel-indicators">
								<?php
								$slide_1 = 0;
								foreach ($poster_img as $item):
									if ($item->active && $item->addressed):
										if ($slide_1 == 0):
											?>
											<li data-target="#carousel-example-multi_1" data-slide-to="<?= $slide_1 ?>"
												class="active"></li>
										<?php
										else:
											?>
											<li data-target="#carousel-example-multi_1"
												data-slide-to="<?= $slide_1 ?>"></li>
										<?php
										endif;
										$slide_1++;
									endif;

								endforeach;

								?>
							</ol>
							<!--/.Indicators-->

							<div class="carousel-inner v-2" role="listbox">
								<?php
								$active_1 = 1;
								foreach ($poster_img as $item):

									if ($item->active && $item->addressed):
										?>
										<div class="carousel-item <?= $active_1 == 1 ? 'active' : '' ?>">
											<div class="col-12 col-md-6">
												<div class="card mb-2">
													<img class="card-img-top"
														 src="<?= base_url() ?>assets/users/img/poster/ciclo-medio-2020/<?= $item->poster_img ?>"
														 alt="Card image cap">
													<div class="card-body">
														<h4 class="card-title"
															style="text-align: center"><?= strtoupper($item->title) ?></h4>
														<p class="card-text"><?= $item->description ?></p>
													</div>
												</div>
											</div>
										</div>
									<?php
										$active_1++;
									endif;
								endforeach;
								?>

							</div>

						</div>

						<p class="note note-success" >Si eres mayor de edad y tienes interes
							de aprender nuevas
							habilidades sigue
							haciendo clic en el botón de abajo.</p>

						<div class="alert alert-success" role="alert">
							<h4 class="alert-heading">¡Aviso!</h4>
							<p>Inscripciones en <b>Gatronomía y cardio</b> ya no esta disponible, llegamos al limite de personas
								inscritas.</p>
<!--							<p>Te invitamos a participar en <b>Cardio</b>.</p>-->
							<hr>
							<p class="mb-0">Gracias por su comprensión.</p>
						</div>

						<a href="<?= base_url() ?>users/inscripciones/add/2" class="btn btn-dark-green" id="btn-one">IR
							A INSCRIBIRME</a>
					</div>

				</div>

			</div>

		</div>
		<br>

	</div>
	<!-- Grid Column -->


	<?php
	$this->load->view("users/form/sidebar_form")
	?>


	<?php
	$this->load->view('users/template/footer');
	?>
