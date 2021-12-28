<?php defined('BASEPATH') or exit('No direct script access allowed');

class Constancia_model extends CI_Model
{
	function __construct()
	{
		parent::__construct();

	}

	function ListTable($id = 0)
	{

	}

	function getIncripcion($table, $count, $id, $fe)
	{
		$tb_study = 'regestudiante';
		$est_may = '';

		if ($fe) {
			$tb_study = 'regimayores';
			$est_may = ", $tb_study.direccion, barrio.barrio";
		}

		$this->db->select("$table.dni_estudiante as dni, CONCAT(persona.nombres, ' ', persona.ape_pat, ' ', 
		persona.ape_mat) as nombres, sexo.sexo, TIMESTAMPDIFF(YEAR,persona.fecha_nacimiento,CURDATE()) AS edad,
		$tb_study.celular, disciplina.disciplina, especialidad.especialidad, escuela.escuela, cicle.cicle" . $est_may);
		$this->db->from("$table");

		$this->db->join('persona', "$table.dni_estudiante = persona.dni");
		$this->db->join('sexo', 'persona.sexo = sexo.id_sexo');

		$this->db->join("$tb_study", "$table.dni_estudiante = $tb_study.dni");

		if ($fe) {
			$this->db->join('barrio', "$tb_study.barrio = barrio.id_barrio");
		}

		$this->db->join('disciplina', "$table.disciplina = disciplina.id_disciplina");
		$this->db->join('especialidad', "disciplina.especialidad = especialidad.id_especialidad");
		$this->db->join('escuela', "especialidad.escuela = escuela.id_escuela");

		$this->db->join('cicle', "disciplina.cicle = cicle.id_cicle");


		$this->db->where("$table.dni_estudiante = $id");

		if ($count) {

			$query = $this->db->get();

			if ($query->num_rows() > 0) {

				return $query->num_rows();
			}
		} else {

			$query = $this->db->get();

			if ($query->num_rows() > 0) {
				//var_dump($query->result());
				return $query->result();
			}

		}
		return array();
	}

	function getInstitucion($table, $id)
	{
		$this->db->select("$table.dni, institucion.institucion, grado.grado, seccion.seccion");
		$this->db->from("$table");

		$this->db->join('institucion', "$table.institucion = institucion.id_institucion");
		$this->db->join('grado', "$table.grado = grado.id_grado");
		$this->db->join('seccion', "$table.seccion = seccion.id_seccion");

		$this->db->where("dni = $id");

		$query = $this->db->get();

		return $query->result();
	}

	function getResponsable($table, $id)
	{
		$this->db->select("$table.dni_resp, CONCAT(persona.nombres, ' ', persona.ape_pat, ' ', persona.ape_mat) as nombres,
		 estudiante_.dni_resp, $table.celular, $table.direccion, barrio.barrio FROM $table

						INNER JOIN (
							SELECT *FROM regestudiante
							WHERE regestudiante.dni = $id
							
						) AS estudiante_
						
						ON $table.dni_resp = estudiante_.dni_resp");

		$this->db->join('persona', "$table.dni_resp = persona.dni");
		$this->db->join('barrio', "$table.barrio = barrio.id_barrio");

		$query = $this->db->get();

		return $query->result();
	}
}
