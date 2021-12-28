<?php


class Inscripciones_model extends CI_Model
{
	function __construct()

	{

		parent::__construct();

	}

	function getListTable($table)
	{
		$this->db->select("$table.*");
		$this->db->from($table);

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

	function getRowEstudiante($table, $where_, $id)
	{
		$this->db->select("$table.dni_persona as dni, persona.nombres, persona.ape_pat, persona.ape_mat, persona.sexo,
		persona.fecha_nacimiento, $table.institucion, $table.grado, $table.seccion");

		$this->db->from($table);

		$this->db->join("persona", "estudiante.dni_persona = persona.dni", "LEFT");
		//$this->db->join("sexo", "persona.sexo = sexo.id_sexo", "LEFT");

		$this->db->where("$where_ = $id");

		$query = $this->db->get();

		return $result = $query->result();
	}


	function getRowInscripcion($table, $tbjoin, $where_, $id)
	{
		$this->db->select("$table.*, $tbjoin.nombres as nombres_, disciplina.disciplina as disciplina");
		$this->db->from($table);

		$this->db->join("$tbjoin", "inscripcion.dni_estudiante = $tbjoin.dni", "LEFT");
		$this->db->join("disciplina", "$table.disciplina = disciplina.id_disciplina", "left");
		//$this->db->join("disciplina", , "left");


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
