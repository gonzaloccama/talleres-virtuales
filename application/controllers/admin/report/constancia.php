<?php defined('BASEPATH') or exit('No direct script access allowed');

class Constancia extends CI_Controller
{
    function __construct()
    {
        parent::__construct();

        // $this->load->library('pagination');

         $this->load->helper('url');

         $this->load->helper('pdf_helper');

         $this->load->model('admin/report/constancia_model', 'contancia');

        // $this->load->library('session');
    }

    function index()
    {
		var_dump('ccama');
    }

    function report($fe = 0, $id = 0)
	{
		$data["title"] = 'CONSTANCIA DE INSCRIPCIÓN EN TALLER DE MEDIO AÑO';

		$data["fpdf"] = new PDF_helper('P', 'mm', 'A4');
		$data["persona"] = $this->contancia->getIncripcion('inscripcion', $count = false, $id, $fe);

		$data["institucion"] = $this->contancia->getInstitucion('regestudiante', $id);

		$data["responsable"] = $this->contancia->getResponsable('responsable', $id);


		$this->load->view('admin/report/constancia', $data);
	}

}
