<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Prestasi extends CI_Controller {

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
				$this->load->model('Prestasi_model');
				$this->load->model('User_model');
				$this->load->model('Admin_model');
				if($this->session->userdata('status') != "login"){
					redirect("success");
				}
			}

	public function index()
	{
		$nim = $this->session->userdata('nim');
		// statistik
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
		//statistik end
		$data['setting_reward'] = $this->Prestasi_model->getLevelValue();
		$data['available_nim'] = $this->User_model->get_all_nim_except_me($nim);
		$data['title'] = 'RewardMe - Data Prestasi';
		$data['prestasi'] = $this->Prestasi_model->tampil_user_prestasi($nim);
		$data['content'] = 'data_prestasi.php';
		$this->load->view("user_template.php",$data);

	}

	function view(){
		$nim = $this->session->userdata('nim');
		$where = array('nim' => $nim);
		$jmlprestasi = $this->Prestasi_model->tampil_user_prestasi($nim);
		$config['base_url'] = base_url('').'prestasi/';
		$config['total_rows'] = count($jmlprestasi);
		$config['per_page'] = 5;
		$hal = $this->uri->segment(2);
		$input  = $this->input->post('query');
		if(!isset($input)){
			$query = '';
			$data['prestasi'] = $this->Prestasi_model->prestasi_per_page($config['per_page'], $hal, $where['nim'], $query)->result();
			$this->pagination->initialize($config);
			$data['content'] = 'data_prestasi.php';
			$this->load->view("user_template.php",$data);
		}else{
			$output = '';
			$query = $this->input->post('query');
			$prestasi = $this->Prestasi_model->prestasi_per_page($config['per_page'], 0, $where['nim'], $query);
			$prestasihasil = $prestasi->result();
			if ($prestasi->num_rows() > 0){
				foreach ($prestasihasil as $detail) {
					$output .= '<tr>';
					$output .= '<td>';
					$output .= '<p>'.$detail->nama_prestasi.'</p>';
					$output .= '</td>';
					$output .= '<td>';
					$output .= '<p>'.$detail->peringkat_prestasi.'</p>';
					$output .= '</td>';
					$output .= '<td>';
						if ($detail->tipe_prestasi == "1") {
					$output .= '<span class="label label-success label-mini">Akademik</span>';
						}elseif ($detail->tipe_prestasi == "2") {
					$output .= '<span class="label label-warning label-mini">Non-Akademik</span>';
					$output .= '</td>';
						}
					$output .= '<td>';
						if ($detail->jenis_prestasi == "1") {
					$output .= '<span class="label label-success label-mini">Individu</span>';
						}elseif ($detail->jenis_prestasi == "2") {
					$output .= '<span class="label label-warning label-mini">Beregu</span>';
					$output .= '</td>';
						}
					$output .= '<td>';
						if ($detail->level_prestasi == "1") {
					$output .= '<span class="label label-success label-mini">Lokal</span>';
				}elseif ($detail->level_prestasi == "2") {
					$output .= '<span class="label label-warning label-mini">Nasional</span>';
				}elseif ($detail->level_prestasi == "3") {
					$output .= '<span class="label label-warning label-mini">Regional</span>';
				}elseif ($detail->level_prestasi == "4") {
					$output .= '<span class="label label-warning label-mini">Internasional</span>';
						}
					$output .= '</td>';
					$output .= '<td>';
					$output .= '<p>'.$detail->tgl_prestasi_start.'</p>';
					$output .= '</td>';
					$output .= '<td align="right">';
					$output .= '<div class="btn-group" >';
					$output .= '<button class="btn btn-primary btn-edit" name="btn-edit" title="Edit Prestasi"  value="'.$detail->id_prestasi.'" type="button">';
					$output .= '<i class="fa fa-fw s fa-pencil"></i></button>';
					$output .= '<button class="btn btn-danger btn-delete" name="btn-delete" title="Hapus Prestasi" value="'.$detail->id_prestasi.'" type="button">';
					$output .= '<i class="fa fa-fw fa-remove"></i></button>';
					$output .= '</div>';
					$output .= '</td>';
					$output .= '</tr>';
				}

			} else {
				$output .= '<tr>';
				$output .= '<td colspan="8">';
				$output .= '<p style="text-align:center">';
				$output .= '<b >Belum ada data prestasi</b>';
				$output .= '</p>';
				$output .= '</td>';
				$output .= '</tr>';
			}
			echo $output;
		}
	}

	public function addPrestasi()
	{

		$data['title'] = "RewardMe - Tambah Prestasi";
		$nim = $this->session->userdata('nim');
		// statistik
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
		//statistik end
		$data['available_nim'] = $this->User_model->get_all_nim_except_me($nim);
		$data['setting_reward'] = $this->Prestasi_model->getLevelValue();
		//validate form input
		$this->form_validation->set_rules(
        'nama_prestasi', 'Nama Kegiatan',
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
				'jml_anggota', 'Jumlah Anggota',
				'numeric|trim',
				array(
								'numeric'      => '
								<div class="form-group row">
								<div style="margin-left: 180px" class="alert alert-danger alert-dismissible fade show col-md-8" role="alert">
									<strong>Data salah!</strong> %s hanya ditulis angka.
									<button type="button" class="close" data-dismiss="alert" aria-label="Close">
										<span aria-hidden="true">×</span>
									</button>
								</div>
								</div>'
							)
		);

    $this->form_validation->set_rules(
        'peringkat_prestasi', 'Peringkat yang diraih',
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
				'tipe_prestasi', 'Tipe Prestasi',
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
				'referral_prestasi', 'NIM Anggota',
				'trim'
		);

		$this->form_validation->set_rules(
				'jenis_prestasi', 'Jenis Prestasi',
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
				'level_prestasi', 'Skala Kegiatan',
				'required|callback_check_default',
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
								',
								'check_default'      => '
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
				'penyelenggara_prestasi', 'Informasi Penyelenggara',
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
				'tempat_prestasi', 'Tempat Kegiatan',
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
				'date_start', 'Tanggal Kegiatan',
				'required',
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
				'smt_prestasi', 'Semester',
				'required',
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
				'deskripsi_prestasi', 'Deskripsi pencapaian',
				'required',
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

		if ($this->form_validation->run() == true)
		{
      date_default_timezone_set('Asia/Jakarta');
			$nim = $this->session->userdata('nim');
			$level_prestasi = $this->input->post('level_prestasi');
			$peringkat_prestasi = $this->input->post('peringkat_prestasi');
			$tipe_prestasi = $this->input->post('tipe_prestasi');
			$reward_point = $this->Prestasi_model->getPoinPrestasi($level_prestasi,$peringkat_prestasi);
			$id_setting = $this->Prestasi_model->getIdSetting($level_prestasi,$peringkat_prestasi);


			$datetime = new DateTime();
			$date_input = $this->input->post('date_start');
			$date_end_input = strtotime($this->input->post('date_end'));
			// $date_con = date('d-m-y',$date_input);
			$tgl_prestasi = date('Y-m-d', $date_input);
			$date_end = date('Y-m-d', $date_end_input);

			// $bulan_gasal = $datetime->createFromFormat('d/m/Y','15/07/Y');
			// $bulan_genap = $datetime->createFromFormat('d/m/Y','15/03/Y');
			//
			// if ($tgl_prestasi >= $bulan_gasal && $tgl_prestasi < $bulan_genap) {
			// 	$semester = 'Gasal';
			// } else {
			// 	$semester = 'Genap';
			// }
			$semester_input = $this->input->post('smt_prestasi');
			if ($semester_input==1) {
				$semester = 'Gasal';
			} else {
				$semester = 'Genap';
			}

			if ($tipe_prestasi == 1) {
				$referral_prestasi = '';
				$jml_anggota = 1;
			} elseif ($tipe_prestasi == 2) {
				$referral_prestasi = $this->input->post('referral_prestasi');
				$jml_anggota = $this->input->post('jml_anggota');
			}



			$data = array(
				'nim' => $nim,
				'referral_nim' => $referral_prestasi,
				'jml_anggota' => $jml_anggota,
				'nama_prestasi' 	=> $this->input->post('nama_prestasi'),
				'peringkat_prestasi'  	=> $peringkat_prestasi,
        'tipe_prestasi'    	=> $tipe_prestasi,
				'jenis_prestasi'    		=> $this->input->post('jenis_prestasi'),
				'level_prestasi'    		=> $level_prestasi,
				'id_setting'	=> $id_setting,
				'deskripsi_prestasi'    		=> $this->input->post('deskripsi_prestasi'),
				'reward_poin'    		=> $reward_point,
				'penyelenggara_prestasi'    		=> $this->input->post('penyelenggara_prestasi'),
				'tempat_prestasi'    		=> $this->input->post('tempat_prestasi'),
				'tgl_prestasi_start'	=> $tgl_prestasi,
				'tgl_prestasi_end'	=> $date_end,
				'date_modified'	=> date('Y-m-d H:i:s')
			);

			$return_id = $this->Prestasi_model->add_prestasi($data);
			$data_periode = array(
				'id_prestasi'=>$return_id,
				'periode'=>strtok($tgl_prestasi, '-'),
				'semester'=>$semester
			);

			$arraynim = $this->input->post('array_nim');
			$arr = explode(',',$arraynim);

			if ($tipe_prestasi == 1) {
				$data = array(
					'id_prestasi'=>$return_id,
					'nim' => $nim,
					'poin' => 0
				);
				$this->Prestasi_model->addReward($data);
			} elseif ($tipe_prestasi == 2) {
				foreach ($arr as $n) {
					$data = array(
						'id_prestasi'=>$return_id,
						'nim' => $n,
						'poin' => 0
					);
					$this->Prestasi_model->addReward($data);
				}
			}
		}
		if ($this->form_validation->run() == true && $this->Prestasi_model->addPrestasiPeriode($data_periode))
		{
      $this->session->set_flashdata('berhasil',
      '  <div class="col-md-12 alert alert-success alert-dismissible fade show" role="alert">
        <strong>Tambah prestasi berhasil!</strong> Silakan cek kembali untuk kebenaran data.
        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
          <span aria-hidden="true">×</span>
        </button>
      </div> ');
			redirect('Prestasi');
		}
		else
		{
			$this->data['message'] = (validation_errors() ? validation_errors() : ($this->session->flashdata('message')));
			$data['content'] = 'add_prestasi.php';
			$this->load->view("user_template.php",$data,$this->data);
		}
	}


	public function updateRefPrestasi()
	{
			$id_prestasi = $this->input->post('id_prestasi');
			$nim = $this->input->post('nim');
			$poin = array(
				'poin' => 0
			);
			$data = array(
				'id_prestasi'=>$id_prestasi,
				'nim' => $nim,
				'poin' => 0
			);
			$this->Prestasi_model->updateRefReward($id_prestasi,$nim,$poin,$data);
	}

	public function updateRefPrestasi2()
	{
			$id_prestasi = $this->input->post('id_prestasi');
			$nim = $this->input->post('nim');
			$data = array(
				'id_prestasi'=>$id_prestasi,
				'nim' => $nim,
				'poin' => 0
			);
			$this->Prestasi_model->addReward($data);
	}

	public function deleteRefPrestasi()
	{
			$id_prestasi = $this->input->post('id_prestasi');
			$this->Prestasi_model->deletePoin($id_prestasi);
	}



	function success()
	{
		$this->session->set_flashdata('status','<div class="alert alert-success"><p>Silahkan cek email untuk verifikasi</p></div>');
		redirect('Prestasi/add_prestasi');
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

	function fetchPrestasi(){
		$nim = $this->session->userdata('nim');
		$id_prestasi= $this->input->post('id_prestasi');
		$result=$this->Prestasi_model->getAllData($id_prestasi);

		echo json_encode($result);
	}

	function updatePrestasi(){

		date_default_timezone_set('Asia/Jakarta');
		$level_prestasi = $this->input->post('level_prestasi');
		$peringkat_prestasi = $this->input->post('peringkat_prestasi');
		$tipe_prestasi = $this->input->post('tipe_prestasi');
		$reward_point = $this->Prestasi_model->getPoinPrestasi($level_prestasi,$peringkat_prestasi);
		$id_setting = $this->Prestasi_model->getIdSetting($level_prestasi,$peringkat_prestasi);

		$datetime = new DateTime();
		$date_input = strtotime($this->input->post('tgl_prestasi_start'));
		$date_end_input = strtotime($this->input->post('tgl_prestasi_end'));
		$tgl_prestasi = date('Y-m-d', $date_input);
		$date_end = date('Y-m-d', $date_end_input);

		$semester_input = $this->input->post('smt_prestasi');
		if ($semester_input==1) {
			$semester = 'Gasal';
		} else {
			$semester = 'Genap';
		}

		if ($tipe_prestasi == 1) {
			$referral_prestasi = '';
			$jml_anggota = 1;
		} elseif ($tipe_prestasi == 2) {
			$referral_prestasi = $this->input->post('referral_nim');
			$jml_anggota = $this->input->post('jml_anggota');
		}

		$id_prestasi = $this->input->post('id_prestasi');

		$data1=array(
			'nama_prestasi'=> $this->input->post('nama_prestasi'),
			'peringkat_prestasi'=> $peringkat_prestasi,
			'tipe_prestasi'=> $this->input->post('tipe_prestasi'),
			'referral_nim'=> $referral_prestasi,
			'jenis_prestasi'=> $this->input->post('jenis_prestasi'),
			'jml_anggota'=>$jml_anggota,
			'deskripsi_prestasi'=>$this->input->post('deskripsi_prestasi'),
			'reward_poin'    		=> $reward_point,
			'penyelenggara_prestasi' => $this->input->post('penyelenggara_prestasi'),
			'tempat_prestasi' => $this->input->post('tempat_prestasi'),
			'level_prestasi' => $level_prestasi,
			'id_setting'	=> $id_setting,
			'tgl_prestasi_start'=>$tgl_prestasi,
			'tgl_prestasi_end'=>$date_end,
			'validasi' => 0,
			'date_modified'	=> date('Y-m-d H:i:s')
		);

		$data2 = array(
			'id_prestasi'=> $id_prestasi,
			'periode'=>strtok($tgl_prestasi, '-'),
			'semester'=>$semester
		);

		$data3 = array(
			'poin'=>0
		);

		$where = array(
			'id_prestasi'=> $id_prestasi
		);
		if($this->Prestasi_model->updatePrestasi($data1,$where)==true && $this->Prestasi_model->updatePeriode($data2,$where)==true
		&& $this->Prestasi_model->updatePoin($data3,$where)==true)
		{
			$this->session->set_flashdata('status_prestasi',
      '  <div class="col-md-12 alert alert-success alert-dismissible fade show" role="alert">
        <strong>Edit prestasi berhasil!</strong> Silakan cek kembali untuk kebenaran data.
        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
          <span aria-hidden="true">×</span>
        </button>
      </div> ');
		} else {
			$this->session->set_flashdata('status_prestasi',
      '  <div class="col-md-12 alert alert-danger alert-dismissible fade show" role="alert">
        <strong>Edit prestasi gagal!</strong> Silakan cek kembali isian anda.
        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
          <span aria-hidden="true">×</span>
        </button>
      </div> ');
		}

	}

	function delete(){
		$id = $this->input->post('id_prestasi');
		if ($this->Prestasi_model->delete($id)==true && $this->Prestasi_model->deletePoin($id)==true && $this->Prestasi_model->deletePeriode($id)==true)
		{
			$this->session->set_flashdata('status_prestasi',
			'  <div class="col-md-12 alert alert-success alert-dismissible fade show" role="alert">
				<strong>Prestasi berhasil dihapus!</strong> Silakan cek kembali untuk kebenaran data.
				<button type="button" class="close" data-dismiss="alert" aria-label="Close">
					<span aria-hidden="true">×</span>
				</button>
			</div> ');
			redirect('Prestasi');
		}
		else
		{
			$this->session->set_flashdata('status_prestasi',
			'  <div class="col-md-12 alert alert-danger alert-dismissible fade show" role="alert">
				<strong>Hapus prestasi gagal!</strong> Silakan cek kembali kelengkapan data.
				<button type="button" class="close" data-dismiss="alert" aria-label="Close">
					<span aria-hidden="true">×</span>
				</button>
			</div> ');
			redirect('Prestasi');
		}
	}


	public function getNim(){
		$keyword=$this->input->post('keyword');
		$data=$this->User_model->GetNimRow($keyword);
		echo json_encode($data);
	}


	function searchNim(){
		if (isset($_GET['term'])) {
				$result = $this->User_model->searchNim($_GET['term']);
				if (count($result) > 0) {
				foreach ($result as $row)
						$arr_result[] = $row->nim;
						echo json_encode($arr_result);
				}
		}
	}

	function get_autocomplete(){
    if (isset($_GET['term'])) {
        $result = $this->User_model->searchNim($_GET['term']);
        if (count($result) > 0) {
            foreach ($result as $row)
                $arr_result[] = array(
                    'nim'         => $row->nim,
             );
                echo json_encode($arr_result);
        }
    }
}


		public function get_data() {
        $keyword = $this->uri->segment(3);
        $data = $this->db->from('users')->like('nim',$keyword)->get();

				if (count($data) > 0) {
	        foreach($data->result() as $row)
	        {
	            $arr['query'] = $keyword;
	            $arr['suggestions'][] = array(
	                'value'    =>$row->nim
	            );
	        }
	        echo json_encode($arr);
				} else {
					$arr['query'] = $keyword;
					$arr['suggestions'][] = array(
							'value'    =>'NIM belum terdata di sistem'
					);
					echo json_encode($arr);
				}
    }

	public function getPeringkat($level) {
		$result = $this->db->where("level",$level)->get("setting_rewarding")->result();
		echo json_encode($result);
	}




}
