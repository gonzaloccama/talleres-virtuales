<?php defined('BASEPATH') or exit('No direct script access allowed');

class Search_model extends CI_Model
{
	function __construct()

	{
		parent::__construct();
	}

	function get_persona($limit, $offset, $search, $count, $table)
	{
		$this->db->select("$table.dni, persona.nombres, persona.ape_pat, persona.ape_mat, sexo.sexo, TIMESTAMPDIFF(YEAR,persona.fecha_nacimiento,CURDATE()) AS edad");
		$this->db->from("$table");

		$this->db->join('persona', "$table.dni = persona.dni");
		$this->db->join('sexo', 'persona.sexo = sexo.id_sexo');

		if($search){
			$keyword = $search['keyword'];

			if($keyword){

				$this->db->like("$table.dni", $keyword);
				$this->db->or_like('persona.nombres', $keyword);
				$this->db->or_like('persona.ape_pat', $keyword);
				$this->db->or_like('persona.ape_mat', $keyword);
				$this->db->or_like('concat(persona.nombres," ",persona.ape_pat," ", persona.ape_mat)', $keyword);
			}
		}

		if($count){

			$query = $this->db->get();

			if($query->num_rows() > 0) {

				return $query->num_rows();
			}
		}
		else {
			$this->db->limit($limit, $offset);

			$this->db->order_by('edad desc');
			$this->db->order_by('persona.ape_pat asc');
			$this->db->order_by('persona.ape_mat asc');

			$query = $this->db->get();

			if($query->num_rows() > 0) {
				//var_dump($query->result());
				return $query->result();
			}

		}

		return array();
	}

}
