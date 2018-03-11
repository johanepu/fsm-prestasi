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
				$this->load->model('Admin_model');
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

		$data['title'] = 'RewardMe - Pengaturan Admin';
		$data['content'] = 'kucing/admin_setting.php';
		$this->load->view("kucing/admin_template.php",$data);

	}

	function fetchSetting(){
		$id_setting = 1;
		$result=$this->Admin_model->getSetting($id_setting);

		echo json_encode($result);
	}

	function updateSetting(){

		$data=array(
			'judul_pengumuman'=> $this->input->post('judul_pengumuman'),
			'pesan_admin'=>$this->input->post('pesan_admin'),
			'periode'=>$this->input->post('periode'),
			'semester'=>$this->input->post('semester')
		);

		$where = array(
			'id_setting'=> 1
		);

		$this->Admin_model->updateSetting($data,$where);

	}

	function resetPoin(){

		$data = array(
			'username' => $this->input->post('username'),
			'password' => $this->input->post('password')
		);

		$result=$this->Admin_model->cekAdmin($data['username'],md5($data['password']));

		if($result)
		{
			$reset = array(
				'reward_poin' => 0,
				'validasi' => 0
			);

			if ($this->Admin_model->resetPoin($reset)) {
				$this->session->set_flashdata('reset_status',
	      '  <div class="col-md-12 alert alert-success alert-dismissible fade show" role="alert">
	        <strong>Reset Poin berhasil!</strong> Silakan cek kembali untuk kebenaran data.
	        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
	          <span aria-hidden="true">×</span>
	        </button>
	      </div> ');
				redirect('Admin_setting');
			}else {
				$this->session->set_flashdata('reset_status',
	      '  <div class="col-md-12 alert alert-danger alert-dismissible fade show" role="alert">
	        <strong>Reset Poin gagal!</strong> Silakan cek kembali untuk kebenaran data.
	        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
	          <span aria-hidden="true">×</span>
	        </button>
	      </div> ');
				redirect('Admin_setting');
			}
		}
	}
}
