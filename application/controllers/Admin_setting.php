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

		$data['reward_set'] = $this->Admin_model->tampil_set_reward();
		$data['title'] = 'RewardMe - Pengaturan Admin';
		$data['content'] = 'kucing/admin_setting.php';
		$this->load->view("kucing/admin_template.php",$data);

	}

	function fetchSetting(){
		$id_setting = 1;
		$result=$this->Admin_model->getSetting($id_setting);

		echo json_encode($result);
	}

	function fetchReward(){
		$id_setting = $this->input->post('id_setting');
		$result=$this->Admin_model->getRewardSet($id_setting);

		echo json_encode($result);
	}

	function updateSetting(){

		$data=array(
			'judul_pengumuman'=> $this->input->post('judul_pengumuman'),
			'pesan_admin'=>$this->input->post('pesan_admin'),
		);

		$where = array(
			'id_setting'=> 1
		);

		$this->Admin_model->updateSetting($data,$where);

	}

	function updateSetReward(){
		date_default_timezone_set('Asia/Jakarta');
		$date_now = date("Y/m/d");
		$thn = strtok($date_now, '/');

		$datetime = new DateTime();
		$bulan_gasal = $datetime->createFromFormat('d/m/Y','15/07/Y');
		$bulan_genap = $datetime->createFromFormat('d/m/Y','15/03/Y');
		if ($date_now >= $bulan_gasal && $date_now < $bulan_genap) {
			$semester = 'Gasal';
		} else {
			$semester = 'Genap';
		}

		$level = $this->input->post('level');
		if ($level == 1) {
			$nama_level = 'Lokal';
		} elseif ($level == 2) {
			$nama_level = 'Regional';
		} elseif ($level == 3) {
			$nama_level = 'Nasional';
		} elseif ($level == 4) {
			$nama_level = 'Internasional';
		}

		$data1=array(
			'validasi'=> 0,
			'poin'=> 0,
			'reward_poin'=>$this->input->post('poin'),
			'level'=> $level,
			'peringkat'=>$this->input->post('peringkat')
		);

		$where1 = array(
			'periode'=> $thn,
			'semester'=> $semester,
			'id_setting'=> $this->input->post('id_setting')
		);

		$data=array(
			'level'=> $level,
			'nama_level'=> $nama_level,
			'peringkat'=>$this->input->post('peringkat'),
			'poin'=>$this->input->post('poin')
		);

		$where = array(
			'id_setting'=> $this->input->post('id_setting')
		);

		if ($this->Admin_model->updateSetReward($data,$where) == true && $this->Admin_model->updateSetPrestasi($data1,$where1) == true){
			$this->session->set_flashdata('alrt1',
			'<div class="col-md-12 alert alert-warning alert-dismissible fade show" role="alert">
        <strong>Perubahan set berhasil.Pembaruan Poin Diperlukan!</strong>  <br>
				Data untuk periode tahun <strong>'.$thn.'</strong> semester <strong>'.$semester.'</strong>
				perlu di validasi ulang!
        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
          <span aria-hidden="true">×</span>
        </button>
      </div>');
		}else {
			$this->session->set_flashdata('alrt1',
			'  <div class="col-md-12 alert alert-danger alert-dismissible fade show" role="alert">
				<strong>Update set reward gagal!</strong> Silakan cek kembali untuk kebenaran data.
				<button type="button" class="close" data-dismiss="alert" aria-label="Close">
					<span aria-hidden="true">×</span>
				</button>
			</div> ');
		}
	}

	function simpanSetReward(){

		$level = $this->input->post('level');
		if ($level == 1) {
			$nama_level = 'Lokal';
		} elseif ($level == 2) {
			$nama_level = 'Regional';
		} elseif ($level == 3) {
			$nama_level = 'Nasional';
		} elseif ($level == 4) {
			$nama_level = 'Internasional';
		}

		$data=array(
			'peringkat'=> $this->input->post('peringkat'),
			'level'=> $level,
			'nama_level'=> $nama_level,
			'poin'=> $this->input->post('poin')
		);
		if ($this->Admin_model->simpanSetReward($data)) {
			$this->session->set_flashdata('alrt1',
			'  <div class="col-md-12 alert alert-success alert-dismissible fade show" role="alert">
				<strong>Tambah set berhasil!</strong> Silakan cek kembali untuk kebenaran data.
				<button type="button" class="close" data-dismiss="alert" aria-label="Close">
					<span aria-hidden="true">×</span>
				</button>
			</div> ');
			redirect('Admin_setting', 'refresh');
		}else {
			$this->session->set_flashdata('alrt1',
			'  <div class="col-md-12 alert alert-danger alert-dismissible fade show" role="alert">
				<strong>Tambah set gagal!</strong> Silakan cek kembali untuk kebenaran data.
				<button type="button" class="close" data-dismiss="alert" aria-label="Close">
					<span aria-hidden="true">×</span>
				</button>
			</div> ');
			redirect('Admin_setting', 'refresh');
		}

	}

	function deleteSet(){
		$id_setting = $this->input->post('id_setting');
		$result=$this->Admin_model->deleteSet($id_setting);
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

			if ($this->Admin_model->resetPoin($reset) == true) {
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
		}else {
			$this->session->set_flashdata('reset_status',
			'  <div class="col-md-12 alert alert-danger alert-dismissible fade show" role="alert">
				<strong>Reset Poin gagal!</strong> Data admin yang dimasukan salah
				<button type="button" class="close" data-dismiss="alert" aria-label="Close">
					<span aria-hidden="true">×</span>
				</button>
			</div> ');
			redirect('Admin_setting');
		}
	}

	function resetPrestasi(){

		$data = array(
			'username' => $this->input->post('username'),
			'password' => $this->input->post('password')
		);

		$result=$this->Admin_model->cekAdmin($data['username'],md5($data['password']));

		if($result)
		{

			if ($this->Admin_model->resetPrestasi() == true) {
				$this->session->set_flashdata('reset_status',
	      '  <div class="col-md-12 alert alert-success alert-dismissible fade show" role="alert">
	        <strong>Reset Data Prestasi berhasil!</strong> Semua data prestasi telah berhasil dihapus.
	        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
	          <span aria-hidden="true">×</span>
	        </button>
	      </div> ');
				redirect('Admin_setting');
			}else {
				$this->session->set_flashdata('reset_status',
	      '  <div class="col-md-12 alert alert-danger alert-dismissible fade show" role="alert">
	        <strong>Reset Data Prestasi gagal!</strong> Silakan cek kembali untuk kebenaran data.
	        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
	          <span aria-hidden="true">×</span>
	        </button>
	      </div> ');
				redirect('Admin_setting');
			}
		}else {
			$this->session->set_flashdata('reset_status',
			'  <div class="col-md-12 alert alert-danger alert-dismissible fade show" role="alert">
				<strong>Reset Data Prestasi gagal!</strong> Data admin yang dimasukan salah
				<button type="button" class="close" data-dismiss="alert" aria-label="Close">
					<span aria-hidden="true">×</span>
				</button>
			</div> ');
			redirect('Admin_setting');
		}
	}

	function resetUser(){

		$data = array(
			'username' => $this->input->post('username'),
			'password' => $this->input->post('password')
		);

		$result=$this->Admin_model->cekAdmin($data['username'],md5($data['password']));

		if($result)
		{

			if ($this->Admin_model->resetUser() == true) {
				$this->session->set_flashdata('reset_status',
				'  <div class="col-md-12 alert alert-success alert-dismissible fade show" role="alert">
					<strong>Reset Data Mahasiswa berhasil!</strong> Semua data mahasiswa berhasil dihapus.
					<button type="button" class="close" data-dismiss="alert" aria-label="Close">
						<span aria-hidden="true">×</span>
					</button>
				</div> ');
				redirect('Admin_setting');
			}else {
				$this->session->set_flashdata('reset_status',
				'  <div class="col-md-12 alert alert-danger alert-dismissible fade show" role="alert">
					<strong>Reset Data Mahasiswa gagal!</strong> Silakan cek kembali untuk kebenaran data.
					<button type="button" class="close" data-dismiss="alert" aria-label="Close">
						<span aria-hidden="true">×</span>
					</button>
				</div> ');
				redirect('Admin_setting');
			}
		}else {
			$this->session->set_flashdata('reset_status',
			'  <div class="col-md-12 alert alert-danger alert-dismissible fade show" role="alert">
				<strong>Reset Data Mahasiswa gagal!</strong> Data admin yang dimasukan salah
				<button type="button" class="close" data-dismiss="alert" aria-label="Close">
					<span aria-hidden="true">×</span>
				</button>
			</div> ');
			redirect('Admin_setting');
		}
	}
}
