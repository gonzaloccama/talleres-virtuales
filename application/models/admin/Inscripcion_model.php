<?php defined('BASEPATH') or exit('No direct script access allowed');

class Inscripcion_model extends CI_Model
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

	function inscripcionList($table)
	{
		$this->db->select("$table.id_inscripcion as id, $table.dni_estudiante as dni, persona.nombres, persona.ape_pat, 
		persona.ape_mat, sexo.sexo, TIMESTAMPDIFF(YEAR,persona.fecha_nacimiento,CURDATE()) AS edad, 
		regestudiante.celular, disciplina.disciplina");

		$this->db->from("$table");

		$this->db->join("persona", "$table.dni_estudiante = persona.dni", "inner");
		$this->db->join("regestudiante", "$table.dni_estudiante = regestudiante.dni", "inner");
		$this->db->join("disciplina", "$table.disciplina = disciplina.id_disciplina", "inner");
		$this->db->join("sexo", "persona.sexo = sexo.id_sexo", "inner");

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
