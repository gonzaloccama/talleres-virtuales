<?php defined('BASEPATH') or exit('No direct script access allowed');

class Dashboard_model extends CI_Model
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

	function getListTableDisciplina($table)
	{
		$this->db->select("$table.*, especialidad.especialidad, escuela.escuela");
		$this->db->from($table);


		$this->db->join("especialidad", "$table.especialidad = especialidad.id_especialidad", "INNER");
		$this->db->join("escuela", "especialidad.escuela = escuela.id_escuela", "INNER");



		$query = $this->db->get();

		return $result = $query->result();
	}


	function getListEstudiante($table, $id = 0)
	{
		$this->db->select("$table.dni_estudiante AS dni, persona.nombres, persona.ape_pat, 
		persona.ape_mat, regestudiante.celular, sexo.sexo, TIMESTAMPDIFF(YEAR,persona.fecha_nacimiento,CURDATE()) AS edad,  
		disciplina.disciplina, responsable.dni_resp, responsable.celular AS celular_resp");

		$this->db->from($table);

		$this->db->join("persona", "$table.dni_estudiante = persona.dni", "INNER");
		$this->db->join("regestudiante", "$table.dni_estudiante = regestudiante.dni", "INNER");
		$this->db->join("disciplina", "$table.disciplina = disciplina.id_disciplina", "INNER");
		$this->db->join("responsable", "regestudiante.dni_resp = responsable.dni_resp", "INNER");
		$this->db->join("sexo", "persona.sexo = sexo.id_sexo", "INNER");

		$this->db->having('edad <', 20);

		if ($id != 0)
			$this->db->where("disciplina.id_disciplina = $id");

		//$this->db->where("disciplina.id_disciplina != 20 AND disciplina.id_disciplina != 23");

		$this->db->order_by("edad", "asc");

		$query = $this->db->get();

		return $result = $query->num_rows();
	}

	function getListAdulto($table, $id = 0)
	{
		$this->db->select("$table.dni_estudiante AS dni, persona.nombres, persona.ape_pat, persona.ape_mat, sexo.sexo, 
		TIMESTAMPDIFF(YEAR,persona.fecha_nacimiento,CURDATE()) AS edad, regimayores.celular, 
		regimayores.direccion, barrio.barrio, disciplina.disciplina");

		$this->db->from($table);

		$this->db->join("persona", "$table.dni_estudiante = persona.dni", "INNER");
		$this->db->join("regimayores", "$table.dni_estudiante = regimayores.dni", "INNER");
		$this->db->join("disciplina", "$table.disciplina = disciplina.id_disciplina", "INNER");
		$this->db->join("sexo", "persona.sexo = sexo.id_sexo", "INNER");
		$this->db->join("barrio", "regimayores.barrio = barrio.id_barrio", "INNER");

		$this->db->having('edad >', 19);
		if ($id != 0)
			$this->db->where("disciplina.id_disciplina = $id");

		$query = $this->db->get();

		return $result = $query->num_rows();
	}

	function listTableRows($table, $id = 0)
	{
		$this->db->select("$table.* ");
		$this->db->from($table);



		$query = $this->db->get();

		return $result = $query->num_rows();
	}

}
