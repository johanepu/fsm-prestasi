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


}
