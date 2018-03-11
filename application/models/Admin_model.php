<?php if (!defined('BASEPATH')) exit('No direct script access allowed');

class Admin_model extends CI_Model {

	public function __construct()
	{
		//$this->load->database();
	}

  function getSetting($id_setting){
    $result=$this->db->query("SELECT * FROM setting_admin WHERE id_setting='$id_setting'");
    if($result->num_rows()>0){
      return $result->result();
    }else{
      return false;
    }
  }

  function updateSetting($data,$where){
      $this->db->where($where);
      $this->db->update('setting_admin',$data);
  }

  function getPeriode(){
    $query = $this->db->query("SELECT periode FROM setting_admin");
    $row = $query->row();
    if (isset($row))
    {
        return $row->periode;
    }
  }

  function getSemester(){
    $query = $this->db->query("SELECT semester FROM setting_admin");
    $row = $query->row();
    if (isset($row))
    {
        return $row->semester;
    }
  }

	public function cekAdmin($username, $password){

		$this->db->select('*');
		$this->db->from('admin');
		$this->db->where('username',$username);
		$this->db->where('password',$password);

		if($query=$this->db->get())
		{
				$admin_login =  $query->row_array();
				return $admin_login;
		}
		else{
			return false;
		}
	}

	function resetPoin($reset){
			$this->db->select('reward_poin','validasi');
			$this->db->from('user_prestasi');
			$this->db->update('user_prestasi',$reset);

			return true;
	}

	function resetPrestasi(){
			$this->db->empty_table('user_prestasi');

			return true;
	}

	function resetUser(){
			$this->db->empty_table('users');

			return true;
	}


}
