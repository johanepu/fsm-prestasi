<?php if (!defined('BASEPATH')) exit('No direct script access allowed');

class Prestasi_model extends CI_Model {

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
			 $this->db->where('(nama_prestasi LIKE "%'.$query.'%")', NULL, FALSE);
			 $this->db->limit($number, $offset);
			 $isi = $this->db->get();
			 return $isi;
			 // $query = $this->db->get('client',$number,$offset)->result();
	}

	function getPrestasi($id_prestasi){
		$result=$this->db->query("SELECT * FROM user_prestasi WHERE id_prestasi='$id_prestasi'");
		if($result->num_rows()>0){
			return $result->result();
		}else{
			return false;
		}
	}
}
