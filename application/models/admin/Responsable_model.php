<?php defined('BASEPATH') or exit('No direct script access allowed');

class Responsable_model extends CI_Model
{
    function __construct()
    {
        parent::__construct();
        
    }

	function ListTable($table, $id = 0)
	{
		$this->db->select("$table.*");
		$this->db->from($table);

		$query = $this->db->get();

		return $result = $query->result();
	}

    function listResp($table)
	{
		$this->db->select("$table.dni_resp, persona.nombres, persona.ape_pat, persona.ape_mat, $table.direccion, 
		barrio.barrio, $table.celular");

		$this->db->from("$table");

		$this->db->join("persona", "$table.dni_resp = persona.dni", "inner");
		$this->db->join("barrio", "$table.barrio = barrio.id_barrio", "inner");

		$query = $this->db->get();

		return $result = $query->result();
	}

	function getListTableDisciplina($table)
	{
		$this->db->select("$table.*, especialidad.especialidad, escuela.escuela");
		$this->db->from($table);

		$this->db->join("especialidad", "$table.especialidad = especialidad.id_especialidad", "INNER");
		$this->db->join("escuela", "especialidad.escuela = escuela.id_escuela", "INNER");

		$query = $this->db->get();

		return $result = $query->result();
	}
}
