<?php defined('BASEPATH') or exit('No direct script access allowed');

class Responsable extends CI_Controller
{
    function __construct()
    {
        parent::__construct();
        
        // $this->load->library('pagination');
        
        // $this->load->helper('url');
        
         $this->load->model('admin/responsable_model', 'responsable');
        
         $this->load->library('session');
    }
    
    function index()
    {
		if (!$this->session->userdata('is_logged')){
			redirect('/admin/auth/login');
		}

		$data['title'] = 'Responsables de Estudiantes Inscritos';
		$data['subtitle'] = 'Lista de apoderados de los estudiantes';

		$data['disciplina'] = $this->responsable->getListTableDisciplina("disciplina");
		$data['cicle'] = $this->responsable->ListTable("cicle");
		$data['responsable'] = $this->responsable->listResp("responsable");

		$this->load->view('admin/responsable/manager', $data);
    }
}
