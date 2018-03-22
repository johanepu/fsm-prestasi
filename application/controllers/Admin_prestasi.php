<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Admin_prestasi extends CI_Controller {

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
		$data_prestasi = $this->Prestasi_model->tampil_all_prestasi();
		$data['setting_reward'] = $this->Prestasi_model->getLevelValue();
		$data['prestasi'] = $data_prestasi;
		$data['reward_poin'] = $this->Prestasi_model->user_reward_point();
		$data['periode'] = 0;
		$data['semester'] = 0;
		$data['available_nim'] = $this->User_model->get_all_nim();
		$data['title'] = 'RewardMe - Data Prestasi';
		$data['content'] = 'kucing/data_master_prestasi.php';
		$this->load->view("kucing/admin_template.php",$data);

	}

	public function tabel()
	{
		$periode_select = $this->uri->segment(3);
		$semester_select = $this->uri->segment(4);
		if ($periode_select == 0 && $semester_select != 0) {
			$data_prestasi = $this->Prestasi_model->tampil_prestasi_semester($semester_select);

		} elseif ($periode_select != 0 && $semester_select == 0) {
			$data_prestasi = $this->Prestasi_model->tampil_prestasi_periode($periode_select);

		} elseif ($periode_select != 0 && $semester_select != 0) {
			$data_prestasi = $this->Prestasi_model->tampil_prestasi_waktu($periode_select,$semester_select);

		} else {
			$data_prestasi = $this->Prestasi_model->tampil_all_prestasi();

		}

		$data['periode'] = $periode_select;
		$data['semester'] = $semester_select;
		$data['setting_reward'] = $this->Prestasi_model->getLevelValue();

		$data['prestasi'] = $data_prestasi;
		$data['title'] = 'RewardMe - Data Prestasi';
		$data['content'] = 'kucing/data_master_prestasi.php';
		$this->load->view("kucing/admin_template.php",$data);
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

	public function addPrestasi_admin()
	{


		$data['title'] = "RewardMe - Tambah Prestasi";
		$data['available_nim'] = $this->User_model->get_all_nim();
		$data['setting_reward'] = $this->Prestasi_model->getLevelValue();

		//validate form input

		$this->form_validation->set_rules(
				'nim', 'NIM',
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
			$nim = $this->input->post('nim');
			$level_prestasi = $this->input->post('level_prestasi');
			$peringkat_prestasi = $this->input->post('peringkat_prestasi');
			$tipe_prestasi = $this->input->post('tipe_prestasi');
			$reward_point = $this->Prestasi_model->getPoinPrestasi($level_prestasi,$peringkat_prestasi);
			$id_setting = $this->Prestasi_model->getIdSetting($level_prestasi,$peringkat_prestasi);

			$datetime = new DateTime();
			$tgl_prestasi = $this->input->post('date_start');
			// $tgl_prestasi = date('d/m/Y', $date_input);

			$bulan_gasal = $datetime->createFromFormat('d/m/Y','15/07/Y');
			$bulan_genap = $datetime->createFromFormat('d/m/Y','15/03/Y');

			if ($tgl_prestasi >= $bulan_gasal && $tgl_prestasi < $bulan_genap) {
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
				'nama_prestasi' 	=> $this->input->post('nama_prestasi'),
				'referral_nim' => $this->input->post('referral_prestasi'),
				'jml_anggota' => $jml_anggota,
				'peringkat_prestasi'  	=> $this->input->post('peringkat_prestasi'),
        'tipe_prestasi'    	=> $this->input->post('tipe_prestasi'),
				'jenis_prestasi'    		=> $this->input->post('jenis_prestasi'),
				'level_prestasi'    		=> $level_prestasi,
				'id_setting'	=> $id_setting,
				'deskripsi_prestasi'    		=> $this->input->post('deskripsi_prestasi'),
				'reward_poin'    		=> $reward_point,
				'penyelenggara_prestasi'    		=> $this->input->post('penyelenggara_prestasi'),
				'tempat_prestasi'    		=> $this->input->post('tempat_prestasi'),
				'tgl_prestasi_start'	=> $tgl_prestasi,
				'tgl_prestasi_end'	=> $this->input->post('date_end'),
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
      $this->session->set_flashdata('status_prestasi',
      '  <div class="alert alert-success alert-dismissible fade show" role="alert">
        <strong>Tambah Prestasi Berhasil!</strong> Silakan cek kembali di data prestasi.
        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
          <span aria-hidden="true">×</span>
        </button>
      </div> ');
			redirect('Admin_prestasi');
		}
		else
		{
			$this->data['message'] = (validation_errors() ? validation_errors() : ($this->session->flashdata('message')));
			$data['content'] = 'kucing/add_prestasi_admin.php';
			$this->load->view("kucing/admin_template.php",$data,$this->data);
		}
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
			redirect('Admin_prestasi');
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
			redirect('Admin_prestasi');
		}
	}

	public function getNim(){
		$keyword=$this->input->post('keyword');
		$data=$this->User_model->GetNimRow($keyword);
		echo json_encode($data);
	}

	function validate(){

		$data1=array(
			'validasi'=> 1
		);

		$data2=array(
			'poin'=> $this->input->post('poin')
		);

		$where1 = array(
			'id_prestasi'=> $this->input->post('id_prestasi')
		);

		$where2 = array(
			'id_prestasi'=> $this->input->post('id_prestasi'),
			'nim'=> $this->input->post('nim')
		);

		if ($this->Prestasi_model->updatePrestasi($data1,$where1)==true && $this->Prestasi_model->updatePoin($data2,$where2)==true)
		{
			$this->session->set_flashdata('v_status',
			'  <div class="col-md-12 alert alert-success alert-dismissible fade show" role="alert">
				<strong>Validasi prestasi berhasil!</strong> Silakan cek kembali untuk kebenaran data.
				<button type="button" class="close" data-dismiss="alert" aria-label="Close">
					<span aria-hidden="true">×</span>
				</button>
			</div> ');
			redirect('Admin_prestasi');
		}
		else
		{
			$this->session->set_flashdata('v_status',
			'  <div class="col-md-12 alert alert-danger alert-dismissible fade show" role="alert">
				<strong>Validasi prestasi gagal!</strong> Silakan cek kembali kelengkapan data.
				<button type="button" class="close" data-dismiss="alert" aria-label="Close">
					<span aria-hidden="true">×</span>
				</button>
			</div> ');
			redirect('Admin_prestasi');
		}
	}

	function unvalidate(){
		$data1=array(
			'validasi'=> 0
		);

		$data2=array(
			'poin'=> 0
		);

		$where = array(
			'id_prestasi'=> $this->input->post('id_prestasi')
		);

		if ($this->Prestasi_model->updatePrestasi($data1,$where)==true && $this->Prestasi_model->updatePoin($data2,$where)==true)
		{
			$this->session->set_flashdata('v_status',
			'  <div class="col-md-12 alert alert-success alert-dismissible fade show" role="alert">
				<strong>Un-validasi prestasi berhasil!</strong> Silakan cek kembali untuk kebenaran data.
				<button type="button" class="close" data-dismiss="alert" aria-label="Close">
					<span aria-hidden="true">×</span>
				</button>
			</div> ');
			redirect('Admin_prestasi');
		}
		else
		{
			$this->session->set_flashdata('v_status',
			'  <div class="col-md-12 alert alert-danger alert-dismissible fade show" role="alert">
				<strong>Un-validasi prestasi gagal!</strong> Silakan cek kembali kelengkapan data.
				<button type="button" class="close" data-dismiss="alert" aria-label="Close">
					<span aria-hidden="true">×</span>
				</button>
			</div> ');
			redirect('Admin_prestasi');
		}
	}



}
