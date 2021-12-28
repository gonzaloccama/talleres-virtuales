<?php defined('BASEPATH') or exit('No direct script access allowed');

class Adulto extends CI_Controller
{
    function __construct()
    {
        parent::__construct();
        
        // $this->load->library('pagination');
        
        // $this->load->helper('url');
        
         $this->load->model('admin/adulto_model', 'adulto');
        
         $this->load->library('session');
    }
    
    function index()
    {
		if (!$this->session->userdata('is_logged')){
			redirect('/admin/auth/login');
		}

		$data['title'] = 'Estudiantes adultos';
		$data['subtitle'] = 'Lista de no estudiantes';
		$data['adulto'] = $this->adulto->listAdult("regimayores");
		$data['disciplina'] = $this->adulto->getListTableDisciplina("disciplina");
		$data['cicle'] = $this->adulto->ListTable("cicle");

		$this->load->view('admin/adulto/manager', $data);
    }
}
