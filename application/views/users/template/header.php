<!DOCTYPE html>
<html lang="es">

<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
	<meta http-equiv="x-ua-compatible" content="ie=edge">
	<title>Educación, Cultura y Deporte</title>

	<!-- MDB icon -->
	<link rel="icon" href="<?= $this->config->item('assetusers_url') ?>img/carabaya-favicon.ico" type="image/x-icon">
	<!-- Font Awesome -->
	<link rel="stylesheet" href="<?= $this->config->item('asset_url') ?>fontawesome/css/all.css">
	<!-- Google Fonts Roboto -->
	<link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Roboto:300,400,500,700&display=swap">
	<!-- Bootstrap core CSS -->
	<link rel="stylesheet" href="<?= $this->config->item('assetusers_url') ?>css/bootstrap.min.css">
	<!-- Material Design Bootstrap -->
	<link rel="stylesheet" href="<?= $this->config->item('assetusers_url') ?>css/mdb.min.css">
	<!-- Your custom styles (optional) -->
	<link rel="stylesheet" href="<?= $this->config->item('assetusers_url') ?>css/style.css">


	<style type="text/css">

	</style>

</head>

<body class="">

<!-- Main Navigation -->
<header>

	<!-- Navbar -->
	<nav class="navbar fixed-top navbar-expand-lg navbar-dark scrolling-navbar" style="background-color: #3f752b;">
		<div class="container-fluid justify-content-center align-items-center">
			<a class="navbar-brand" href="<?= base_url() ?>">
				<img src="<?= $this->config->item('assetusers_url') ?>img/carabaya.png" alt=""
					 style="height: 35px; padding-left: 20px; padding-right: 20px;padding-bottom: -20px;padding-top: -20px; position: relative;">
			</a>
			<a class="navbar-brand" href="<?= base_url() ?>"><strong>CULTURA Y DEPORTE</strong></a>
			<button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent"
					aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
				<span class="navbar-toggler-icon"></span>
			</button>
			<div class="collapse navbar-collapse" id="navbarSupportedContent">
				<ul class="navbar-nav mr-auto">
					<li class="nav-item ml-4 mb-0 hover-main">
						<a href="<?= base_url() ?>"
						   class="nav-link white-text disabled" id="" data-toggle="" aria-haspopup="true"
						   aria-expanded="false">
							INICIO
						</a>
					</li>
					<li class="nav-item dropdown ml-4 mb-0 hover-main">
						<a class="nav-link dropdown-toggle white-text"
						   id="navbarDropdownMenuLink-1" data-toggle="dropdown" aria-haspopup="true"
						   aria-expanded="false"> INCRIPCIONES </a>
						<div class="dropdown-menu dropdown-menu-right" aria-labelledby="navbarDropdownMenuLink-1">
							<a class="dropdown-item waves-effect waves-light"
							   href="<?= base_url() ?>users/inscripciones">TALLERES VIRTUALES DE MEDIO AÑO</a>

						</div>
					</li>
					<li class="nav-item ml-4 mb-0 hover-main">
						<a href="<?= base_url() ?>Welcome/about" class="nav-link white-text disabled" id=""
						   data-toggle=""
						   aria-haspopup="true">NOSOTROS</a>

					</li>
					<li class="nav-item ml-4 mb-0 hover-main" id="">
						<a class="nav-link white-text disabled" href="<?= base_url() ?>Welcome/contact">CONTACTANOS
							<span class="sr-only">(current)</span>
						</a>
					</li>
				</ul>
				<ul class="navbar-nav ml-auto nav-flex-icons">

					<li class="nav-item">
						<a class="nav-link waves-effect waves-light white-text">
							<i class="fab fa-whatsapp"></i>
						</a>
					</li>
					<li class="nav-item">
						<a class="nav-link waves-effect waves-light white-text">
							<i class="fab fa-facebook-f"></i>
						</a>
					</li>
					<li class="nav-item">
						<a href="<?= base_url() ?>admin/dashboard" class="nav-link waves-effect waves-light white-text">
							<?php
							if ($this->session->userdata('is_logged')):
								?>
								<span><?= $this->session->userdata('user') ?></span>
							<?php
							else:
								?>
								<span>Login</span>
							<?php
							endif;
							?>
						</a>
					</li>
				</ul>
			</div>
		</div>
	</nav>


	<!-- Navbar -->

	<section>
		<!--		<div class="">-->
		<!--			<img src="https://mdbootstrap.com/img/Photos/Others/nature4.jpg" style="width: 100%">-->
		<!--		</div>-->
		<div id="carouselExampleSlidesOnly" class="carousel slide" data-ride="carousel">
			<div class="carousel-inner">
				<div class="carousel-item active view">
					<img src="<?= $this->config->item('asset_url') ?>users/img/slide/macusani.jpg" style="width: 100%"
						 class="img-fluid" alt="">
					<div class="mask pattern-6 flex-center">

					</div>
				</div>
				<div class="carousel-item view">
					<img src="<?= $this->config->item('asset_url') ?>users/img/slide/estudiante.jpeg"
						 style="width: 100%" class="img-fluid" alt="">
					<div class="mask pattern-6 flex-center">

					</div>
				</div>
			</div>
		</div>
	</section>


</header>
<!-- Main Navigation -->

<!-- Main Layout -->
<main>

	<div class="container-fluid mt-md-0 mt-5 mb-5">

		<!-- Grid row -->
		<div class="row" style="margin-top: -100px;">

			<!-- Grid column -->
			<div class="col-md-12 px-lg-5">
				<!-- Card -->
				<div class="card pb-5 mx-md-3">
					<div class="card-body">


