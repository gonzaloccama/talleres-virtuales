<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Welcome extends CI_Controller {

	function __construct()

	{

		parent::__construct();

		$this->load->library('pagination');

		$this->load->helper('url');

		$this->load->helper(array('form', 'url'));

		$this->load->library('form_validation');

		$this->load->model('Welcome_model', 'welcome');

		$this->load->library('pagination_bootstrap');

//		$this->load->library('ion_auth');

	}


	public function index()
	{
		$links = array('next'=>'Siguiente', 'prev'=>'Anterior', 'last'=>'Ultimo', 'first'=>'Primero');

		$this->pagination_bootstrap->set_links($links);

		$post = $this->welcome->getlist_post('post');

		$this->pagination_bootstrap->offset(1);

		$data['results'] = $this->pagination_bootstrap->config('welcome/index', $post);

		$data['popular'] = $this->welcome->getListPopular('post');
		$data['categories'] = $this->welcome->getListTable('category');

		$this->load->view('welcome', $data);
	}

	public function post($id = 0)
	{
		$data['popular'] = $this->welcome->getListPopular('post');
		$data['posts'] = $this->welcome->getListTable('post', 'id_post', $id);
		$data['categories'] = $this->welcome->getListTable('category');

		if ($id != 0)
		{
			$view = $this->welcome->getListTable('view', 'post', $id);
			if (!isset($view[0]->count) && empty($view[0]->count))
			{
				$dataSave['count'] = 1;
				$dataSave['post'] = $id;
				$insert_id = $this->welcome->insert('view', $dataSave);
			}else{
				$dataSave['count'] = $view[0]->count + 1;
				$dataSave['post'] = $id;

				$insert_id = $this->welcome->updateData('view', $dataSave, 'post', $id);
			}

		}

		//var_dump(json_encode($data['view']));

		$this->load->view('users/post', $data);
	}

	public function about($id = 0)
	{
		$data['nombres'] = 'Gonzalo Ccama Ramos';
		$this->load->view('users/about', $data);
	}

	public function contact($id = 0)
	{
		$data['nombres'] = 'Gonzalo Ccama Ramos';
		$this->load->view('users/contact', $data);
	}

}
