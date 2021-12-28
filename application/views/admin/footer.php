
</div>
<!-- /.container-fluid -->
</div>
<!-- End of Main Content -->

<!-- Footer -->
<footer class="sticky-footer bg-white">
	<div class="container my-auto">
		<div class="copyright text-center my-auto">
			<span>Copyright &copy; Municipalidad Provincial de Carabaya 2020</span>
			<b class="right-aligned"><a href="http://onelcn.com">by: OneLcN</a></b>
		</div>
	</div>
</footer>
<!-- End of Footer -->

</div>
<!-- End of Content Wrapper -->
</div>
<!-- End of Page Wrapper -->

<!-- Scroll to Top Button-->
<a class="scroll-to-top rounded" href="#page-top">
	<i class="fas fa-angle-up"></i>
</a>

<!-- Logout Modal-->
<div class="modal fade" id="logoutModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
	 aria-hidden="true">
	<div class="modal-dialog" role="document">
		<div class="modal-content">
			<div class="modal-header">
				<h5 class="modal-title" id="exampleModalLabel">¿Listo para salir?</h5>
				<button class="close" type="button" data-dismiss="modal" aria-label="Close">
					<span aria-hidden="true">×</span>
				</button>
			</div>
			<div class="modal-body">Seleccione "Cerrar sesión", si está listo para finalizar su sesión actual.</div>
			<div class="modal-footer">
				<button class="btn btn-secondary" type="button" data-dismiss="modal">Cancelar</button>
				<a class="btn btn-primary" href="<?= base_url() ?>admin/auth/logout">Cerrar sesión</a>
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

<!-- Page level plugins -->
<script src="<?= $this->config->item('assetadmin_url') ?>vendor/datatables/jquery.dataTables.min.js"></script>
<script src="<?= $this->config->item('assetadmin_url') ?>vendor/datatables/dataTables.bootstrap4.min.js"></script>

<!-- Page level custom scripts -->
<script src="<?= $this->config->item('assetadmin_url') ?>js/demo/datatables-demo.js"></script>
<script src="<?= $this->config->item('assetadmin_url') ?>js/demo/app.js"></script>

<script>
	function getEstudiante() {

		$('#exist').html('');

		var data_ = {
			'dni': $("#dni").val()
		};

		//$('#nombres').val(data_['dni']);

		$.ajax({
			data: data_,
			url: "<?= base_url() ?>admin/estudiante/getestudiante/" + data_['dni'],
			type: 'POST',

			// beforesend: function () {
			// 	$('#infob').html("enviado");
			// },

			success: function (data) {
				data_ = JSON.parse(data);

				if (data_.nombres) {

					$('#dni').val(data_.dni).prop('disabled', true);
					$('#hidden_dni').val(data_.dni).prop('disabled', false);

					$('#nombres').val(data_.nombres);


					$('#ape_pat').val(data_.ape_pat);


					$('#ape_mat').val(data_.ape_mat);

					$("[name=sexo]").val([data_.sexo]);


					$('#fecha_nacimiento').val(data_.fecha_nacimiento);


				}
				if (data_.nombres == "") {
					$('#dni').val(data_.dni).prop('disabled', true);
					$('#hidden_dni').val(data_.dni).prop('disabled', false);
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

	function clean()
	{
		$('#dni').val('').prop('disabled', false);
		$('#hidden_dni').val('');
		$('#nombres').val('');
		$('#ape_pat').val('');
		$('#ape_mat').val('');
		$('#sexo').val('');
		$('#fecha_nacimiento').val('');
	}

</script>

<script>
	$(function() {

		/*--first time load--*/
		ajaxlist(page_url=false);

		$('#search_text').keyup(function(){
			var search = $(this).val();
			if(search != '')
			{
				ajaxlist(page_url = false);
			}
		});

		/*-- Search keyword--*/
		$(document).on('click', "#searchBtn", function(event) {
			ajaxlist(page_url=false);
			event.preventDefault();
		});

		/*-- Reset Search--*/
		$(document).on('click', "#resetBtn", function(event) {
			$("#search_key").val('');
			ajaxlist(page_url=false);
			event.preventDefault();
		});

		/*-- Page click --*/
		$(document).on('click', ".pagination li a", function(event) {
			var page_url = $(this).attr('href');
			ajaxlist(page_url);
			event.preventDefault();
		});

		/*-- create function ajaxlist --*/
		function ajaxlist(page_url = false)
		{
			var search_key = $("#search_text").val();

			var dataString = 'search_text=' + search_key;
			var base_url = "<?= base_url() ?>admin/search/fetch_ajax";

			if(page_url == false) {
				var page_url = base_url;
			}

			$.ajax({
				type: "POST",
				url: page_url,
				data: dataString,
				success: function(response) {
					console.log(response);
					$("#result").html(response);
				}
			});
		}
	});
</script>

<script>
	$(function() {

		/*--first time load--*/
		ajaxlist(page_url=false);

		$('#search_text2').keyup(function(){
			var search = $(this).val();
			if(search != '')
			{
				ajaxlist(page_url = false);
			}
		});

		/*-- Search keyword--*/
		$(document).on('click', "#searchBtn2", function(event) {
			ajaxlist(page_url=false);
			event.preventDefault();
		});

		/*-- Reset Search--*/
		$(document).on('click', "#resetBtn2", function(event) {
			$("#search_key").val('');
			ajaxlist(page_url=false);
			event.preventDefault();
		});

		/*-- Page click --*/
		$(document).on('click', ".pagination li a", function(event) {
			var page_url = $(this).attr('href');
			ajaxlist(page_url);
			event.preventDefault();
		});

		/*-- create function ajaxlist --*/
		function ajaxlist(page_url = false)
		{
			var search_key = $("#search_text2").val();

			var dataString = 'search_text2=' + search_key;
			var base_url = "<?= base_url() ?>admin/search/fetch_ajax2";

			if(page_url == false) {
				var page_url = base_url;
			}

			$.ajax({
				type: "POST",
				url: page_url,
				data: dataString,
				success: function(response) {
					console.log(response);
					$("#result2").html(response);
				}
			});
		}
	});
</script>


</body>

</html>
