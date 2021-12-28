</div>
<!-- Grid row -->

</div>
<!-- Card -->
</div>
<!-- Grid column -->
</div>
<!-- Grid row -->
</div>

</main>
<!-- Main Layout -->
<?php
date_default_timezone_set('America/Lima');

$date_current = date("Y-m-d H:i:s");
?>

<div aria-live="polite" aria-atomic="true" style="position: fixed; min-height: 100%; float: right;">
	<div class="toast" id="toast-validation" style="position: fixed; top: 220px; right: 0;" data-autohide="false">
		<div class="toast-header" style="background-color: #588364; color: #ecf3ee">

			<strong class="mr-auto">Notificación </strong> &nbsp;&nbsp;
			<small><?= $date_current; ?></small>
			<button type="button" class="ml-2 mb-1 close white-text" data-dismiss="toast" aria-label="Close">
				<span aria-hidden="true">&times;</span>
			</button>
		</div>
		<div class="toast-body text-center" style="background-color: #d2ebd8; color: #155624;">
			<h6><strong>¡Hola!. <span id="name_ins"></span></strong>, usted ya se encuentra inscrito en : <span
						id="disciplina_ins"></span>.</h6>
		</div>
	</div>
</div>


<?php if ($this->session->flashdata('message')): ?>
	<div aria-live="polite" aria-atomic="true" style="position: fixed; min-height: 100%; float: right;">
		<div class="toast" id="toast" style="position: fixed; top: 90px; right: 0;" data-autohide="false">
			<div class="toast-header" style="background-color: #588364; color: #ecf3ee">

				<strong class="mr-auto">Notificación </strong> &nbsp;&nbsp;
				<small><? //= $date_current; ?></small>
				<button type="button" class="ml-2 mb-1 close white-text" data-dismiss="toast" aria-label="Close">
					<span aria-hidden="true">&times;</span>
				</button>
			</div>
			<div class="toast-body text-center" style="background-color: #d2ebd8; color: #155624">
				<h6><?php echo $this->session->flashdata('message'); ?></h6>
			</div>
		</div>
	</div>
<?php endif; ?>

<!-- Footer -->
<footer class="page-footer mt-0 pt-0 text-center text-md-left" style="background-color: #3f752b;">

	<!-- Footer Links -->
	<div class="container">

		<!-- First row -->
		<div class="row">

			<!-- First column -->
			<div class="col-md-12 py-4">

				<div class="footer-socials mb-5 flex-center">

					<!-- Facebook -->
					<a class="fb-ic">
						<i class="fab fa-facebook-f fa-lg white-text mr-md-5 mr-3 fa-lg"> </i>
					</a>
					<!-- Twitter -->
					<a class="tw-ic">
						<i class="fab fa-twitter fa-lg white-text mr-md-5 mr-3 fa-lg"> </i>
					</a>
					<!-- Google + -->
					<a class="gplus-ic">
						<i class="fab fa-google-plus-g fa-lg white-text mr-md-5 mr-3 fa-lg"> </i>
					</a>
					<!-- Linkedin -->
					<a class="li-ic">
						<i class="fab fa-linkedin-in fa-lg white-text mr-md-5 mr-3 fa-lg"> </i>
					</a>
					<!-- Instagram -->
					<a class="ins-ic">
						<i class="fab fa-instagram fa-lg white-text mr-md-5 mr-3 fa-lg"> </i>
					</a>
					<!-- Pinterest -->
					<a class="pin-ic">
						<i class="fab fa-pinterest fa-lg white-text fa-lg"> </i>
					</a>
				</div>
			</div>
			<!-- First column -->
		</div>
		<!-- First row -->
	</div>
	<!-- Footer Links -->


	<!-- Copyright -->
	<div class="footer-copyright text-center py-3">
		<div class="container-fluid">
			© 2020 Copyright: <a href="" target="_blank">
				Municipalidad Provincia de Carabaya </a> <strong>by</strong> <a href="http://onelcn.com"
																				target="_blank">OneLCN</a>
		</div>
	</div>
	<!-- Copyright -->

</footer>
<!-- Footer -->


<!-- SCRIPTS -->
<!-- jQuery -->
<script type="text/javascript" src="<?= $this->config->item('assetusers_url') ?>js/jquery.min.js"></script>
<!-- Bootstrap tooltips -->
<script type="text/javascript" src="<?= $this->config->item('assetusers_url') ?>js/popper.min.js"></script>
<!-- Bootstrap core JavaScript -->
<script type="text/javascript" src="<?= $this->config->item('assetusers_url') ?>js/bootstrap.min.js"></script>
<!-- MDB core JavaScript -->
<script type="text/javascript" src="<?= $this->config->item('assetusers_url') ?>js/mdb.min.js"></script>
<!-- Your custom scripts (optional) -->
<script type="text/javascript"></script>

<script>
	$(function () {
		$('.example-popover').popover({
			container: 'body'
		})
	})


	// popovers initialization - on hover
	$('[data-toggle="popover-hover"]').popover({
		html: true,
		trigger: 'hover',
		placement: 'top',
		content: function () {
			return '<img src="' + $(this).data('img') + '" />';
		}
	});

	// popovers initialization - on click
	$('[data-toggle="popover-click"]').popover({
		html: true,
		trigger: 'click',
		placement: 'bottom',
		content: function () {
			return '<img src="' + $(this).data('img') + '" />';
		}
	});

	$('#btn-one').click(function () {
		$('#btn-one').html('' +
				'<span class="spinner-grow spinner-grow-sm mr-2" role="status" aria-hidden="true"></span>' +
				'Cargando...').addClass('disabled');
	});

	$(document).ready(function () {

		$('#toast').toast('show');

		$('.mdb-select').materialSelect({});

		$("#exampleModalCenter").modal("show");

		$('#disciplina').materialSelect({
			labels: {
				selectAll: "SELECCIONAR TODO <br><span style='color: grey'> NO RECOMENDADO</span>",
				noSearchResults: "No hay resultados",
				optionsSelected: "Opciones seleccionadas"
			},
			selectAll: false,
			maxSelectedOptions: 2,
		});

		$("select#disciplina").change(function () {

			var it = $("select#disciplina option:checked").length - 1;

			if (it > 2) {
				txt = "¡Revisa tu selección!, tienes " + it + " opciones seleccionados." ;

				notification_select("error", txt);

			} else if (it == 1) {
				txt = "¡Puedes inscribirte!, tienes " + it + " opción seleccionada." ;

				notification_select("info", txt);
			}else if (it == 2) {
				txt = "¡Puedes inscribirte!, tienes " + it + " opciones seleccionadas." ;

				notification_select("info", txt);
			}
		});

		function notification_select(color, txt) {
			$(document).ready(function () {
				toastr[color]("<center style='font-size: 14px'>" +
						"<strong>" + txt + "</strong>" +
						"</center>");
			});
		}


	});

	$('.carousel.carousel-multi-item.v-2 .carousel-item').each(function(){
		var next = $(this).next();
		if (!next.length) {
			next = $(this).siblings(':first');
		}
		next.children(':first-child').clone().appendTo($(this));

		for (var i=0;i<4;i++) {
			next=next.next();
			if (!next.length) {
				next=$(this).siblings(':first');
			}
			next.children(':first-child').clone().appendTo($(this));
		}
	});

	$('.carousel.carousel-multi-item_1.v-2 .carousel-item').each(function(){
		var next = $(this).next();
		if (!next.length) {
			next = $(this).siblings(':first');
		}
		next.children(':first-child').clone().appendTo($(this));

		for (var i=0;i<4;i++) {
			next=next.next();
			if (!next.length) {
				next=$(this).siblings(':first');
			}
			next.children(':first-child').clone().appendTo($(this));
		}
	});

</script>


<script>

	function enabledDNI() {
		$('#exist').html('');
		$('#dni').val('').prop('disabled', false);
		$('#nombres').val('').prop('disabled', true);
		$('#ape_pat').val('').prop('disabled', true);
		$('#ape_mat').val('').prop('disabled', true);
		$("[name=sexo]").val(['']).prop('disabled', false);

		$("#fecha_nacimiento").val('').prop('disabled', false);
		$('#institucion').val('').prop('disabled', false);
		$('#grado').val('').prop('disabled', false);
		$('#seccion').val('').prop('disabled', false);
		$('#direccion').val('').prop('disabled', false);
		$('#barrio').val('').prop('disabled', false);
		$('#celular').val('').prop('disabled', false);
	}

	function enabledDNI_() {
		$('#dni_resp').val('').prop('disabled', false);
		$('#nombres_resp').val('').prop('disabled', true);
		$('#ape_pat_resp').val('').prop('disabled', true);
		$('#ape_mat_resp').val('').prop('disabled', true);

		$('#direccion').val('').prop('disabled', false);
		$('#barrio').val('').prop('disabled', false);
		$('#celular_resp').val('').prop('disabled', false);
	}

	function getDNI() {
		$('#exist').html('');

		var data_ = {
			'dni': $("#dni").val()
		};

		$.ajax({
			data: data_,
			url: "<?= base_url() ?>users/inscripciones/getdni/" + data_['dni'],
			type: 'POST',

			// beforesend: function () {
			// 	$('#infob').html("enviado");
			// },

			success: function (data) {
				data_ = JSON.parse(data);

				if (data_.nombres) {

					$('#dni').val(data_.dni).prop('disabled', true);
					$('#hidden_dni').val(data_.dni).prop('disabled', false);

					$('#nombres').val(data_.nombres).prop('disabled', true);
					$('#hidden_nombres').val(data_.nombres);

					$('#ape_pat').val(data_.ape_pat).prop('disabled', true);
					$('#hidden_ape_pat').val(data_.ape_pat);

					$('#ape_mat').val(data_.ape_mat).prop('disabled', true);
					$('#hidden_ape_mat').val(data_.ape_mat);

					//$('[name="sexo"]').check(data_.sexo);
					$("[name=sexo]").val([data_.sexo]);


					$('#fecha_nacimiento').val(data_.fecha_nacimiento);

					$('#institucion').val(data_.institucion);
					$('#grado').val(data_.grado);
					$('#seccion').val(data_.seccion);

				}
				if (data_.nombres == "") {
					$('#dni').val(data_.dni).prop('disabled', true);
					$('#hidden_dni').val(data_.dni).prop('disabled', false);

					$('#nombres').val(data_.nombres).prop('disabled', false);
					$('#ape_pat').val(data_.ape_pat).prop('disabled', false);
					$('#ape_mat').val(data_.ape_mat).prop('disabled', false);
					//$("input[name=sexo_]").val([data_.sexo]).prop('disabled', false);
					$("[name=sexo]").val([data_.sexo]).prop('disabled', false);
				}
				if (data_[0].dni_estudiante) {

					// $('#dni').val(data_.dni).prop('disabled', true);

					let insertexist = '';

					for (let i = 0; i < Object.values(data_).length; i++) {
						if (i == 0)
							insertexist += `${data_[i].disciplina}`;
						else if (i > 0 && i < Object.values(data_).length - 1)
							insertexist += `, ${data_[i].disciplina}`;
						else
							insertexist += ` y ${data_[i].disciplina}`;
					}

					$('#exist').html(
							`
						<div class="alert alert-success alert-dismissible fade show" role="alert">
							<div class="text-center">
								<strong>¡Hola!. ${data_[0].nombres_==null?'':data_[0].nombres_}</strong>
								${data_[0].nombres_==null?' U':', u'}sted ya se encuentra incrito en : ${insertexist}
							</div>
							<button type="button" class="close" data-dismiss="alert" aria-label="Close">
								<span aria-hidden="true">&times;</span>
							</button>
						</div>
						`
					);

					$('#name_ins').html(data_[0].nombres_);

					$('#disciplina_ins').html(`${insertexist}`);


					// $(document).ready(function () {
					// 	$('#toast-validation').toast('show');
					// });

					$(document).ready(function () {
						toastr["warning"]("<center " +
								"style='font-size: 14px;'>" +
								"<strong>¡Hola!</strong>, Usted ya se encuentra incrito en: <strong>" + insertexist + "</strong>." +
								"</center>");
					});

				}

			}
		});


	}

	function getDNI_() {

		var data_ = {
			'dni_resp': $("#dni_resp").val()
		};

		$.ajax({
			data: data_,
			url: "<?= base_url() ?>users/inscripciones/getdniresp/" + data_['dni_resp'],
			type: 'POST',

			// beforesend: function () {
			// 	$('#infob').html("enviado");
			// },

			success: function (data) {
				data_ = JSON.parse(data);

				if (data_.nombres) {

					$('#dni_resp').val(data_.dni).prop('disabled', true);
					$('#hidden_dni_resp').val(data_.dni).prop('disabled', false);

					$('#nombres_resp').val(data_.nombres).prop('disabled', true);
					$('#hidden_nombres_resp').val(data_.nombres);

					$('#ape_pat_resp').val(data_.ape_pat).prop('disabled', true);
					$('#hidden_ape_pat_resp').val(data_.ape_pat);

					$('#ape_mat_resp').val(data_.ape_mat).prop('disabled', true);
					$('#hidden_ape_mat_resp').val(data_.ape_mat);
				}
				if (data_.nombres == "") {
					$('#dni_resp').val(data_.dni).prop('disabled', true);
					$('#hidden_dni_resp').val(data_.dni).prop('disabled', false);

					$('#nombres_resp').val(data_.nombres).prop('disabled', false);
					$('#ape_pat_resp').val(data_.ape_pat).prop('disabled', false);
					$('#ape_mat_resp').val(data_.ape_mat).prop('disabled', false);

				}

			}
		});
	}

	function getDniPer()
	{
		$('#exist').html('');

		var data_ = {
			'dni': $("#dni").val()
		};

		$.ajax({
			data: data_,
			url: "<?= base_url() ?>users/inscripciones/getdnipers/" + data_['dni'],
			type: 'POST',

			// beforesend: function () {
			// 	$('#infob').html("enviado");
			// },

			success: function (data) {
				data_ = JSON.parse(data);

				if (data_.nombres) {

					$('#dni').val(data_.dni).prop('disabled', true);
					$('#hidden_dni').val(data_.dni).prop('disabled', false);

					$('#nombres').val(data_.nombres).prop('disabled', true);
					$('#hidden_nombres').val(data_.nombres);

					$('#ape_pat').val(data_.ape_pat).prop('disabled', true);
					$('#hidden_ape_pat').val(data_.ape_pat);

					$('#ape_mat').val(data_.ape_mat).prop('disabled', true);
					$('#hidden_ape_mat').val(data_.ape_mat);

					//$('[name="sexo"]').check(data_.sexo);
					$("[name=sexo]").val([data_.sexo]);


					$('#fecha_nacimiento').val(data_.fecha_nacimiento);



				}
				if (data_.nombres == "") {
					$('#dni').val(data_.dni).prop('disabled', true);
					$('#hidden_dni').val(data_.dni).prop('disabled', false);

					$('#nombres').val(data_.nombres).prop('disabled', false);
					$('#ape_pat').val(data_.ape_pat).prop('disabled', false);
					$('#ape_mat').val(data_.ape_mat).prop('disabled', false);
					//$("input[name=sexo_]").val([data_.sexo]).prop('disabled', false);
					$("[name=sexo]").val([data_.sexo]).prop('disabled', false);
				}
				if (data_[0].dni_estudiante) {

					// $('#dni').val(data_.dni).prop('disabled', true);

					let insertexist = '';

					for (let i = 0; i < Object.values(data_).length; i++) {
						if (i == 0)
							insertexist += `${data_[i].disciplina}`;
						else if (i > 0 && i < Object.values(data_).length - 1)
							insertexist += `, ${data_[i].disciplina}`;
						else
							insertexist += ` y ${data_[i].disciplina}`;
					}


					$('#exist').html(
							`
						<div class="alert alert-success alert-dismissible fade show" role="alert">
							<div class="text-center">
								<strong>¡Hola!. ${data_[0].nombres_==null?'':data_[0].nombres_}</strong>
								${data_[0].nombres_==null?' U':', u'}sted ya se encuentra incrito en : ${insertexist}
							</div>
							<button type="button" class="close" data-dismiss="alert" aria-label="Close">
								<span aria-hidden="true">&times;</span>
							</button>
						</div>
						`
					);

					$('#name_ins').html(data_[0].nombres_);

					$('#disciplina_ins').html(`${insertexist}`);


					$(document).ready(function () {
						toastr["warning"]("<center " +
								"style='font-size: 14px;'>" +
								"<strong>¡Hola!</strong>, Usted ya se encuentra incrito en: <strong>" + insertexist + "</strong>." +
								"</center>");
					});

				}

			}
		});
	}

</script>



<script>
	$('#modal1').on('hidden.bs.modal', function (e) {
		// do something...
		$('#modal1 iframe').attr("src", $("#modal1 iframe").attr("src"));
	});
</script>


<script type="text/javascript">
	// Animation
	new WOW().init();

	// MDB Lightbox Init
	$(function () {
		$("#mdb-lightbox-ui").load("<?= $this->config->item('assetusers_url') ?>mdb-addons/mdb-lightbox-ui.html");
	});

</script>


</body>

</html>
