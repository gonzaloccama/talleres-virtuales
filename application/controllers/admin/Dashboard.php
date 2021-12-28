<?php defined('BASEPATH') or exit('No direct script access allowed');


class Dashboard extends CI_Controller
{
	function __construct()

	{
		parent::__construct();

		$this->load->library('pagination');

//		$this->load->helper('url');

		$this->load->helper(array('form', 'url'));

//		$this->load->library('form_validation');

		$this->load->model('admin/dashboard_model', 'dashboard');

//		$this->load->library('ion_auth');
		$this->load->library('session');

	}

	function index()
	{
		if (!$this->session->userdata('is_logged')) {
			redirect('/admin/auth/login');
		}


		$data['title'] = 'Dashboard';
		$data['disciplina'] = $this->dashboard->getListTableDisciplina("disciplina");

		$data['cicle'] = $this->dashboard->ListTable("cicle");

		$data['total_estudiantes'] = $this->dashboard->getListEstudiante("inscripcion");

		$data['total_adultos'] = $this->dashboard->getListAdulto("inscripcion");

		$data['total_de_iscritos'] = $this->dashboard->listTableRows("inscripcion");

		$data['disciplina_'] = null;

		$i = 0;
		foreach ($data['disciplina'] as $disc):
			if ($disc->cicle == 1 && !$disc->addressed):
				$dat[$i] = (object)array(
					'id_disciplina' => $disc->id_disciplina,
					'disciplina' => $disc->disciplina,
					'count' => $this->dashboard->getListEstudiante("inscripcion", $disc->id_disciplina)
				);
				$i++;
			endif;
		endforeach;
		$data['disciplina_e'] = $dat;

		$i = 0;
		$dat = null;
		foreach ($data['disciplina'] as $disc):
			if ($disc->cicle == 1 && $disc->addressed):
				$dat[$i] = (object)array(
					'id_disciplina' => $disc->id_disciplina,
					'disciplina' => $disc->disciplina,
					'count' => $this->dashboard->getListAdulto("inscripcion", $disc->id_disciplina)
				);
				$i++;
			endif;
		endforeach;

		$data['disciplina_a'] = $dat;

		$this->load->view('admin/dashboard/manager', $data);
	}


}
