<?php defined('BASEPATH') OR exit('No direct script access allowed');
$this->load->view('users/template/header');
?>

<!-- Blog -->
<div class="row mt-5 pt-3">

	<!-- Main listing -->
	<div class="col-lg-8 col-12 mt-1 mx-lg-4">

		<!-- Section: Blog v.3 -->
		<section class="pb-5 text-lg-left">

			<!-- Grid row -->
			<div class="row mb-4">

				<!-- Grid column -->
				<div class="col-md-12">

					<!-- Card -->
					<div class="card">

						<!-- Card image -->
						<div class="view overlay">
							<img src="https://mdbootstrap.com/img/Photos/Slides/img%20(29).jpg"
								 class="img-fluid" alt="">
							<a>
								<div class="mask rgba-white-slight"></div>
							</a>
						</div>
						<!-- Card image -->

						<!-- Card content -->
						<div class="card-body">
							<!-- Title -->
							<h4 class="card-title text-center">
								<strong><?= $posts[0]->title ?></strong>
							</h4>
							<hr>
							<label class="font-small font-weight-bold blue-grey-text mb-1 col-md-4">
								<i class="far fa-clock-o"></i> <?= $posts[0]->date ?>
							</label>
							<label class="font-small font-weight-bold blue-grey-text mb-1 col-md-4">
								<i class="far fa-clock-o"></i> <?= $posts[0]->author ?>
							</label>
							<label class="font-small font-weight-bold blue-grey-text mb-1 col-md-3">
								<i class="far fa-clock-o"></i> <?= $posts[0]->category ?>
							</label>
							<hr>
							<!-- Text -->
							<p class="dark-grey-text mb-3 mt-4 mx-4"><?= $posts[0]->summary ?></p>

							<!-- Grid row -->
							<div class="row mx-4 mt-3">

<!--								<p class="dark-grey-text article"></p>-->

								<h5 class="mt-3 mb-4">
									<strong>Lorem ipsum dolor sit amet</strong>
								</h5>



								<p class="dark-grey-text article"><?= $posts[0]->content ?></p>

								<blockquote class="blockquote mx-md-5 mx-1">
									<p class="mb-0">"Lorem ipsum dolor sit amet, consectetur adipiscing
										elit..."</p>
								</blockquote>



							</div>
							<!-- Grid row -->

							<!-- Grid row -->
							<div class="row my-3 mx-3">

								<!-- Grid column -->
								<div class="col-md-6 mb-3">

									<img src="https://mdbootstrap.com/img/Photos/Others/square/19.jpg"
										 class="img-fluid z-depth-1 rounded-0" alt="sample image">

								</div>
								<!-- Grid column -->

								<!-- Grid column -->
								<div class="col-md-6">

									<img src="https://mdbootstrap.com/img/Photos/Others/square/10.jpg"
										 class="img-fluid z-depth-1 rounded-0" alt="sample image">

								</div>
								<!-- Grid column -->

							</div>
							<!-- Grid row -->

							<hr>

							<!-- Grid row -->
							<div class="row mb-4">

								<!-- Grid column -->
								<div class="col-md-12 text-center">

									<h4 class="text-center font-weight-bold dark-grey-text mt-3 mb-3">
										<strong>Compartir publicación: </strong>
									</h4>

									<button type="button" class="btn btn-fb btn-sm">
										<i class="fab fa-facebook-f left"></i> Facebook
									</button>
									<!-- WhatsApp -->
									<button type="button" class="btn btn-whatsapp btn-sm">
										<i class="fab fa-whatsapp left"></i> WhatsApp
									</button>

								</div>
								<!-- Grid column -->

							</div>
							<!-- Grid row -->

						</div>
						<!-- Card content -->

					</div>
					<!-- Card -->

				</div>
				<!-- Grid column -->

			</div>
			<!-- Grid row -->

		</section>
		<!-- Section: Blog v.3 -->

	</div>
	<!-- Main listing -->

<!--	BEGIN SIDEBAR-->
	<?php
	$this->load->view('users/template/sidebar');
	?>
<!--	END SIDEBAR-->

</div>
<!-- Blog -->

<?php
$this->load->view('users/template/footer');
?>
