<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class User_home extends CI_Controller {

	public function __construct() {
	parent::__construct();

				// Load form helper library
				$this->load->helper('form');

				// Load form validation library
				$this->load->library('form_validation');

				// Load session library
				$this->load->library('session');

				// Load database
				$this->load->model('Login_model');
				$this->load->model('Prestasi_model');
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
		// $this->load->view('user_home');
		$data['content'] = 'user_home.php';
		$this->load->view("user_template.php",$data);

	}
}
