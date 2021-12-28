<?php defined('BASEPATH') or exit('No direct script access allowed');

class Adulto_model extends CI_Model
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

    function listAdult($table)
	{
		$this->db->select("$table.dni, persona.nombres, persona.ape_pat, persona.ape_mat, sexo.sexo, 
		TIMESTAMPDIFF(YEAR,persona.fecha_nacimiento,CURDATE()) AS edad, $table.direccion, barrio.barrio, $table.celular");

		$this->db->from("$table");

		$this->db->join("persona", "$table.dni = persona.dni", "inner");
		$this->db->join("barrio", "$table.barrio = barrio.id_barrio", "inner");
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
