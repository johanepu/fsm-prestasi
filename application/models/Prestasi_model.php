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
		$this->db->insert('periode_prestasi', $data_periode);
		$id_periode = $this->db->insert_id();
		return (isset($id_periode)) ? $id_periode : FALSE;
	}

	public function addReward($data)
	{
		$this->db->insert('reward_prestasi', $data);

		$id_reward = $this->db->insert_id();

		return (isset($id_reward)) ? $id_reward : FALSE;
	}

	public function updateRefReward($id_prestasi,$nim,$poin,$data)
	{
		$this->db->where('id_prestasi',$id_prestasi);
		$q = $this->db->get('reward_prestasi');

		if ( $q->num_rows() > 0 )
   	{
			$this->db->query("DELETE FROM reward_prestasi WHERE id_prestasi='$id_prestasi'");
			$this->db->insert('reward_prestasi', $data);
	 		$id_reward = $this->db->insert_id();
	 		return (isset($id_reward)) ? $id_reward : FALSE;
   	} else {
		 $this->db->insert('reward_prestasi', $data);
		 $id_reward = $this->db->insert_id();
		 return (isset($id_reward)) ? $id_reward : FALSE;
   	}
	}

	public function getLastId()
	{
		$this->db->select_max('id_prestasi');
		$this->db->limit(1);
		$query = $this->db->get('user_prestasi');

		if ($query->num_rows() > 0)
    {
        $last_row = $query->result_array();
        $result = $last_row[0]['id_prestasi'];
		}
		return $result;
	}

	public function getLastAI()
	{
		$query = $this->db->query("SELECT `AUTO_INCREMENT`
FROM  INFORMATION_SCHEMA.TABLES
WHERE TABLE_SCHEMA = 'fsm_prestasi'
AND   TABLE_NAME   = 'user_prestasi'");
		if ($query->num_rows() > 0)
		{
				$last_row = $query->result_array();
				$result = $last_row[0]['AUTO_INCREMENT'];
		}
		return $result;
	}

	public function tampil_user_prestasi($nim){
		$this->db->select('*');
		$this->db->from('reward_prestasi');
		$this->db->join('user_prestasi' ,
		'reward_prestasi.id_prestasi = user_prestasi.id_prestasi');
		$this->db->where('reward_prestasi.nim', $nim);
		$hasil = $this->db->get();
		return $hasil->result();
	}

	public function tampil_prestasi_semester($semester_select){
		if ($semester_select == 1) {
			$semester_index = 'Gasal';
		} elseif ($semester_select == 2) {
			$semester_index = 'Genap';
		}
		$this->db->select('*');
		$this->db->from('periode_prestasi');
		$this->db->join('user_prestasi' ,
		'periode_prestasi.id_prestasi = user_prestasi.id_prestasi');
		$this->db->where('periode_prestasi.semester',$semester_index);
		$hasil = $this->db->get();
		return $hasil->result();
	}

	public function tampil_prestasi_periode($periode_select){
		if ($periode_select == 1) {
			$periode_index = '2017';
		} elseif ($periode_select == 2) {
			$periode_index = '2018';
		} elseif ($periode_select == 3) {
			$periode_index = '2019';
		} elseif ($periode_select == 4) {
			$periode_index = '2020';
		}
		$this->db->select('*');
		$this->db->from('periode_prestasi');
		$this->db->join('user_prestasi' ,
		'periode_prestasi.id_prestasi = user_prestasi.id_prestasi');
		$this->db->where('periode_prestasi.periode',$periode_index);
		$hasil = $this->db->get();
		return $hasil->result();
	}

	public function tampil_prestasi_waktu($periode_select,$semester_select){
		if ($periode_select == 1) {
			$periode_index = '2017';
		} elseif ($periode_select == 2) {
			$periode_index = '2018';
		} elseif ($periode_select == 3) {
			$periode_index = '2019';
		} elseif ($periode_select == 4) {
			$periode_index = '2020';
		}
		if ($semester_select == 1) {
			$semester_index = 'Gasal';
		} elseif ($semester_select == 2) {
			$semester_index = 'Genap';
		}
		$this->db->select('*');
		$this->db->from('periode_prestasi');
		$this->db->join('user_prestasi' ,
		'periode_prestasi.id_prestasi = user_prestasi.id_prestasi');
		$this->db->where('periode_prestasi.periode',$periode_index);
		$this->db->where('periode_prestasi.semester',$semester_index);
		$hasil = $this->db->get();
		return $hasil->result();
	}

	public function tampil_all_prestasi(){
		$this->db->select('*');
		$this->db->from('user_prestasi');
		$hasil = $this->db->get();
		return $hasil->result();
	}

	public function tampil_all_reward(){
		$this->db->select('*');
		$this->db->from('reward_prestasi');
		$this->db->join('user_prestasi' ,
		'reward_prestasi.id_prestasi = user_prestasi.id_prestasi');
		$this->db->join('users' ,
		'reward_prestasi.nim = users.nim');
		$hasil = $this->db->get();
		return $hasil->result();;
	}

	public function tampil_reward_status($status_select){
		$this->db->select('*');
		$this->db->from('reward_prestasi');
		$this->db->join('user_prestasi' ,
		'reward_prestasi.id_prestasi = user_prestasi.id_prestasi');
		$this->db->join('users' ,
		'reward_prestasi.nim = users.nim');
		$this->db->where('user_prestasi.validasi',$status_select);
		$hasil = $this->db->get();
		return $hasil->result();;
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
		$this->db->select('reward_prestasi.nim, user_prestasi.nama_prestasi, user_prestasi.reward_poin,
		user_prestasi.jml_anggota');
		$this->db->from('reward_prestasi');
		$this->db->join('user_prestasi' ,
		'reward_prestasi.id_prestasi = user_prestasi.id_prestasi');
		$this->db->where('user_prestasi.id_prestasi', $id_prestasi);
		$hasil = $this->db->get();
		if($hasil->num_rows()>0){
			return $hasil->result();
		}else{
			return false;
		}
	}

	function getAllData($id_prestasi){
		$this->db->select('*');
		$this->db->from('reward_prestasi');
		$this->db->join('user_prestasi' ,
		'reward_prestasi.id_prestasi = user_prestasi.id_prestasi');
		$this->db->join('periode_prestasi' ,
		'reward_prestasi.id_prestasi = periode_prestasi.id_prestasi');
		$this->db->where('user_prestasi.id_prestasi', $id_prestasi);
		$hasil = $this->db->get();
		if($hasil->num_rows()>0){
			return $hasil->result();
		}else{
			return false;
		}
	}

	function updatePrestasi($data,$where){

			$this->db->where($where);
			$this->db->update('user_prestasi',$data);
			return true;
	}

	function updatePeriode($data,$where){

			$this->db->where($where);
			$this->db->update('periode_prestasi',$data);
			return true;
	}

	function updatePoin($data,$where){

			$this->db->where($where);
			$this->db->update('reward_prestasi',$data);
			return true;
	}

	function delete($id){
		$this->db->query("DELETE FROM user_prestasi WHERE id_prestasi='$id'");
		return true;
	}

	function deletePoin($id){
		$this->db->query("DELETE FROM reward_prestasi WHERE id_prestasi='$id'");
		return true;
	}

	function deletePeriode($id){
		$this->db->query("DELETE FROM periode_prestasi WHERE id_prestasi='$id'");
		return true;
	}

	// fungsi dashboard
	public function hitung_user_prestasi($nim){
		$this->db->select('*');
		$this->db->from('reward_prestasi');
		$this->db->where('reward_prestasi.nim', $nim);
		$hasil = $this->db->get();
		$hitung = $hasil->num_rows();
		return $hitung;
	}

	public function hitung_user_prestasi_validasi($nim){
		$this->db->select('*');
		$this->db->from('reward_prestasi');
		$this->db->join('user_prestasi' ,
		'reward_prestasi.id_prestasi = user_prestasi.id_prestasi');
		$this->db->where('reward_prestasi.nim', $nim);
		$this->db->where('user_prestasi.validasi', 1);
		$hasil = $this->db->get();
		$hitung = $hasil->num_rows();
		return $hitung;
	}

	public function hitung_user_prestasi_blmvalidasi($nim){
		$this->db->select('*');
		$this->db->from('reward_prestasi');
		$this->db->join('user_prestasi' ,
		'reward_prestasi.id_prestasi = user_prestasi.id_prestasi');
		$this->db->where('reward_prestasi.nim', $nim);
		$this->db->where('user_prestasi.validasi', 0);
		$hasil = $this->db->get();
		$hitung = $hasil->num_rows();
		return $hitung;
	}

	public function hitung_reward_point($nim){
		$this->db->select('poin');
		$this->db->from('reward_prestasi');
		$this->db->join('user_prestasi' ,
		'reward_prestasi.id_prestasi = user_prestasi.id_prestasi', 'inner');
		$this->db->where('reward_prestasi.nim', $nim);
		$this->db->where('user_prestasi.validasi', 1);
		$query = $this->db->get();
		$result = 0;
		if ($query->result()>0) {
			foreach($query->result() as $row) {
					$result += $row->poin;
			}
		} else {
			$result = 0;
		}
		return $result;
	}


	public function user_reward_point(){
	  $this->db->select('*');
	  $this->db->from('users');
	  $query = $this->db->get();
		if ($query->result()==0) {
			$result[] = 0;
		}else {
			foreach($query->result() as $row) {
		    $nim = (string)$row->nim;
		    $poin = $this->hitung_reward_point($row->nim);
				$result[] = $poin;
		    // $result += $row->reward_poin;
		  }
		}
	  return $result;
	 }

	 public function user_jml_prestasi(){

		 $this->db->select('*');
		 $this->db->from('users');
		 $query = $this->db->get();
		 if ($query->result()==0) {
 			$result[] = 0;
 		 } else {
			 foreach($query->result() as $row) {
				 $nim = (string)$row->nim;
				 $poin = $this->hitung_user_prestasi($row->nim);
				 $result[] = $poin;
				 // $result += $row->reward_poin;
				}
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
		$this->db->from('reward_prestasi');
		$this->db->join('user_prestasi' ,
		'reward_prestasi.id_prestasi = user_prestasi.id_prestasi');
		$this->db->where('reward_prestasi.nim', $nim);
		$this->db->where('user_prestasi.level_prestasi', 1);
		$hasil = $this->db->get();
		$hitung = $hasil->num_rows();
		return $hitung;
	}

	public function hitung_user_prestasi_nasional($nim){
		$this->db->select('*');
		$this->db->from('reward_prestasi');
		$this->db->join('user_prestasi' ,
		'reward_prestasi.id_prestasi = user_prestasi.id_prestasi');
		$this->db->where('reward_prestasi.nim', $nim);
		$this->db->where('user_prestasi.level_prestasi', 3);
		$hasil = $this->db->get();
		$hitung = $hasil->num_rows();
		return $hitung;
	}

	public function hitung_user_prestasi_regional($nim){
		$this->db->select('*');
		$this->db->from('reward_prestasi');
		$this->db->join('user_prestasi' ,
		'reward_prestasi.id_prestasi = user_prestasi.id_prestasi');
		$this->db->where('reward_prestasi.nim', $nim);
		$this->db->where('user_prestasi.level_prestasi', 2);
		$hasil = $this->db->get();
		$hitung = $hasil->num_rows();
		return $hitung;
	}

	public function hitung_user_prestasi_internasional($nim){
		$this->db->select('*');
		$this->db->from('reward_prestasi');
		$this->db->join('user_prestasi' ,
		'reward_prestasi.id_prestasi = user_prestasi.id_prestasi');
		$this->db->where('reward_prestasi.nim', $nim);
		$this->db->where('user_prestasi.level_prestasi', 4);
		$hasil = $this->db->get();
		$hitung = $hasil->num_rows();
		return $hitung;
	}

	public function hitung_user_prestasi_akademik($nim){
		$this->db->select('*');
		$this->db->from('reward_prestasi');
		$this->db->join('user_prestasi' ,
		'reward_prestasi.id_prestasi = user_prestasi.id_prestasi');
		$this->db->where('reward_prestasi.nim', $nim);
		$this->db->where('user_prestasi.jenis_prestasi', 1);
		$hasil = $this->db->get();
		$hitung = $hasil->num_rows();
		return $hitung;
	}
	public function hitung_user_prestasi_non_akademik($nim){
		$this->db->select('*');
		$this->db->from('reward_prestasi');
		$this->db->join('user_prestasi' ,
		'reward_prestasi.id_prestasi = user_prestasi.id_prestasi');
		$this->db->where('reward_prestasi.nim', $nim);
		$this->db->where('user_prestasi.jenis_prestasi', 2);
		$hasil = $this->db->get();
		$hitung = $hasil->num_rows();
		return $hitung;
	}

	public function hitung_user_prestasi_individu($nim){
		$this->db->select('*');
		$this->db->from('reward_prestasi');
		$this->db->join('user_prestasi' ,
		'reward_prestasi.id_prestasi = user_prestasi.id_prestasi');
		$this->db->where('reward_prestasi.nim', $nim);
		$this->db->where('user_prestasi.tipe_prestasi', 1);
		$hasil = $this->db->get();
		$hitung = $hasil->num_rows();
		return $hitung;
	}
	public function hitung_user_prestasi_beregu($nim){
		$this->db->select('*');
		$this->db->from('reward_prestasi');
		$this->db->join('user_prestasi' ,
		'reward_prestasi.id_prestasi = user_prestasi.id_prestasi');
		$this->db->where('reward_prestasi.nim', $nim);
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

	public function getPoinPrestasi($level_prestasi,$peringkat_prestasi){
		$this->db->select('poin');
		$this->db->from('setting_rewarding');
		$this->db->where('level',$level_prestasi);
		$this->db->where('peringkat',$peringkat_prestasi);
		$hasil = $this->db->get();
    $row = $hasil->row();
    if (isset($row))
    {
        return $row->poin;
    }
	}

	public function getIdSetting($level_prestasi,$peringkat_prestasi){
		$this->db->select('id_setting');
		$this->db->from('setting_rewarding');
		$this->db->where('level',$level_prestasi);
		$this->db->where('peringkat',$peringkat_prestasi);
		$hasil = $this->db->get();
		$row = $hasil->row();
		if (isset($row))
		{
				return $row->id_setting;
		}
	}

	public function getLevelValue(){
		$this->db->select('level, nama_level');
		$this->db->from('setting_rewarding');
		$this->db->distinct();
		$result = $this->db->get();
		return $result->result();
	}


}
