<?php defined('BASEPATH') or exit('No direct script access allowed');

class Inscripcion extends CI_Controller
{
    function __construct()
    {
        parent::__construct();

        // $this->load->library('pagination');

        // $this->load->helper('url');

         $this->load->model('admin/inscripcion_model', 'inscripcion');

         $this->load->library('session');
    }

    function index()
    {
		if (!$this->session->userdata('is_logged')){
			redirect('/admin/auth/login');
		}

		$data['title'] = 'Inscripción';

		$data['disciplina'] = $this->inscripcion->getListTableDisciplina("disciplina");
		$data['cicle'] = $this->inscripcion->ListTable("cicle");
		$data['inscripcion'] = $this->inscripcion->inscripcionList("inscripcion");

        $this->load->view('admin/inscripcion/manager', $data);
    }

}
