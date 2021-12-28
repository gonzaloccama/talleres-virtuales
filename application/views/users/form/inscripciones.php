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


<?php
$this->load->view("users/form/".$form)
?>



<?php
$this->load->view("users/form/sidebar_form")
?>


<?php
$this->load->view('users/template/footer');
?>
