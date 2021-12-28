<?php defined('BASEPATH') or exit('No direct script access allowed');

class Disciplina extends CI_Controller
{
    function __construct()
    {
        parent::__construct();
        
        // $this->load->library('pagination');
        
        // $this->load->helper('url');
        
         $this->load->model('admin/disciplina_model', 'disciplina');
        
         $this->load->library('session');
    }
    
    function index()
    {
        
    }

    function mod_estudiante($id = 0, $str_ = '')
	{
		if (!$this->session->userdata('is_logged')){
			redirect('/admin/auth/login');
		}

		$data['title'] = "Estudiantes inscritos en $str_";
		$data['subtitle'] = "Lista de estudiantes";

		$data['disciplina'] = $this->disciplina->getListTableDisciplina("disciplina");
		$data['cicle'] = $this->disciplina->ListTable("cicle");

		$data['estudiante'] = $this->disciplina->getListEstudiante("inscripcion", $id);

		$this->load->view('admin/disciplina/modalidad/estudiante', $data);
	}

	function mod_adulto($id = 0, $str_ = '')
	{
		if (!$this->session->userdata('is_logged')){
			redirect('/admin/auth/login');
		}

		$data['title'] = "No estudiantes inscritos en $str_";
		$data['subtitle'] = "Lista de adultos incritos";

		$data['disciplina'] = $this->disciplina->getListTableDisciplina("disciplina");
		$data['cicle'] = $this->disciplina->ListTable("cicle");

		$data['estudiante'] = $this->disciplina->getListAdulto("inscripcion" , $id);

		$this->load->view('admin/disciplina/modalidad/aldulto', $data);
	}

	function inscritos()
	{
		if (!$this->session->userdata('is_logged')){
			redirect('/admin/auth/login');
		}

		$data['title'] = "Lista general de inscritos";
		$data['subtitle'] = "incritos";

		$data['disciplina'] = $this->disciplina->getListTableDisciplina("disciplina");
		$data['cicle'] = $this->disciplina->ListTable("cicle");

		$data['inscritos'] = $this->disciplina->getGeneralInscritos("inscripcion" );

		$this->load->view('admin/disciplina/modalidad/general', $data);
	}

}
