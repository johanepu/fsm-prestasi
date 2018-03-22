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

	public function tampil_set_reward(){
		$this->db->select('*');
		$this->db->from('setting_rewarding');
		$hasil = $this->db->get();
		return $hasil->result();
	}

	public function getRewardSet($id_setting){
		$this->db->select('*');
		$this->db->where('id_setting',$id_setting);
		$this->db->from('setting_rewarding');
		$hasil = $this->db->get();
		return $hasil->result();
	}

  function updateSetting($data,$where){
      $this->db->where($where);
      $this->db->update('setting_admin',$data);
  }

	function updateSetReward($data,$where){
			$this->db->where($where);
			$this->db->update('setting_rewarding',$data);
			return true;
	}

	function updateSetPrestasi($data,$where){
			$validasi=$data['validasi'];
			$poin=$data['poin'];
			$reward_point=$data['reward_poin'];
			$level=$data['level'];
			$peringkat=$data['peringkat'];

			$periode=$where['periode'];
			$semester=$where['semester'];
			$id_setting=$where['id_setting'];

			// $this->db->set('user_prestasi.validasi',$validasi);
			// $this->db->set('user_prestasi.reward_poin',$reward_point);
			// $this->db->set('reward_prestasi.poin',$poin);
			// $this->db->where('periode_prestasi.periode',$periode);
			// $this->db->where('periode_prestasi.semester',$semester);
			// $this->db->where('user_prestasi.level_prestasi',$level);
			// $this->db->where('user_prestasi.peringkat_prestasi',$peringkat);
			// $this->db->update('reward_prestasi JOIN user_prestasi ON
			// reward_prestasi.id_prestasi = user_prestasi.id_prestasi JOIN
			// periode_prestasi ON reward_prestasi.prestasi_id = periode_prestasi.id_prestasi');
			$this->db->query("UPDATE reward_prestasi a
    JOIN user_prestasi b ON a.id_prestasi = b.id_prestasi
    JOIN periode_prestasi c ON a.id_prestasi = c.id_prestasi
		SET a.poin = '$poin',b.validasi = '$validasi', b.reward_poin = '$reward_point',
		b.level_prestasi = '$level', b.peringkat_prestasi = '$peringkat'
		WHERE c.periode = '$periode' AND c.semester = '$semester'
		AND b.id_setting = '$id_setting'");
			return true;
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

	public function simpanSetReward($data)
	{
		$this->db->insert('setting_rewarding', $data);

		$id_setting = $this->db->insert_id();

		return (isset($id_setting)) ? $id_setting : FALSE;
	}

	function deleteSet($id_setting){
		return $this->db->query("DELETE FROM setting_rewarding WHERE id_setting='$id_setting'");
	}


}
