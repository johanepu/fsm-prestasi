<?php if (!defined('BASEPATH')) exit('No direct script access allowed');

class Register_model extends CI_Model {

	public function __construct()
	{
		//$this->load->database();
	}

	public function register($data)
	{
		$this->db->insert('users', $data);

		$id = $this->db->insert_id();

		return (isset($id)) ? $id : FALSE;
	}
}
