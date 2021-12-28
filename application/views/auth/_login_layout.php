<!DOCTYPE html>
<html lang="en">

<head>

	<meta charset="utf-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
	<meta name="description" content="">
	<meta name="author" content="">

	<title>Login | Cultura y Deporte</title>

	<!-- Custom fonts for this template-->
	<link href="<?= $this->config->item('assetadmin_url') ?>vendor/fontawesome-free/css/all.min.css" rel="stylesheet"
		  type="text/css">
	<link href="https://fonts.googleapis.com/css?family=Nunito:200,200i,300,300i,400,400i,600,600i,700,700i,800,800i,900,900i"
		  rel="stylesheet">

	<!-- Custom styles for this template-->
	<link href="<?= $this->config->item('assetadmin_url') ?>css/sb-admin-2.min.css" rel="stylesheet">


</head>

<body class="bg-gradient-primary">

<div class="container">

	<!-- Outer Row -->
	<div class="row justify-content-center">

		<div class="col-md-5">

			<div class="card o-hidden border-0 shadow-lg my-5">
				<div class="card-body p-0">
					<!-- Nested Row within Card Body -->
					<div class="row">
						<!--						<div class="col-lg-6 d-none d-lg-block bg-login-image"></div>-->
						<div class="col-lg-12">
							<div class="p-5">
								<?php
								echo validation_errors();
								?>
								<div class="text-center">
									<h1 class="h4 text-gray-900 mb-4">¡Bienvenidos!</h1>
								</div>
								<form action="<?= base_url() ?>admin/auth/validate" class="needs-validation user"
									  novalidate method="post" enctype="multipart/form-data" id="form_login">

									<hr>

									<div class="form-group" id="email">
										<!--										<label for="email">Correo</label>-->
										<input type="email" class="form-control form-control-user" name="email"
											   aria-describedby="emailHelp" placeholder="Ingrese su e-mail..."

											   value="<?php echo set_value("email"); ?>">

										<div class="invalid-feedback container">

										</div>

									</div>

									<hr>

									<div class="form-group" id="password">
										<!--										<label for="password">Contraseña</label>-->
										<input type="password" class="form-control form-control-user" name="password"
											   placeholder="Contraseña..."
											   value="<?php echo set_value("password"); ?>">

										<div class="invalid-feedback container"></div>

									</div>

									<hr>

									<input type="submit" class="btn btn-primary btn-user btn-block"
										   value="Iniciar session">
									<hr>

									<div class="session-invalid"></div>

								</form>

							</div>
						</div>
					</div>
				</div>
			</div>

		</div>

	</div>

</div>


<!-- Bootstrap core JavaScript-->
<script src="<?= $this->config->item('assetadmin_url') ?>vendor/jquery/jquery.min.js"></script>
<script src="<?= $this->config->item('assetadmin_url') ?>vendor/bootstrap/js/bootstrap.bundle.min.js"></script>

<!-- Core plugin JavaScript-->
<script src="<?= $this->config->item('assetadmin_url') ?>vendor/jquery-easing/jquery.easing.min.js"></script>

<!-- Custom scripts for all pages-->
<script src="<?= $this->config->item('assetadmin_url') ?>js/sb-admin-2.min.js"></script>

<script>

	$(document).ready(function () {
		$('#form_login').submit(function (e) {
			//alert("hola");
			e.preventDefault();

			$("#email > input").removeClass("is-invalid");
			$("#password > input").removeClass("is-invalid");
			$('.session-invalid').html('')

			$.ajax({
				url: "<?= base_url() ?>admin/auth/validate",
				type: 'POST',
				data: $(this).serialize(),
				success: function (data) {
					data = JSON.parse(data);
					console.log(data);
					window.location.replace(data.url);
				},
				// error: function (xhr) {
				// 	$("#email > input").removeClass('is-invalid');
				// 	$("#password > input").removeClass('is-invalid');
				//
				// 	if (xhr.status == 400) {
				// 		var json = JSON.parse(xhr.responseText);
				//
				// 		if (json.email.length != 0) {
				// 			$("#email > div").html(json.email);
				// 			$("#email > input").addClass('is-invalid');
				// 		}
				//
				// 		if (json.password.length != 0) {
				// 			$("#password > div").html(json.password);
				// 			$("#password > input").addClass('is-invalid');
				// 		}
				// 	}
				// 	else if (xhr.status == 401)
				// 	{
				// 		var json = JSON.parse(xhr.responseText);
				//
				// 		$('.session-invalid').html(
				// 				`
				// 				<div class="alert alert-danger user" role="alert">
				// 					${json.msg}
				// 				</div>
				// 				`
				// 		);
				//
				// 		console.log(json);
				// 	}
				// },
				statusCode: {


					400: function (xhr) {


						var json = JSON.parse(xhr.responseText);

						if (json.email.length) {
							$("#email > div").html(json.email);
							$("#email > input").addClass('is-invalid');
						}

						if (json.password.length) {
							$("#password > div").html(json.password);
							$("#password > input").addClass('is-invalid');
						}
					},
					401: function (xhr) {
						var json = JSON.parse(xhr.responseText);
						$('.session-invalid').html(
								`
									<div class="alert alert-danger user" role="alert">
										${json.msg}
									</div>
								`
						);
					}
				}
			});
		});
	});

</script>


</body>

</html>
