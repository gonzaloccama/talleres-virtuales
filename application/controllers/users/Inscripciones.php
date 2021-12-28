<?php defined('BASEPATH') or exit('No direct script access allowed');


class Inscripciones extends CI_Controller
{
	function __construct()

	{

		parent::__construct();

		$this->load->library('pagination');

		$this->load->helper('url');

		$this->load->helper('FindDNI_helper');

		$this->load->helper(array('form', 'url'));

		$this->load->library('form_validation');

		$this->load->model('users/inscripciones_model', 'inscripcion');

//		$this->load->library('ion_auth');
		$this->load->library('session');


	}

	public function index($id = null)
	{
		$data['title'] = 'INSCRIPCIONES PARA TALLERES VIRTUALES DE MEDIO AÑO';
		$data['disciplina'] = $this->inscripcion->getListTableDisciplina("disciplina");
		$data['poster_img'] = $this->inscripcion->getListTable("poster_img");
		$this->load->view('users/workshop_learning', $data);
	}

	function add($ref = 0)
	{
		$data = NULL;

		if ($ref == 1):
			//EDTUDIANTE
			$this->form_validation->set_rules('dni', 'DNI', 'required|exact_length[8]|numeric');
			$this->form_validation->set_rules('nombres', 'nombres', 'required');
			$this->form_validation->set_rules('ape_pat', 'apellido paterno', 'required');
			$this->form_validation->set_rules('ape_mat', 'apellido materno', 'required');
			$this->form_validation->set_rules('sexo', 'genero', 'required');
			$this->form_validation->set_rules('fecha_nacimiento', 'fecha de nacimiento', 'trim');
			$this->form_validation->set_rules('institucion', 'institución', 'required');
			$this->form_validation->set_rules('grado', 'grado', 'required');
			$this->form_validation->set_rules('seccion', 'seccion', 'required');
			$this->form_validation->set_rules('celular', 'celular', 'required|exact_length[9]|numeric');

			$this->form_validation->set_rules('disciplina[]', 'disciplina', 'required');

			//RESPONSABLE DEL ESTUDIANTE
			$this->form_validation->set_rules('dni_resp', 'DNI', 'required|exact_length[8]|numeric');
			$this->form_validation->set_rules('nombres_resp', 'nombres', 'required');
			$this->form_validation->set_rules('ape_pat_resp', 'apellido paterno', 'required');
			$this->form_validation->set_rules('ape_mat_resp', 'apellido materno', 'required');
			$this->form_validation->set_rules('direccion', 'direccion', 'required');
			$this->form_validation->set_rules('barrio', 'barrio', 'required');
			$this->form_validation->set_rules('celular_resp', 'celular', 'required|exact_length[9]|numeric');

			$this->form_validation->set_rules('invalidCheck', 'aceptar', 'required');


			if ($this->form_validation->run() == FALSE) {

				$data['form'] = 'form_1';
				$data['title'] = 'INSCRIPCIONES PARA ESTUDIANTES';
				$data['institucion'] = $this->inscripcion->getListTable("institucion");
				$data['grado'] = $this->inscripcion->getListTable("grado");
				$data['seccion'] = $this->inscripcion->getListTable("seccion");
				$data['barrio'] = $this->inscripcion->getListTable("barrio");
				$data['disciplina'] = $this->inscripcion->getListTableDisciplina("disciplina");

				$this->load->view('users/form/inscripciones', $data);

			} else {

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


				$insert_id = $this->inscripcion->insert('regestudiante', $saveData);

				$saveDataR['dni_resp'] = set_value('dni_resp');
				$saveDataR['nombres'] = strtoupper(set_value('nombres_resp'));
				$saveDataR['ape_pat'] = strtoupper(set_value('ape_pat_resp'));
				$saveDataR['ape_mat'] = strtoupper(set_value('ape_mat_resp'));
				$saveDataR['direccion'] = strtoupper(set_value('direccion'));
				$saveDataR['barrio'] = set_value('barrio');
				$saveDataR['celular'] = set_value('celular_resp');
				$saveDataR['fecha_registro'] = $date_current;
				$saveData['observations'] = '';

				$info = $this->inscripcion->getRowWhere("responsable", "dni_resp", $saveDataR['dni_resp']);
				//var_dump($info);
				if (!isset($info[0]) && empty($info[0])) {
					$insert_id = $this->inscripcion->insert('responsable', $saveDataR);
				}

				$tempDisc = set_value('disciplina');
				$tempdni = set_value('dni');

				$i = 0;
				foreach ($tempDisc as $disciplina) {
					$i++;
					$saveDataIns['disciplina'] = $disciplina;
					$saveDataIns['fecha_registro'] = $date_current;
					$saveDataIns['dni_estudiante'] = $tempdni;
					$saveDataIns['cicle'] = 1;
					if ($i <= 2)
						$insert_id = $this->inscripcion->insert('inscripcion', $saveDataIns);
				}

				$disc = $this->disc_inscrito($tempDisc);

				$this->session->set_flashdata('message',
					'<strong>' . $saveData['nombres'] . '.</strong> ¡te incribiste correctamente ' . $disc . '!');

				redirect("users/inscripciones");

			} elseif ($ref == 2):

			//EDTUDIANTE
			$this->form_validation->set_rules('disciplina[]', 'disciplina', 'required');

			$this->form_validation->set_rules('dni', 'DNI', 'required|exact_length[8]|numeric');
			$this->form_validation->set_rules('nombres', 'nombres', 'required');
			$this->form_validation->set_rules('ape_pat', 'apellido paterno', 'required');
			$this->form_validation->set_rules('ape_mat', 'apellido materno', 'required');
			$this->form_validation->set_rules('sexo', 'genero', 'required');
			$this->form_validation->set_rules('fecha_nacimiento', 'fecha de nacimiento', 'trim');


			$this->form_validation->set_rules('frontal', 'frontal', 'trim');
			//$this->form_validation->set_rules('reverso', 'reverso', 'required');

			$this->form_validation->set_rules('direccion', 'direccion', 'required');
			$this->form_validation->set_rules('barrio', 'barrio', 'required');
			$this->form_validation->set_rules('celular', 'celular', 'required|exact_length[9]|numeric');


			$this->form_validation->set_rules('invalidCheck', 'aceptar', 'required');


			if ($this->form_validation->run() === FALSE) {

				$data['form'] = 'form_2';
				$data['title'] = 'INSCRIPCIONES PARA ADULTOS';
				$data['barrio'] = $this->inscripcion->getListTable("barrio");
				$data['disciplina'] = $this->inscripcion->getListTableDisciplina("disciplina");


				$this->load->view('users/form/inscripciones', $data);

			} else {

				date_default_timezone_set('America/Lima');

				$date_current = date("Y-m-d H:i:s");

				$saveData['dni'] = set_value('dni');
				$saveData['nombres'] = strtoupper(set_value('nombres'));
				$saveData['ape_pat'] = strtoupper(set_value('ape_pat'));
				$saveData['ape_mat'] = strtoupper(set_value('ape_mat'));
				$saveData['sexo'] = strtoupper(set_value('sexo'));
				$saveData['fecha_nacimiento'] = strtoupper(set_value('fecha_nacimiento'));
				$saveData['celular'] = set_value('celular');
				$saveData['direccion'] = strtoupper(set_value('direccion'));
				$saveData['barrio'] = set_value('barrio');
				$saveData['fecha_registro'] = $date_current;
				$saveData['observations'] = '';

				$insert_id = $this->inscripcion->insert('regimayores', $saveData);

				$tempDisc = set_value('disciplina');
				$tempdni = set_value('dni');

				$i = 0;
				foreach ($tempDisc as $disciplina) {
					$i++;
					$saveDataIns['disciplina'] = $disciplina;
					$saveDataIns['fecha_registro'] = $date_current;
					$saveDataIns['dni_estudiante'] = $tempdni;
					$saveDataIns['cicle'] = 1;
					if ($i <= 2)
						$insert_id = $this->inscripcion->insert('inscripcion', $saveDataIns);
				}

				//$this->savefile($saveData['dni']);

				$disc = $this->disc_inscrito($tempDisc);

				$this->session->set_flashdata('message',
					'<strong>' . $saveData['nombres'] . '.</strong> ¡te incribiste correctamente ' . $disc . '!');


				redirect("users/inscripciones");
			}
		endif;
	}

	function getdni($id = null)
	{
		if ($id != null) {

			$info = $this->inscripcion->getRowInscripcion("inscripcion", "regestudiante", "dni_estudiante", $id);
			if (isset($info[0]->dni_estudiante) && !empty($info[0]->dni_estudiante)) {

				echo json_encode($info);

			} else {

				$info = $this->inscripcion->getRowEstudiante("estudiante", "dni", $id);

				if (isset($info[0]->nombres) && !empty($info[0]->nombres)) {

					echo json_encode($info[0]);

				} else {

					$info = $this->inscripcion->getRowWhere("persona", "dni", $id);

					if (isset($info[0]->dni) && !empty($info[0]->dni)) {
						echo json_encode($info[0]);
					} else {

						$finddni = new FindDNI_helper();

						$info = $finddni->search_dni($id);

						echo json_encode($info);
					}
				}
			}
		}

	}

	function getdniresp($id = null)
	{
		if ($id != null) {

			$info = $this->inscripcion->getRowWhere("persona", "dni", $id);

			if (isset($info[0]->dni) && !empty($info[0]->dni)) {
				echo json_encode($info[0]);
			} else {

				$finddni = new FindDNI_helper();

				$info = $finddni->search_dni($id);

				echo json_encode($info);
			}
		}

	}

	function getdnipers($id = null)
	{
		if ($id != null) {

			$info = $this->inscripcion->getRowInscripcion("inscripcion", "regimayores", "dni_estudiante", $id);
			if (isset($info[0]->dni_estudiante) && !empty($info[0]->dni_estudiante)) {
				echo json_encode($info);
			} else {
				$info = $this->inscripcion->getRowWhere("persona", "dni", $id);

				if (isset($info[0]->dni) && !empty($info[0]->dni)) {
					echo json_encode($info[0]);
				} else {

					$finddni = new FindDNI_helper();

					$info = $finddni->search_dni($id);

					echo json_encode($info);
				}
			}

		}

	}


	private function disc_inscrito($disciplinas)
	{
		$info = new ArrayObject();

		foreach ($disciplinas as $disciplina) {
			$dat = $this->inscripcion->getRowWhere("disciplina", "id_disciplina", $disciplina);
			$info->append($dat[0]);
		}

		$disc = ' en ';

		for ($i = 0; $i < 2; $i++) {
//			if ($i == 0)
//				$disc = $disc . $info[$i]->disciplina;
//			elseif ($i > 0 && $i < count($info) - 1)
//				$disc = $disc . ', ' . $info[$i]->disciplina;
//			else
//				$disc = $disc . ' y ' . $info[$i]->disciplina;

			if ($i == 0)
				$disc = $disc . $info[$i]->disciplina;
			elseif ($i == 1)
				$disc = $disc . ' y ' . $info[$i]->disciplina;
		}

		return $disc;
	}

}
