<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Admin_setting extends CI_Controller {

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
				$this->load->model('User_model');
        // Gabole ga login bro
        if($this->session->userdata('status') != "login"){
          redirect("Admin_login");
        }
      }

	public function index()
	{
		$nim = $this->session->userdata('nim');
		$data['jml_prestasi'] = $this->Prestasi_model->hitung_all_prestasi();
		$data['jml_prestasi_validasi'] = $this->Prestasi_model->hitung_all_prestasi_validasi();
		$data['jml_prestasi_blmvalidasi'] = $this->Prestasi_model->hitung_all_prestasi_blmvalidasi();
		$data['jml_user'] = $this->User_model->hitung_all_user();
		$data['user'] = $this->User_model->tampil_all_user();
		$data['reward_poin'] = $this->Prestasi_model->user_reward_point();
		$data['jml_prestasi_user'] = $this->Prestasi_model->user_jml_prestasi();
		$data['jml_prestasi_lokal'] = $this->Prestasi_model->hitung_all_prestasi_lokal();
		$data['jml_prestasi_nasional'] = $this->Prestasi_model->hitung_all_prestasi_nasional();
		$data['jml_prestasi_regional'] = $this->Prestasi_model->hitung_all_prestasi_regional();
		$data['jml_prestasi_internasional'] = $this->Prestasi_model->hitung_all_prestasi_internasional();
		$data['jml_prestasi_akademik'] = $this->Prestasi_model->hitung_all_prestasi_akademik();
		$data['jml_prestasi_non_akademik'] = $this->Prestasi_model->hitung_all_prestasi_non_akademik();
		$data['jml_prestasi_individu'] = $this->Prestasi_model->hitung_all_prestasi_individu();
		$data['jml_prestasi_beregu'] = $this->Prestasi_model->hitung_all_prestasi_beregu();
		// $this->load->view('user_home');
		$data['content'] = 'kucing/admin_setting.php';
		$this->load->view("kucing/admin_template.php",$data);

	}
}
