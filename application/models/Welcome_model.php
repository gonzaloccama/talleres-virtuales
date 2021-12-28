<?php


class Welcome_model extends CI_Model
{
	function __construct()

	{

		parent::__construct();

	}

	function getListTable($table, $where_ = '', $id = 0)
	{
		$this->db->select("$table.*");
		$this->db->from($table);

		if ($id != 0)
			$this->db->where("$where_ = $id");

		$query = $this->db->get();

		return $result = $query->result();
	}

	function getListPopular($table)
	{
		$this->db->select("$table.*, view.count as count");
		$this->db->from($table);

		$this->db->join("view", "$table.id_post = view.post", "inner");

		$this->db->order_by('view.count', "DESC");

		$this->db->limit(5);

		$query = $this->db->get();

		return $result = $query->result();

	}

	function getlist_post($table)
	{
		$this->db->select("$table.*, users.user as author");
		$this->db->from($table);

		$this->db->join("users", "$table.author = users.id");

		$query = $this->db->get();
		return $query;
	}

	function getList($table)
	{


		//  PAGINATION START

		if ((isset($pagination['cur_page'])) and !empty($pagination['per_page'])) {

			$this->db->limit($pagination['per_page'], $pagination['cur_page']);

		}

		//  PAGINATION END


		$this->db->select("$table.*");

		$this->db->from($table);


		$this->db->order_by("date", "desc");

		$query = $this->db->get();

		return $result = $query->result();

	}

	function getCount($table)
	{
		$this->db->select("$table.*");
		$this->db->from($table);
		return $this->db->count_all_results();
	}

	function insert($table, $data)
	{

		$this->db->insert($table, $data);

		return $this->db->insert_id();

	}

	function updateData($table, $data, $where_, $id)

	{

		$this->db->where("$where_", $id);

		$this->db->update($table, $data);

	}
}
