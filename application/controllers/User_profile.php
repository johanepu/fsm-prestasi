<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class User_profile extends CI_Controller {

	public function __construct() {
	parent::__construct();

				// Load form helper library
				$this->load->helper('form');

				// Load form validation library
				$this->load->library('form_validation');

				// Load session library
				$this->load->library('session');

				// Load database
				$this->load->model('Prestasi_model');
				$this->load->model('User_model');
				}

	public function index()
	{
		$nim = $this->session->userdata('nim');
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
		// $this->load->view('user_home');
		$data['content'] = 'user_profile.php';
		$this->load->view("user_template.php",$data);

	}

	function fetchData(){
		$nim = $this->session->userdata('nim');
		$result=$this->User_model->getProfil($nim);

		echo json_encode($result);
	}
}
