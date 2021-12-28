<?php defined('BASEPATH') or exit('No direct script access allowed');

class Estudiante extends CI_Controller
{
	function __construct()
	{
		parent::__construct();

		$this->load->helper('url');

		$this->load->helper('FindDNI_helper');

		$this->load->helper(array('form', 'url'));

		$this->load->library('form_validation');

		$this->load->model('admin/estudiante_model', 'estudiante');

		$this->load->library('session');
	}

	function index()
	{
		if (!$this->session->userdata('is_logged')){
			redirect('/admin/auth/login');
		}

		$data['title'] = 'Estudiantes Inscritos';
		$data['subtitle'] = 'Lista de estudiantes';

		$data['disciplina'] = $this->estudiante->getListTableDisciplina("disciplina");

		$data['estudiante'] = $this->estudiante->listInsc("regestudiante");
		$data['cicle'] = $this->estudiante->ListTable("cicle");

		$this->load->view('admin/estudiante/manager', $data);
	}

	function add()
	{
		if (!$this->session->userdata('is_logged')){
			redirect('/admin/auth/login');
		}

		$data = NULL;

		$this->form_validation->set_rules('dni', 'DNI', 'required|exact_length[8]|numeric');
		$this->form_validation->set_rules('nombres', 'nombres', 'required');
		$this->form_validation->set_rules('ape_pat', 'apellido paterno', 'required');
		$this->form_validation->set_rules('ape_mat', 'apellido materno', 'required');
		$this->form_validation->set_rules('sexo', 'genero', 'required');
		$this->form_validation->set_rules('fecha_nacimiento', 'fecha de nacimiento', 'required');
		$this->form_validation->set_rules('institucion', 'institucion', 'required');
		$this->form_validation->set_rules('grado', 'grado', 'required');
		$this->form_validation->set_rules('grado', 'grado', 'required');
		$this->form_validation->set_rules('seccion', 'seccion', 'required');

		$this->form_validation->set_rules('celular', 'celular', 'required|exact_length[9]|numeric');
		$this->form_validation->set_rules('dni_resp', 'DNI del responsable', 'required|exact_length[8]|numeric');
		$this->form_validation->set_rules('observations', 'observaciones', 'trim');


		if ($this->form_validation->run() == FALSE) {

			$data['title'] = 'Incribir nuevo estudiante';
			$data['subtitle'] = 'Agregar nuevo';

			$data['disciplina'] = $this->estudiante->getListTableDisciplina("disciplina");
			$data['cicle'] = $this->estudiante->ListTable("cicle");

			$data['institucion'] = $this->estudiante->getListTable("institucion");
			$data['grado'] = $this->estudiante->getListTable("grado");
			$data['seccion'] = $this->estudiante->getListTable("seccion");
			$data['sexo'] = $this->estudiante->getListTable("sexo");
			$data['responsable'] = $this->estudiante->getListTable("responsable");

			$this->load->view('admin/estudiante/add', $data);

		}else {

			date_default_timezone_set('America/Lima');

			$date_current = date("Y-m-d H:i:s");

			$saveData['dni'] = set_value('dni');
			$saveData['nombres'] = strtoupper(set_value('nombres'));
			$saveData['ape_pat'] = strtoupper(set_value('ape_pat'));
			$saveData['ape_mat'] = strtoupper(set_value('ape_mat'));
			$saveData['sexo'] = strtoupper(set_value('sexo'));
			$saveData['fecha_nacimiento'] = strtoupper(set_value('fecha_nacimiento'));
			$saveData['institucion'] = set_value('institucion');
			$saveData['grado'] = set_value('grado');
			$saveData['seccion'] = set_value('seccion');
			$saveData['celular'] = set_value('celular');
			$saveData['observations'] = '';
			$saveData['fecha_registro'] = $date_current;
			$saveData['dni_resp'] = set_value('dni_resp');

			$insert_id = $this->estudiante->insert('regestudiante', $saveData);

			$this->session->set_flashdata('message',
				'<strong>' . $saveData['nombres'] . '.</strong> ¡se incribió correctamente!');

			redirect("admin/estudiante");
		}
	}

	function getestudiante($id = 0)
	{
		if (!$this->session->userdata('is_logged')){
			redirect('/admin/auth/login');
		}

		if ($id != null) {

			$info = $this->estudiante->getRowWhere("persona", "dni", $id);

			if (isset($info[0]->dni) && !empty($info[0]->dni)) {
				echo json_encode($info[0]);
				return;
			} else {

				$finddni = new FindDNI_helper();

				$info = $finddni->search_dni($id);

				echo json_encode($info);
			}
		}
	}
}
