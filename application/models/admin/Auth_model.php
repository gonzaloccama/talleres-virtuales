<?php defined('BASEPATH') or exit('No direct script access allowed');

class Auth_model extends CI_Model
{
	function __construct()
	{
		parent::__construct();

	}

	function authSession($user, $pass)
	{
		$data = $this->db->get_where("users", array("email" => $user, "pass" => $pass), 1);

		if (!$data->result())
			return false;

		return $data->row();
	}
}
