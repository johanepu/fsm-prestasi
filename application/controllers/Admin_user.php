<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Admin_user extends CI_Controller {

	public function __construct() {
	parent::__construct();

				// Load form helper library
				$this->load->helper('form');

				// Load form validation library
				$this->load->library('form_validation');

				// Load session library
				$this->load->library('session');

				// Load pagination library
				$this->load->library('pagination');

				// Load database
				$this->load->model('User_model');
				$this->load->model('Prestasi_model');
				// Gabole login bro
				if(isset($this->session->userdata['logged_in'])){
					redirect('Admin_home', 'refresh');
				}
				if($this->session->userdata('status') != "login"){
					redirect("Admin_login");
				}
			}

	public function index()
	{
		$nim = '';
		$data['title'] = 'RewardMe - Data Mahasiswa';
		$data['user'] = $this->User_model->tampil_all_user();
		$data['reward_poin'] = $this->Prestasi_model->user_reward_point();
		$data['content'] = 'kucing/data_master_user.php';
		$this->load->view("kucing/admin_template.php",$data);
	}

	function check_default($post_string)
	{
		return $post_string == '0' ? FALSE : TRUE;
	}

	function fetchData(){
		$nim = $this->session->userdata('nim');
		$id_prestasi= $this->input->post('id_prestasi');
		$result=$this->Prestasi_model->getPrestasi($id_prestasi);

		echo json_encode($result);
	}


	public function lihat_user($nim){

		$data['data_user'] = $this->User_model->lihat_user($nim);
		$data['prestasi_user'] = $this->Prestasi_model->tampil_user_prestasi($nim);
		$data['jml_prestasi'] = $this->Prestasi_model->hitung_user_prestasi($nim);
		$data['jml_prestasi_validasi'] = $this->Prestasi_model->hitung_user_prestasi_validasi($nim);
		$data['jml_prestasi_blmvalidasi'] = $this->Prestasi_model->hitung_user_prestasi_blmvalidasi($nim);
		$data['jml_reward_point'] = $this->Prestasi_model->hitung_reward_point($nim);
		$data['jml_prestasi_lokal'] = $this->Prestasi_model->hitung_user_prestasi_lokal($nim);
		$data['jml_prestasi_nasional'] = $this->Prestasi_model->hitung_user_prestasi_nasional($nim);
		$data['jml_prestasi_regional'] = $this->Prestasi_model->hitung_user_prestasi_regional($nim);
		$data['jml_prestasi_internasional'] = $this->Prestasi_model->hitung_user_prestasi_internasional($nim);
		$data['jml_prestasi_akademik'] = $this->Prestasi_model->hitung_user_prestasi_akademik($nim);
		$data['jml_prestasi_non_akademik'] = $this->Prestasi_model->hitung_user_prestasi_non_akademik($nim);
		$data['jml_prestasi_individu'] = $this->Prestasi_model->hitung_user_prestasi_individu($nim);
		$data['jml_prestasi_beregu'] = $this->Prestasi_model->hitung_user_prestasi_beregu($nim);

		$data['title'] = 'RewardMe - Profil Mahasiswa';
		$data['content'] = 'kucing/view_user.php';
		$this->load->view("kucing/admin_template.php",$data);
	}

	function userData(){
		$nim = $this->input->post('nim');
		$result=$this->User_model->getProfil($nim);

		echo json_encode($result);
	}

	function updateUser(){

		date_default_timezone_set('Asia/Jakarta');
		//set user data
		$namalengkap= $this->input->post('namalengkap');
		$email=$this->input->post('email');
		$alamat=$this->input->post('alamat');
		$tingkatan=$this->input->post('tingkatan');
		$nomor_hp=$this->input->post('nomor_hp');
		$nim = $this->input->post('nim');

		$data=array(
			'namalengkap'=> $this->input->post('namalengkap'),
			'email'=>$this->input->post('email'),
			'alamat'=>$this->input->post('alamat'),
			'tingkatan'=>$this->input->post('tingkatan'),
			'nomor_hp'=>$this->input->post('nomor_hp'),
		);

		$where = array(
			'nim'=> $nim
		);

		$result=$this->User_model->updateProfil($data,$where);
		//set user data
		$this->session->set_userdata('namalengkap',$namalengkap);
		$this->session->set_userdata('email',$email);
		$this->session->set_userdata('alamat',$alamat);
		$this->session->set_userdata('tingkatan',$tingkatan);
		$this->session->set_userdata('nomor_hp',$nomor_hp);

	}

	function delete(){
		$nim = $this->input->post('nim');
		$result=$this->User_model->deleteUser($nim);
	}



}
