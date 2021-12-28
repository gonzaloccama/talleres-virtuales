<?php defined('BASEPATH') or exit('No direct script access allowed');

class Estudiante_model extends CI_Model
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

	function getListTable($table)
	{
		$this->db->select("$table.*");
		$this->db->from($table);

		$query = $this->db->get();

		return $result = $query->result();
	}

    function listInsc($table)
	{
		$this->db->select("$table.dni, persona.nombres, persona.ape_pat, persona.ape_mat, sexo.sexo, 
		TIMESTAMPDIFF(YEAR,persona.fecha_nacimiento,CURDATE()) AS edad, $table.celular, institucion.institucion, 
		responsable.dni_resp");

		$this->db->from("$table");

		$this->db->join("persona", "regestudiante.dni = persona.dni", "inner");
		$this->db->join("institucion", "regestudiante.institucion = institucion.id_institucion", "inner");
		$this->db->join("responsable", "regestudiante.dni_resp = responsable.dni_resp", "inner");
		$this->db->join("sexo", "persona.sexo = sexo.id_sexo", "inner");


		$query = $this->db->get();

		return $result = $query->result();
	}

	function getRowWhere($table, $where_, $id)
	{
		$this->db->select("$table.*");
		$this->db->from($table);

		$this->db->where("$where_ = $id");

		$query = $this->db->get();

		return $result = $query->result();
	}

	function insert($table, $data){

		$this->db->insert($table, $data);

		return $this->db->insert_id();

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
