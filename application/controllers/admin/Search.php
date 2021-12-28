<?php defined('BASEPATH') or exit('No direct script access allowed');

class Search extends CI_Controller
{
	function __construct()

	{

		parent::__construct();

		$this->load->model('admin/search_model', 'search');

		$this->load->library('pagination');

	}

	function index()
	{

	}

	function fetch_ajax($offset = null)
	{
		$table = 'regestudiante';

		$compare = 'edad < 20 and edad >= 3';

		$search = array(
			'keyword' => trim($this->input->post('search_text')),
		);

		$limit = 5;

		$offset = ($this->uri->segment(4)) ? $this->uri->segment(4) : 0;

		$config['base_url'] = site_url('admin/search/fetch_ajax');
		$config['total_rows'] = $this->search->get_persona($limit, $offset, $search, $count = true, $table, $compare);
		$config['per_page'] = $limit;
		$config['uri_segment'] = 4;
		$config['num_links'] = 2;
		$config['full_tag_open'] = '<ul class="pagination pagination-sm">';
		$config['full_tag_close'] = '</ul>';
		$config['num_tag_open'] = '<li class="page-item"><span class="page-link">';
		$config['num_tag_close'] = '</span></li>';
		$config['cur_tag_open'] = '<li class="page-item disabled"><a  style="background-color: #E7E8F0; color: #5473DF;"
									href="" class="page-link" 
									
									> ';
		$config['cur_tag_close'] = '</a></li>';
		$config['next_link'] = 'Siguiente';
		$config['next_tag_open'] = '<li class="page-item"><span class="page-link">';
		$config['next_tag_close'] = '</span></li>';
		$config['prev_link'] = 'Anterior';
		$config['prev_tag_open'] = '<li class="page-item"><span class="page-link">';
		$config['prev_tag_close'] = '</span></li>';
		$config['first_link'] = '«';
		$config['first_tag_open'] = '<li class="page-item"><span class="page-link">';
		$config['first_tag_close'] = '</span></li>';
		$config['last_link'] = '»';
		$config['last_tag_open'] = '<li class="page-item"><span class="page-link">';
		$config['last_tag_close'] = '</span></li>';

		$this->pagination->initialize($config);

		$data['total_rows'] = $config['total_rows'];

		$data['personas'] = $this->search->get_persona($limit, $offset, $search, $count = false, $table, $compare);

		$data['pagelinks'] = $this->pagination->create_links();

		$this->load->view('admin/search/fetch_ajax', $data);

	}

	function fetch_ajax2($offset = null)
	{
		$table = 'regimayores';

		$compare = 'edad > 18 and edad <= 35';

		$search = array(
			'keyword' => trim($this->input->post('search_text2')),
		);

		$limit = 5;

		$offset = ($this->uri->segment(4)) ? $this->uri->segment(4) : 0;

		$config['base_url'] = site_url('admin/search/fetch_ajax2');
		$config['total_rows'] = $this->search->get_persona($limit, $offset, $search, $count = true, $table, $compare);
		$config['per_page'] = $limit;
		$config['uri_segment'] = 4;
		$config['num_links'] = 2;
		$config['full_tag_open'] = '<ul class="pagination pagination-sm">';
		$config['full_tag_close'] = '</ul>';
		$config['num_tag_open'] = '<li class="page-item"><span class="page-link">';
		$config['num_tag_close'] = '</span></li>';
		$config['cur_tag_open'] = '<li class="page-item disabled"><a  style="background-color: #E7E8F0; color: #5473DF;"
									href="" class="page-link" 
									
									> ';
		$config['cur_tag_close'] = '</a></li>';
		$config['next_link'] = 'Siguiente';
		$config['next_tag_open'] = '<li class="page-item"><span class="page-link">';
		$config['next_tag_close'] = '</span></li>';
		$config['prev_link'] = 'Anterior';
		$config['prev_tag_open'] = '<li class="page-item"><span class="page-link">';
		$config['prev_tag_close'] = '</span></li>';
		$config['first_link'] = '«';
		$config['first_tag_open'] = '<li class="page-item"><span class="page-link">';
		$config['first_tag_close'] = '</span></li>';
		$config['last_link'] = '»';
		$config['last_tag_open'] = '<li class="page-item"><span class="page-link">';
		$config['last_tag_close'] = '</span></li>';

		$this->pagination->initialize($config);

		$data['total_rows'] = $config['total_rows'];

		$data['personas'] = $this->search->get_persona($limit, $offset, $search, $count = false, $table, $compare);

		$data['pagelinks_'] = $this->pagination->create_links();

		$this->load->view('admin/search/fetch_ajax2', $data);

	}

}
