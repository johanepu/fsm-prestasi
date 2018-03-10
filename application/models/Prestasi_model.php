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

	public function addPrestasiPeriode($data_periode)
	{
		// $id_prestasi = $this->add_prestasi($data);
		// $id_prestasi_periode = array(
		// 							'id_prestasi' => $id_prestasi
		// 				);
		//
		// array_push($data_periode, $id_prestasi_periode);

		$this->db->insert('periode_prestasi', $data_periode);
		$id_periode = $this->db->insert_id();
		return (isset($id_periode)) ? $id_periode : FALSE;
	}



	public function tampil_user_prestasi($nim){
		$this->db->select('*');
		$this->db->from('user_prestasi');
		$this->db->where('user_prestasi.nim', $nim);
		$hasil = $this->db->get();
		return $hasil->result();
	}

	public function tampil_all_prestasi(){
		$this->db->select('*');
		$this->db->from('user_prestasi');
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

	function getPrestasi($id_prestasi){
		$result=$this->db->query("SELECT * FROM user_prestasi WHERE id_prestasi='$id_prestasi'");
		if($result->num_rows()>0){
			return $result->result();
		}else{
			return false;
		}
	}

	function updatePrestasi($data,$where){

			$this->db->where($where);
			$this->db->update('user_prestasi',$data);
	}

	function delete($id){
		return $this->db->query("DELETE FROM user_prestasi WHERE id_prestasi='$id'");
	}

	// fungsi dashboard
	public function hitung_user_prestasi($nim){
		$this->db->select('*');
		$this->db->from('user_prestasi');
		$this->db->where('user_prestasi.nim', $nim);
		$hasil = $this->db->get();
		$hitung = $hasil->num_rows();
		return $hitung;
	}

	public function hitung_user_prestasi_validasi($nim){
		$this->db->select('*');
		$this->db->from('user_prestasi');
		$this->db->where('user_prestasi.nim', $nim);
		$this->db->where('user_prestasi.validasi', 1);
		$hasil = $this->db->get();
		$hitung = $hasil->num_rows();
		return $hitung;
	}

	public function hitung_user_prestasi_blmvalidasi($nim){
		$this->db->select('*');
		$this->db->from('user_prestasi');
		$this->db->where('user_prestasi.nim', $nim);
		$this->db->where('user_prestasi.validasi', 0);
		$hasil = $this->db->get();
		$hitung = $hasil->num_rows();
		return $hitung;
	}

	public function hitung_reward_point($nim){
		$this->db->select_sum('reward_poin');
		$this->db->where('user_prestasi.nim', $nim);
		$this->db->where('user_prestasi.validasi', 1);
		$query = $this->db->get('user_prestasi');
		$result = 0;
		foreach($query->result() as $row) {
				$result += $row->reward_poin;
		}

		return $result;
	}


	public function user_reward_point(){
	  $this->db->select('*');
	  $this->db->from('users');
	  $query = $this->db->get();
	  foreach($query->result() as $row) {
	    $nim = (string)$row->nim;
	    $poin = $this->hitung_reward_point($row->nim);
	    $result[] = $poin;
	    // $result += $row->reward_poin;
	  }

	  return $result;
	 }

	 public function user_jml_prestasi(){
		 $this->db->select('*');
		 $this->db->from('users');
		 $query = $this->db->get();
		 foreach($query->result() as $row) {
			 $nim = (string)$row->nim;
			 $poin = $this->hitung_user_prestasi($row->nim);
			 $result[] = $poin;
			 // $result += $row->reward_poin;
		 }

		 return $result;
		}

	 public function top_user_reward_point(){
		 $this->db->select('*');
		 $this->db->order_by('date_created', 'ASC');
		 $this->db->from('users');
		 $this->db->limit('6');
		 $query = $this->db->get();
		 foreach($query->result() as $row) {
			 $nim = (string)$row->nim;
			 $poin = $this->hitung_reward_point($row->nim);
			 $result[] = $poin;
			 // $result += $row->reward_poin;
		 }

		 return $result;
		}

	public function hitung_user_prestasi_lokal($nim){
		$this->db->select('*');
		$this->db->from('user_prestasi');
		$this->db->where('user_prestasi.nim', $nim);
		$this->db->where('user_prestasi.level_prestasi', 1);
		$hasil = $this->db->get();
		$hitung = $hasil->num_rows();
		return $hitung;
	}

	public function hitung_user_prestasi_nasional($nim){
		$this->db->select('*');
		$this->db->from('user_prestasi');
		$this->db->where('user_prestasi.nim', $nim);
		$this->db->where('user_prestasi.level_prestasi', 2);
		$hasil = $this->db->get();
		$hitung = $hasil->num_rows();
		return $hitung;
	}

	public function hitung_user_prestasi_regional($nim){
		$this->db->select('*');
		$this->db->from('user_prestasi');
		$this->db->where('user_prestasi.nim', $nim);
		$this->db->where('user_prestasi.level_prestasi', 3);
		$hasil = $this->db->get();
		$hitung = $hasil->num_rows();
		return $hitung;
	}

	public function hitung_user_prestasi_internasional($nim){
		$this->db->select('*');
		$this->db->from('user_prestasi');
		$this->db->where('user_prestasi.nim', $nim);
		$this->db->where('user_prestasi.level_prestasi', 4);
		$hasil = $this->db->get();
		$hitung = $hasil->num_rows();
		return $hitung;
	}

	public function hitung_user_prestasi_akademik($nim){
		$this->db->select('*');
		$this->db->from('user_prestasi');
		$this->db->where('user_prestasi.nim', $nim);
		$this->db->where('user_prestasi.jenis_prestasi', 1);
		$hasil = $this->db->get();
		$hitung = $hasil->num_rows();
		return $hitung;
	}
	public function hitung_user_prestasi_non_akademik($nim){
		$this->db->select('*');
		$this->db->from('user_prestasi');
		$this->db->where('user_prestasi.nim', $nim);
		$this->db->where('user_prestasi.jenis_prestasi', 2);
		$hasil = $this->db->get();
		$hitung = $hasil->num_rows();
		return $hitung;
	}

	public function hitung_user_prestasi_individu($nim){
		$this->db->select('*');
		$this->db->from('user_prestasi');
		$this->db->where('user_prestasi.nim', $nim);
		$this->db->where('user_prestasi.tipe_prestasi', 1);
		$hasil = $this->db->get();
		$hitung = $hasil->num_rows();
		return $hitung;
	}
	public function hitung_user_prestasi_beregu($nim){
		$this->db->select('*');
		$this->db->from('user_prestasi');
		$this->db->where('user_prestasi.nim', $nim);
		$this->db->where('user_prestasi.tipe_prestasi', 2);
		$hasil = $this->db->get();
		$hitung = $hasil->num_rows();
		return $hitung;
	}

	public function hitung_all_prestasi(){
		$this->db->select('*');
		$this->db->from('user_prestasi');
		$hasil = $this->db->get();
		$hitung = $hasil->num_rows();
		return $hitung;
	}

	public function hitung_all_prestasi_validasi(){
		$this->db->select('*');
		$this->db->from('user_prestasi');
		$this->db->where('user_prestasi.validasi', 1);
		$hasil = $this->db->get();
		$hitung = $hasil->num_rows();
		return $hitung;
	}

	public function hitung_all_prestasi_blmvalidasi(){
		$this->db->select('*');
		$this->db->from('user_prestasi');
		$this->db->where('user_prestasi.validasi', 0);
		$hasil = $this->db->get();
		$hitung = $hasil->num_rows();
		return $hitung;
	}

	public function hitung_all_prestasi_lokal(){
		$this->db->select('*');
		$this->db->from('user_prestasi');
		$this->db->where('user_prestasi.level_prestasi', 1);
		$hasil = $this->db->get();
		$hitung = $hasil->num_rows();
		return $hitung;
	}

	public function hitung_all_prestasi_nasional(){
		$this->db->select('*');
		$this->db->from('user_prestasi');
		$this->db->where('user_prestasi.level_prestasi', 2);
		$hasil = $this->db->get();
		$hitung = $hasil->num_rows();
		return $hitung;
	}

	public function hitung_all_prestasi_regional(){
		$this->db->select('*');
		$this->db->from('user_prestasi');
		$this->db->where('user_prestasi.level_prestasi', 3);
		$hasil = $this->db->get();
		$hitung = $hasil->num_rows();
		return $hitung;
	}

	public function hitung_all_prestasi_internasional(){
		$this->db->select('*');
		$this->db->from('user_prestasi');
		$this->db->where('user_prestasi.level_prestasi', 4);
		$hasil = $this->db->get();
		$hitung = $hasil->num_rows();
		return $hitung;
	}

	public function hitung_all_prestasi_akademik(){
		$this->db->select('*');
		$this->db->from('user_prestasi');
		$this->db->where('user_prestasi.jenis_prestasi', 1);
		$hasil = $this->db->get();
		$hitung = $hasil->num_rows();
		return $hitung;
	}
	public function hitung_all_prestasi_non_akademik(){
		$this->db->select('*');
		$this->db->from('user_prestasi');
		$this->db->where('user_prestasi.jenis_prestasi', 2);
		$hasil = $this->db->get();
		$hitung = $hasil->num_rows();
		return $hitung;
	}

	public function hitung_all_prestasi_individu(){
		$this->db->select('*');
		$this->db->from('user_prestasi');
		$this->db->where('user_prestasi.tipe_prestasi', 1);
		$hasil = $this->db->get();
		$hitung = $hasil->num_rows();
		return $hitung;
	}
	public function hitung_all_prestasi_beregu(){
		$this->db->select('*');
		$this->db->from('user_prestasi');
		$this->db->where('user_prestasi.tipe_prestasi', 2);
		$hasil = $this->db->get();
		$hitung = $hasil->num_rows();
		return $hitung;
	}




}
