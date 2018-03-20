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

				// Load upload library
				$this->load->library('upload');

				// Load database
				$this->load->model('Prestasi_model');
				$this->load->model('User_model');
				if($this->session->userdata('status') != "login"){
					redirect("Admin_login");
				}
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

		$data['error'] = '';
		$data['title'] = 'RewardMe - Profil';
		$data['content'] = 'user_profile.php';
		$this->load->view("user_template.php",$data);
	}

	function updateProfilValidation(){
		//validate form input
		$this->form_validation->set_rules(
        'nama_lengkap', 'Nama Lengkap',
        'required|trim',
        array(
                'required'      => '
								<div class="form-group row">
								<div style="margin-left: 180px" class="alert alert-danger alert-dismissible fade show col-md-8" role="alert">
									<strong>Data belum lengkap!</strong> Anda belum mengisi %s.
									<button type="button" class="close" data-dismiss="alert" aria-label="Close">
										<span aria-hidden="true">×</span>
									</button>
								</div>
								</div>'
							)
    );

    $this->form_validation->set_rules(
        'email', 'Email',
        'required|trim',
        array(
                'required'      => '
								<div class="form-group row">
								<div style="margin-left: 180px" class="alert alert-danger alert-dismissible fade show col-md-8" role="alert">
									<strong>Data belum lengkap!</strong> Anda belum mengisi %s.
									<button type="button" class="close" data-dismiss="alert" aria-label="Close">
										<span aria-hidden="true">×</span>
									</button>
								</div>
								</div>
								'
        )
    );


		$this->form_validation->set_rules(
				'alamat', 'Alamat',
				'required',
				array(
								'required'      => '
								<div class="form-group row">
								<div style="margin-left: 180px" class="alert alert-danger alert-dismissible fade show col-md-8" role="alert">
									<strong>Data belum lengkap!</strong> Anda belum memilih %s.
									<button type="button" class="close" data-dismiss="alert" aria-label="Close">
										<span aria-hidden="true">×</span>
									</button>
								</div>
								</div>
								'
				)
		);

		$this->form_validation->set_rules(
				'tingkatan', 'Tingkatan',
				'required',
				array(
					'required'      => '
				<div class="form-group row">
				<div style="margin-left: 180px" class="alert alert-danger alert-dismissible fade show col-md-8" role="alert">
					<strong>Data belum lengkap!</strong> Anda belum memilih %s.
					<button type="button" class="close" data-dismiss="alert" aria-label="Close">
						<span aria-hidden="true">×</span>
					</button>
				</div>
				</div>
				'
				)
		);

		$this->form_validation->set_rules(
				'nomor_hp', 'Nomor Handphone',
				'required',
				array(
								'required'      => '
								<div class="form-group row">
								<div style="margin-left: 180px" class="alert alert-danger alert-dismissible fade show col-md-8" role="alert">
									<strong>Data belum lengkap!</strong> Anda belum memilih %s.
									<button type="button" class="close" data-dismiss="alert" aria-label="Close">
										<span aria-hidden="true">×</span>
									</button>
								</div>
								</div>
								'
				)
		);

		$this->form_validation->set_rules(
				'keterangan', 'Keterangan',
				'required',
				array(
								'required'      => '
								<div class="form-group row">
								<div style="margin-left: 180px" class="alert alert-danger alert-dismissible fade show col-md-8" role="alert">
									<strong>Data belum lengkap!</strong> Anda belum memilih %s.
									<button type="button" class="close" data-dismiss="alert" aria-label="Close">
										<span aria-hidden="true">×</span>
									</button>
								</div>
								</div>
								'
				)
		);



		if ($this->form_validation->run() == true)
		{
      date_default_timezone_set('Asia/Jakarta');

			$nim = $this->session->userdata('nim');
			$data=array(
				'namalengkap'=> $this->input->post('namalengkap'),
				'email'=>$this->input->post('email'),
				'alamat'=>$this->input->post('alamat'),
				'tingkatan'=>$this->input->post('tingkatan'),
				'nomor_hp'=>$this->input->post('nomor_hp'),
				'Keterangan'=>$this->input->post('Keterangan')
			);
			$where = array(
				'nim'=> $nim
			);
		}
		if ($this->form_validation->run() == true && $this->User_model->updateProfil($data,$where))
		{
			//set user data
			$this->session->set_userdata('namalengkap',$namalengkap);
			$this->session->set_userdata('email',$email);
			$this->session->set_userdata('alamat',$alamat);
			$this->session->set_userdata('tingkatan',$tingkatan);
			$this->session->set_userdata('nomor_hp',$nomor_hp);
			$this->session->set_userdata('keterangan',$nomor_hp);
      $this->session->set_flashdata('profile_status',
      '  <div class="alert alert-success alert-dismissible fade show" role="alert">
        <strong>Ubah Biodata Berhasil!</strong> Pastikan data profil anda valid untuk mendapat reward point
        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
          <span aria-hidden="true">×</span>
        </button>
      </div> ');
			redirect('User_profile');
		}
		else
		{
			$this->session->set_flashdata('profile_status',
			'  <div class="alert alert-success alert-dismissible fade show" role="alert">
        <strong>Ubah Biodata Gagal!</strong> Silakan cek kembali isian anda, atau hubungi admin
        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
          <span aria-hidden="true">×</span>
        </button>
      </div> ');
			redirect('User_profile');
		}

	}

	function fetchData(){
		$nim = $this->session->userdata('nim');
		$result=$this->User_model->getProfil($nim);

		echo json_encode($result);
	}

	function updateProfil(){

		date_default_timezone_set('Asia/Jakarta');
		//set user data
		$namalengkap= $this->input->post('namalengkap');
		$email=$this->input->post('email');
		$alamat=$this->input->post('alamat');
		$tingkatan=$this->input->post('tingkatan');
		$nomor_hp=$this->input->post('nomor_hp');
		$keterangan=$this->input->post('keterangan');

		$nim = $this->session->userdata('nim');
		$data=array(
			'namalengkap'=> $this->input->post('namalengkap'),
			'email'=>$this->input->post('email'),
			'alamat'=>$this->input->post('alamat'),
			'tingkatan'=>$this->input->post('tingkatan'),
			'nomor_hp'=>$this->input->post('nomor_hp'),
			'keterangan'=>$this->input->post('keterangan')
		);

		$where = array(
			'nim'=> $nim
		);

		if ($this->User_model->updateProfil($data,$where)==true) {
			$this->session->set_flashdata('profile_status',
      '  <div class="alert alert-success alert-dismissible fade show" role="alert">
        <strong>Ubah Biodata Berhasil!</strong> Pastikan data profil anda valid untuk mendapat reward point
        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
          <span aria-hidden="true">×</span>
        </button>
      </div> ');
			$this->session->set_userdata('namalengkap',$namalengkap);
			$this->session->set_userdata('email',$email);
			$this->session->set_userdata('alamat',$alamat);
			$this->session->set_userdata('tingkatan',$tingkatan);
			$this->session->set_userdata('nomor_hp',$nomor_hp);
			$this->session->set_userdata('keterangan',$keterangan);
		} else {
			$this->session->set_flashdata('profile_status',
			'  <div class="alert alert-danger alert-dismissible fade show" role="alert">
        <strong>Ubah Biodata Gagal!</strong> Silakan cek kembali isian anda, atau hubungi admin
        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
          <span aria-hidden="true">×</span>
        </button>
      </div> ');
		}
		//set user data


	}

	public function profilUpload(){

		$config['upload_path']          = './image-upload/';
		$config['allowed_types']        = 'gif|jpg|png';
		$config['max_size']             = 2000;
		$config['max_width']            = 3000;
		$config['max_height']           = 3000;

		$this->upload->initialize($config);

		if ($this->upload->do_upload('profile_photo')){
			$photo=$this->upload->file_name;
			$data = array(
				'foto' => $photo
			);
			$where = array(
				'nim' => $this->session->userdata('nim')
			);
			if ($this->User_model->profilUpload($data,$where) == true) {
				$this->session->set_userdata('foto',$photo);
				$this->session->set_flashdata('profile_photo_status',
				'  <div class="col-md-12 alert alert-success alert-dismissible fade show" role="alert">
					<strong>Uppload foto berhasil!</strong> Silakan cek kembali untuk kebenaran data.
					<button type="button" class="close" data-dismiss="alert" aria-label="Close">
						<span aria-hidden="true">×</span>
					</button>
				</div> ');
				redirect('User_profile');
			} else {
				$this->session->set_flashdata('profile_photo_status',
				'  <div class="col-md-12 alert alert-danger alert-dismissible fade show" role="alert">
					<strong>Uppload foto gagal!</strong> Silakan upload foto dengan resolusi lebih kecil dari 3000x3000 px.
					<button type="button" class="close" data-dismiss="alert" aria-label="Close">
						<span aria-hidden="true">×</span>
					</button>
				</div> ');
				redirect('User_profile');
			}
		} else {
			$this->session->set_flashdata('profile_photo_status',
			'  <div class="col-md-12 alert alert-danger alert-dismissible fade show" role="alert">
				<strong>Uppload foto gagal!</strong> Anda belum memilih foto.
				<button type="button" class="close" data-dismiss="alert" aria-label="Close">
					<span aria-hidden="true">×</span>
				</button>
			</div> ');
			redirect('User_profile');
		}
	}

}
