<!-- Sidebar -->
<div class="col-lg-3 col-12 mt-1">

	<!-- Card -->
	<div class="card">

		<!-- Card image -->
		<div class="view overlay">
			<img src="<?= base_url().'assets/users/img/fabio.jpg' ?>" class="card-img-top"
				 alt="">
			<a>
				<div class="mask rgba-white-slight"></div>
			</a>
		</div>
		<!-- Card image -->

		<!-- Card content -->
		<div class="card-body">
			<!-- Title -->
			<h5 class="card-title dark-grey-text text-center grey lighten-4 py-2">
				<strong>Fabio Vargas Huamantuco</strong>
			</h5>

			<!-- Description -->
			<p class="mt-3 dark-grey-text font-small text-center">
				<em>Una ciudad moderna, una Provincia de carabaya Competitiva, segura y con sostenibilidad economica.</em>
			</p>

			<ul class="list-unstyled list-inline-item circle-icons list-unstyled flex-center">
				<!-- Facebook -->
				<li>
					<a class="fb-ic">
						<i class="fab fa-facebook-f"> </i>
					</a>
				</li>
				<!-- Twitter -->
				<li>
					<a class="tw-ic">
						<i class="fab fa-twitter mx-3"> </i>
					</a>
				</li>
				<!-- Google + -->
				<li>
					<a class="gplus-ic">
						<i class="fab fa-google-plus-g"> </i>
					</a>
				</li>
			</ul>
		</div>
		<!-- Card content -->

	</div>
	<!-- Card -->

	<!-- Section: Featured posts -->
	<section class="section widget-content mt-5">

		<!--  Card -->
		<div class="card card-body pb-0">
			<div class="single-post">

				<p class="font-weight-bold dark-grey-text text-center spacing grey lighten-4 py-2 mb-4">
					<strong>PUBLICACIONES POPULARES</strong>
				</p>

				<?php
				foreach ($popular as $post):
					?>
					<!-- Grid row -->
					<div class="row mb-4">
						<div class="col-5">

							<!-- Image -->
							<div class="view overlay">
								<img src="https://mdbootstrap.com/img/Photos/Others/photo13.jpg"
									 class="img-fluid z-depth-1 rounded-0" alt="sample image">
								<a>
									<div class="mask waves-light"></div>
								</a>
							</div>
						</div>

						<!-- Excerpt -->
						<div class="col-7">
							<p class="mt-0 font-small" style="font-size: 12px;">
								<a href="<?= base_url()."Welcome/post/".$post->id_post ?>">
									<?= $post->title ?>
								</a>
							</p>

							<div class="post-data">
								<p class="font-small grey-text mb-0" style="font-size: 12px">
									<i class="far fa-clock-o"></i> <?= $post->date ?></p>
							</div>
						</div>
						<!--  Excerpt -->
					</div>
					<!--  Grid row -->

				<?php
				endforeach;
				?>

			</div>


		</div>
	</section>
	<!--  Section: Featured posts -->

	<!-- Newsletter -->
	<!--	<section class="my-5">-->
	<!---->
	<!--		<div class="card card-body pb-0">-->
	<!--			<div class="single-post">-->
	<!---->
	<!--				<p class="font-weight-bold dark-grey-text text-center spacing grey lighten-4 py-2 mb-4">-->
	<!--					<strong>NEWSLETTER</strong>-->
	<!--				</p>-->
	<!---->
	<!--			-->
	<!--				<div class="row mt-4">-->
	<!---->
	<!--					-->
	<!--					<div class="col-md-12">-->
	<!---->
	<!--						<div class="input-group md-form form-sm form-3 pl-0">-->
	<!--							<div class="input-group-prepend">-->
	<!--													<span class="input-group-text white black-text"-->
	<!--														  id="basic-addon9">@</span>-->
	<!--							</div>-->
	<!--							<input type="text"-->
	<!--								   class="form-control mt-0 black-border rgba-white-strong"-->
	<!--								   placeholder="Username" aria-describedby="basic-addon9">-->
	<!--						</div>-->
	<!---->
	<!--						<button type="button" class="btn btn-grey btn-block my-4">Sign up</button>-->
	<!---->
	<!--					</div>-->
	<!--					-->
	<!---->
	<!--				</div>-->
	<!--				-->
	<!---->
	<!--			</div>-->
	<!--		</div>-->
	<!---->
	<!--	</section>-->
	<!-- Newsletter -->

	<!-- Archive -->
	<!--	<section class="archive mb-5 my-5">-->
	<!---->
	<!--		-->
	<!--		<div class="card card-body pb-0">-->
	<!--			<div class="single-post">-->
	<!---->
	<!--				<p class="font-weight-bold dark-grey-text text-center spacing grey lighten-4 py-2 mb-4">-->
	<!--					<strong>ARCHIVE</strong>-->
	<!--				</p>-->
	<!---->
	<!--				-->
	<!--				<div class="row mb-4">-->
	<!---->
	<!--					-->
	<!--					<div class="col-md-12 text-center">-->
	<!---->
	<!--						-->
	<!--						<ul class="list-unstyled">-->
	<!--							<li>-->
	<!--								<p class="mb-1">-->
	<!--									<a href="#!" class="dark-grey-text">August 2016</a>-->
	<!--								</p>-->
	<!--							</li>-->
	<!--							<li>-->
	<!--								<p class="mb-1">-->
	<!--									<a href="#!" class="dark-grey-text">July 2016</a>-->
	<!--								</p>-->
	<!--							</li>-->
	<!--							<li>-->
	<!--								<p class="mb-1">-->
	<!--									<a href="#!" class="dark-grey-text">June 2016</a>-->
	<!--								</p>-->
	<!--							</li>-->
	<!--							<li>-->
	<!--								<p class="mb-1">-->
	<!--									<a href="#!" class="dark-grey-text">May 2016</a>-->
	<!--								</p>-->
	<!--							</li>-->
	<!--							<li>-->
	<!--								<p class="mb-1">-->
	<!--									<a href="#!" class="dark-grey-text">April 2016</a>-->
	<!--								</p>-->
	<!--							</li>-->
	<!--							<li>-->
	<!--								<p class="mb-1">-->
	<!--									<a href="#!" class="dark-grey-text">March 2016</a>-->
	<!--								</p>-->
	<!--							</li>-->
	<!--							<li>-->
	<!--								<p class="mb-1">-->
	<!--									<a href="#!" class="dark-grey-text">Febuary 2016</a>-->
	<!--								</p>-->
	<!--							</li>-->
	<!--						</ul>-->
	<!--						-->
	<!---->
	<!--					</div>-->
	<!--					-->
	<!---->
	<!--				</div>-->
	<!--			-->
	<!---->
	<!--			</div>-->
	<!---->
	<!--		</div>-->
	<!--		-->
	<!---->
	<!--	</section>-->
	<!-- Archive -->

	<!-- Popular posts -->
	<!--	<section class="mb-4">-->
	<!---->
	<!--		<div class="row mt-4">-->
	<!---->
	<!--			-->
	<!--			<div class="col-md-12 col-lg-12">-->
	<!---->
	<!--			-->
	<!--				<div class="card text-left mb-3">-->
	<!---->
	<!--					<div class="view overlay">-->
	<!--						<div class="embed-responsive embed-responsive-16by9">-->
	<!--							<iframe class="embed-responsive-item"-->
	<!--									src="https://www.youtube.com/embed/v64KOxKVLVg"-->
	<!--									allowfullscreen></iframe>-->
	<!--						</div>-->
	<!--						<a>-->
	<!--							<div class="mask rgba-white-slight"></div>-->
	<!--						</a>-->
	<!--					</div>-->
	<!--					-->
	<!--					<div class="card-body mx-2">-->
	<!---->
	<!--						-->
	<!--						<a>-->
	<!--							<h5 class="card-title text-center my-2">-->
	<!--								<strong>Visit my YouTube channel!</strong>-->
	<!--							</h5>-->
	<!--						</a>-->
	<!---->
	<!--					</div>-->
	<!--					-->
	<!---->
	<!--				</div>-->
	<!--				-->
	<!--			</div>-->
	<!--			-->
	<!---->
	<!--		</div>-->
	<!--		-->
	<!---->
	<!--	</section>-->
	<!-- Popular posts -->

	<!-- Section: Categories -->
	<section class="section mb-5 my-5">

		<!-- Card -->
		<div class="card card-body pb-0">
			<div class="single-post">

				<p class="font-weight-bold dark-grey-text text-center spacing grey lighten-4 py-2 mb-4">
					<strong>CATEGORIAS</strong>
				</p>

				<ul class="list-group my-4">
					<?php

					foreach ($categories as $category):
						?>
						<li class="list-group-item d-flex justify-content-between align-items-center" style="font-size: 13px;">
							<a class="">
								<p class="mb-0"><?= $category->category ?></p>
							</a>
							<span class="badge bg-primary badge-pill font-small"><?= rand(5, 15); ?></span>
						</li>
					<?php
					endforeach;
					?>

				</ul>
			</div>

		</div>

	</section>
	<!-- Section: Categories -->

	<!-- Featured posts -->
	<!--	<section class="mb-5">-->
	<!---->
	<!--		<div class="row mt-4">-->
	<!--			-->
	<!--			<div class="col-md-12">-->
	<!---->
	<!--				-->
	<!--				<div id="carousel-example-4" class="carousel slide carousel-fade z-depth-1-half"-->
	<!--					 data-ride="carousel">-->
	<!--					-->
	<!--					<ol class="carousel-indicators">-->
	<!--						<li data-target="#carousel-example-4" data-slide-to="0" class="active"></li>-->
	<!--						<li data-target="#carousel-example-4" data-slide-to="1"></li>-->
	<!--						<li data-target="#carousel-example-4" data-slide-to="2"></li>-->
	<!--					</ol>-->
	<!--					-->
	<!---->
	<!--					-->
	<!--					<div class="carousel-inner" role="listbox">-->
	<!--						-->
	<!--						<div class="carousel-item active">-->
	<!--							-->
	<!--							<div class="view">-->
	<!--								<img src="https://mdbootstrap.com/img/Photos/Horizontal/Nature/8-col/img%20(126).jpg"-->
	<!--									 class="img-fluid" alt="">-->
	<!--								<a href="#!">-->
	<!--									<div class="mask flex-center rgba-stylish-strong"></div>-->
	<!--								</a>-->
	<!--							</div>-->
	<!--							-->
	<!--							<div class="carousel-caption">-->
	<!--								<div class="animated fadeInDown">-->
	<!--									<h4 class="h4-responsive">-->
	<!--										<a href="#!" class="white-text font-weight-bold">Your-->
	<!--											health</a>-->
	<!--									</h4>-->
	<!--									<p>-->
	<!--										<a href="#!" class="white-text">Lorem ipsum</a>-->
	<!--									</p>-->
	<!--								</div>-->
	<!--							</div>-->
	<!--							-->
	<!--						</div>-->
	<!--					-->
	<!--						<div class="carousel-item">-->
	<!--							-->
	<!--							<div class="view">-->
	<!--								<img src="https://mdbootstrap.com/img/Photos/Horizontal/Nature/8-col/img%20(128).jpg"-->
	<!--									 class="img-fluid" alt="">-->
	<!--								<a href="#!">-->
	<!--									<div class="mask flex-center rgba-black-light"></div>-->
	<!--								</a>-->
	<!--							</div>-->
	<!--							-->
	<!--							<div class="carousel-caption">-->
	<!--								<div class="animated fadeInDown">-->
	<!--									<h4 class="h4-responsive">-->
	<!--										<a href="#!" class="white-text font-weight-bold">News-->
	<!--											title</a>-->
	<!--									</h4>-->
	<!--									<p>-->
	<!--										<a href="#!" class="white-text">Lorem ipsum</a>-->
	<!--									</p>-->
	<!--								</div>-->
	<!--							</div>-->
	<!--							-->
	<!--						</div>-->
	<!--						-->
	<!--						<div class="carousel-item">-->
	<!--							-->
	<!--							<div class="view">-->
	<!--								<img src="https://mdbootstrap.com/img/Photos/Horizontal/Nature/8-col/img%20(133).jpg"-->
	<!--									 class="img-fluid" alt="">-->
	<!--								<a href="#!">-->
	<!--									<div class="mask flex-center rgba-black-light"></div>-->
	<!--								</a>-->
	<!--							</div>-->
	<!--							-->
	<!--							<div class="carousel-caption">-->
	<!--								<div class="animated fadeInDown">-->
	<!--									<h4 class="h4-responsive">-->
	<!--										<a href="#!" class="white-text font-weight-bold">News-->
	<!--											title</a>-->
	<!--									</h4>-->
	<!--									<p>-->
	<!--										<a href="#!" class="white-text">Lorem ipsum</a>-->
	<!--									</p>-->
	<!--								</div>-->
	<!--							</div>-->
	<!--							-->
	<!--						</div>-->
	<!--						-->
	<!--					</div>-->
	<!--					-->
	<!--					<a class="carousel-control-prev" href="#carousel-example-4" role="button"-->
	<!--					   data-slide="prev">-->
	<!--						<span class="carousel-control-prev-icon" aria-hidden="true"></span>-->
	<!--						<span class="sr-only">Previous</span>-->
	<!--					</a>-->
	<!--					<a class="carousel-control-next" href="#carousel-example-4" role="button"-->
	<!--					   data-slide="next">-->
	<!--						<span class="carousel-control-next-icon" aria-hidden="true"></span>-->
	<!--						<span class="sr-only">Next</span>-->
	<!--					</a>-->
	<!--					-->
	<!--				</div>-->
	<!--				-->
	<!---->
	<!--			</div>-->
	<!--			<-->
	<!---->
	<!--		</div>-->
	<!--		-->
	<!---->
	<!--	</section>-->
	<!-- Featured posts -->

</div>
<!-- Sidebar -->
