<?php


class Auth extends CI_Controller
{
	function __construct()

	{

		parent::__construct();

//		$this->load->library('pagination');

		$this->load->helper('url');
//
//		$this->load->helper('FindDNI_helper');
//
		$this->load->helper(array('form', 'url', 'login_rules'));
//
		$this->load->library('form_validation');

		$this->load->model('admin/auth_model', 'auth');

//		$this->load->library('ion_auth');
		$this->load->library('session');


	}

	function login()
	{
		$this->load->view('auth/_login_layout');
	}

	function validate()
	{
		$this->form_validation->set_error_delimiters('', '');

		$rules = getLoginRules();

		$this->form_validation->set_rules($rules);

		if ($this->form_validation->run() === FALSE) {
			$errors = array(
				'email' => form_error('email'),
				'password' => form_error('password')
			);
			echo json_encode($errors);
			$this->output->set_status_header(400);
		} else {

			$saveData['email'] = set_value('email');
			$saveData['password'] = set_value('password');

			if (!$res = $this->auth->authSession($saveData['email'], $saveData['password'])) {
				echo json_encode(array('msg' => 'El usuario o la contraseña es incorrecta'));
				$this->output->set_status_header(401);
				exit;
			}

			$data = array(
				'id' => $res->id,
				'range' => $res->range,
				'status' => $res->status,
				'user' => $res->user,
				'is_logged' => TRUE
			);

			$this->session->set_userdata($data);
			$this->session->set_flashdata('message', "Hola <b>{$this->session->userdata('user')},</b> bienvenido al sistema.");
			echo json_encode(array("url" => base_url()."admin/dashboard"));
		}
	}

	function logout()
	{
		$session_destroy = array('id', 'range', 'status', 'user', 'is_logged');

		$this->session->unset_userdata($session_destroy);
		$this->session->sess_destroy();

		redirect('/admin/auth/login');
	}
}
