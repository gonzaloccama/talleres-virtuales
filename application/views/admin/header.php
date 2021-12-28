<!DOCTYPE html>
<html lang="es">

<head>

	<meta charset="utf-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
	<meta name="description" content="">
	<meta name="author" content="">

	<title>Dashboard | Cultura y Deporte</title>

	<!-- Custom fonts for this template-->
	<link href="<?= $this->config->item('assetadmin_url') ?>vendor/fontawesome-free/css/all.min.css" rel="stylesheet"
		  type="text/css">
	<link href="https://fonts.googleapis.com/css?family=Nunito:200,200i,300,300i,400,400i,600,600i,700,700i,800,800i,900,900i"
		  rel="stylesheet">

	<!-- Custom styles for this template-->
	<link href="<?= $this->config->item('assetadmin_url') ?>css/sb-admin-2.min.css" rel="stylesheet">

	<!-- Custom styles for this page -->
	<link href="<?= $this->config->item('assetadmin_url') ?>vendor/datatables/dataTables.bootstrap4.min.css"
		  rel="stylesheet">

</head>

<body id="page-top">

<!-- Page Wrapper -->
<div id="wrapper">

	<!-- Sidebar -->
	<ul class="navbar-nav bg-gradient-primary sidebar sidebar-dark accordion" id="accordionSidebar">

		<!-- Sidebar - Brand -->
		<a class="sidebar-brand d-flex align-items-center justify-content-center"
		   href="<?= base_url() ?>">
			<div class="sidebar-brand-icon rotate-n-15">
				<i class="fas fa-laugh-wink"></i>
			</div>
			<div class="sidebar-brand-text mx-3">Cultura y Deporte</div>
		</a>

		<!-- Divider -->
		<hr class="sidebar-divider my-0">

		<!-- Nav Item - Dashboard -->
		<li class="nav-item active">
			<a class="nav-link" href="<?= base_url() ?>admin/dashboard">
				<i class="fas fa-fw fa-tachometer-alt"></i>
				<span>Dashboard</span></a>
		</li>

		<!-- Divider -->
		<hr class="sidebar-divider">

		<!-- Heading -->
		<div class="sidebar-heading">
			Interface
		</div>

		<!-- Nav Item - Pages Collapse Menu -->
		<li class="nav-item">
			<a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapseTwo"
			   aria-expanded="true" aria-controls="collapseTwo">
				<i class="fas fa-fw fa-cog"></i>
				<span>Inscripciones</span>
			</a>
			<div id="collapseTwo" class="collapse" aria-labelledby="headingTwo" data-parent="#accordionSidebar">
				<div class="bg-white py-2 collapse-inner rounded">
					<h6 class="collapse-header">Administrar</h6>
					<a class="collapse-item" href="<?= base_url() ?>admin/estudiante">Estudiantes escolares</a>
					<a class="collapse-item" href="<?= base_url() ?>admin/responsable">Resp. escolares</a>
					<a class="collapse-item" href="<?= base_url() ?>admin/adulto">Estudiantes Mayores</a>
				</div>
			</div>
		</li>

		<!-- Nav Item - Utilities Collapse Menu -->
		<li class="nav-item">
			<a class="nav-link collapsed" href=""
			   data-toggle="collapse" data-target="#collapseUtilities"
			   aria-expanded="true" aria-controls="collapseUtilities">
				<i class="fas fa-fw fa-wrench"></i>
				<span>Disciplinas</span>
			</a>

			<div id="collapseUtilities" class="collapse" aria-labelledby="headingUtilities"
				 data-parent="#accordionSidebar">
				<div class="bg-white py-2 collapse-inner rounded">

					<h6 class="collapse-header">Administar</h6>
					<a class="collapse-item" href="<?= base_url() ?>admin/disciplina/inscritos">Disciplina</a>

					<h6 class="collapse-header">Estudiantes</h6>
					<?php
					$cicle_ = 0;
					foreach ($cicle as $item):
						if ($item->active):
							$cicle_ = $item->id_cicle;
						endif;
					endforeach;

					foreach ($disciplina as $value):
						if (($value->cicle == $cicle_) && !$value->addressed):
							$id_disc = $value->id_disciplina;
							$disc = strtolower($value->disciplina);
							?>
							<a
									class="collapse-item"
									href="<?= base_url() ?>admin/disciplina/mod_estudiante/<?= $id_disc ?>/<?= $disc ?>">
								<?= ucfirst(strtolower($value->disciplina)) ?>

								<?php if ($value->active == 0): ?>
									<span style="font-size: 11px; color: #fd9090;">(<?= "cerrado" ?>)</span>
								<?php else: ?>
									<span style="font-size: 11px; color: #426ec8;">(<?= "abierto" ?>)</span>
								<?php endif; ?>

							</a>
						<?php
						endif;
					endforeach;
					?>


					<h6 class="collapse-header">Adultos</h6>

					<?php
					foreach ($disciplina as $value):
						if (($value->cicle == $cicle_) && $value->addressed):
							$id_disc = $value->id_disciplina;
							$disc = strtolower($value->disciplina);
							?>
							<a
									class="collapse-item"
									href="<?= base_url() ?>admin/disciplina/mod_adulto/<?= $id_disc ?>/<?= $disc ?>">
								<?= ucfirst(strtolower($value->disciplina)) ?>
								<?php
								if ($value->active == 0)    :
									?>
									<span style="font-size: 11px; color: #fd9090;">(<?= "cerrado" ?>)</span>
								<?php
								endif;
								?>
							</a>
						<?php
						endif;
					endforeach;
					?>


				</div>
			</div>
		</li>

		<!-- Divider -->
		<hr class="sidebar-divider">

		<!-- Heading -->
		<div class="sidebar-heading">
			Addons
		</div>

		<!-- Nav Item - Pages Collapse Menu -->
		<li class="nav-item">
			<a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapsePages"
			   aria-expanded="true" aria-controls="collapsePages">
				<i class="fas fa-fw fa-folder"></i>
				<span>Intitución</span>
			</a>
			<div id="collapsePages" class="collapse" aria-labelledby="headingPages" data-parent="#accordionSidebar">
				<!--				<div class="bg-white py-2 collapse-inner rounded">-->
				<!--					<h6 class="collapse-header">Login Screens:</h6>-->
				<!--					<a class="collapse-item" href="login.html">Login</a>-->
				<!--					<a class="collapse-item" href="register.html">Register</a>-->
				<!--					<a class="collapse-item" href="forgot-password.html">Forgot Password</a>-->
				<!--					<div class="collapse-divider"></div>-->
				<!--					<h6 class="collapse-header">Other Pages:</h6>-->
				<!--					<a class="collapse-item" href="404.html">404 Page</a>-->
				<!--					<a class="collapse-item" href="blank.html">Blank Page</a>-->
				<!--				</div>-->
			</div>
		</li>

		<!-- Nav Item - Charts -->
		<li class="nav-item">
			<a class="nav-link" href="">
				<i class="fas fa-fw fa-chart-area"></i>
				<span>Escuela</span></a>
		</li>

		<!-- Nav Item - Tables -->
		<li class="nav-item">
			<a class="nav-link" href="">
				<i class="fas fa-fw fa-table"></i>
				<span>Especialidad</span></a>
		</li>

		<!-- Divider -->
		<hr class="sidebar-divider d-none d-md-block">

		<!-- Sidebar Toggler (Sidebar) -->
		<div class="text-center d-none d-md-inline">
			<button class="rounded-circle border-0" id="sidebarToggle"></button>
		</div>

	</ul>
	<!-- End of Sidebar -->

	<!-- Content Wrapper -->
	<div id="content-wrapper" class="d-flex flex-column">

		<!-- Main Content -->
		<div id="content">
