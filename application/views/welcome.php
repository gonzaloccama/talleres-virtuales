<?php
defined('BASEPATH') or exit('No direct script access allowed');
$this->load->view('users/template/header');
?>


<?php if ($this->session->flashdata('message')): ?>

	<div class="alert alert-success" role="alert">

		<button type="button" class="close" data-close="alert"></button>

		<?php echo $this->session->flashdata('message'); ?>
	</div>

<?php endif; ?>

<!-- Blog -->
<div class="row mt-5 pt-3">

	<!-- Main listing -->
	<div class="col-lg-8 col-12 mt-1 mx-lg-4">

		<!-- Section: Blog v.3 -->
		<section class="pb-3 text-center text-lg-left">

			<?php
			foreach ($results as $post):
				?>
				<!-- Grid row -->
				<div class="row mb-4">

					<!-- Grid column -->
					<div class="col-md-12">
						<!-- Card -->
						<div class="card">

							<!-- Card image -->
							<div class="view overlay">
								<img src="<?= base_url().'upload/blog/'.$post->image ?>"
									 class="card-img-top"
									 alt="">
								<a>
									<div class="mask rgba-white-slight"></div>
								</a>
							</div>
							<!-- Card image -->

							<!-- Card content -->
							<div class="card-body mx-4">
								<!-- Title -->
								<h4 class="card-title text-center">
									<a href="<?= base_url() . "Welcome/post/" . $post->id_post ?>"><?= $post->title ?></a>
								</h4>
								<hr>
								<!-- Text -->
								<?= $post->summary ?>
								<br>
								<hr>
								<p class="font-small font-weight-bold blue-grey-text mb-1">
									<i class="far fa-clock-o"></i> <?= $post->date ?>
									<i class="font-small dark-grey-text mb-0 font-weight-bold pull-right"><?= $post->author ?></i>
								</p>

								<p class="text-right mb-0 text-uppercase dark-grey-text font-weight-bold">
									<a class="btn btn-sm btn-outline-primary waves-effect" href="<?= base_url() . "welcome/post/" . $post->id_post ?>">Leer más
										<i class="fas fa-chevron-right" aria-hidden="true"></i>
									</a>
								</p>
							</div>
							<!-- Card content -->

						</div>
						<!-- Card -->

					</div>
					<!-- Grid column -->

				</div>
				<!-- Grid row -->
			<?php
			endforeach;
			?>

		</section>
		<!-- Section: Blog v.3 -->

		<!-- Pagination dark grey -->

		<div class="mb-5 pb-2">
			<?= $this->pagination_bootstrap->render() ?>
		</div>

		<!-- Pagination dark grey -->

		<!--		--><?php //echo $links; ?>

	</div>
	<!-- Main listing -->

	<!--							BEGIN SIDEBAR-->
	<?php
	$this->load->view('users/template/sidebar');
	?>
	<!--							END SIDEBAR-->

</div>
<!-- Blog -->

<?php
$this->load->view('users/template/footer');
?>
