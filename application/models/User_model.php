<?php if (!defined('BASEPATH')) exit('No direct script access allowed');

class User_model extends CI_Model {

	public function __construct()
	{
		//$this->load->database();
	}

	public function add_prestasi($data)
	{
		$this->db->insert('user_prestasi', $data);

		$id = $this->db->insert_id();

		return (isset($id)) ? $id : FALSE;
	}

	public function tampil_all_user(){
		$this->db->select('*');
		$this->db->from('users');
		$hasil = $this->db->get();
		return $hasil->result();
	}

	public function tampil_top_user(){
		$this->db->select('*');
		$this->db->order_by('date_created', 'ASC');
		$this->db->from('users');
		$this->db->limit('6');
		$hasil = $this->db->get();
		return $hasil->result();
	}

	public function tampil_user_prestasi($nim){
		$this->db->select('*');
		$this->db->from('user_prestasi');
		  $this->db->where('user_prestasi.nim', $nim);
		$hasil = $this->db->get();
		return $hasil->result();
	}

	function prestasi_per_page($number,$offset, $nim, $query){
			 $this->db->select('*');
			 $this->db->from('user_prestasi');
			 $this->db->where('nim', $nim);
			 $this->db->where('(nama_prestasi LIKE "%'.$query.'%" OR peringkat_prestasi LIKE "%'.$query.'%")', NULL, FALSE);
			 $this->db->limit($number, $offset);
			 $isi = $this->db->get();
			 return $isi;
			 // $query = $this->db->get('client',$number,$offset)->result();
	}

	function getProfil($nim){
		$result=$this->db->query("SELECT * FROM users WHERE nim='$nim'");
		if($result->num_rows()>0){
			return $result->result();
		}else{
			return false;
		}
	}

	function lihat_user($nim){
		$this->db->select('*');
		$this->db->from('users');
		$this->db->where('users.nim', $nim);
		$hasil = $this->db->get();
		return $hasil->result();
	}

	function updateProfil($data,$where){

			$this->db->where($where);
			$this->db->update('users',$data);
	}

	function delete($id){
		return $this->db->query("DELETE FROM user_prestasi WHERE id_prestasi='$id'");
	}

	public function GetNimRow($keyword) {
        $this->db->order_by('nim', 'DESC');
        $this->db->like("nim", $keyword);
				$this->db->limit(6);
        return $this->db->get('users')->result_array();
    }
		//fungsi dashboard
	public function hitung_all_user(){
		$this->db->select('*');
		$this->db->from('users');
		$hasil = $this->db->get();
		$hitung = $hasil->num_rows();
		return $hitung;
	}

	function searchNim($nim){
        $this->db->like('nim', $title , 'both');
        $this->db->order_by('nim', 'ASC');
        $this->db->limit(10);
        return $this->db->get('users')->result();
    }




}
