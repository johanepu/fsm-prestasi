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
				}

	public function index()
	{
		$nim = '';
		$data['user'] = $this->User_model->tampil_all_user();
		$data['reward_poin'] = $this->Prestasi_model->user_reward_point();
		$data['content'] = 'kucing/data_master_user.php';
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

	public function addPrestasi()
	{


		$this->data['title'] = "Tambah Prestasi";

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
				'role_prestasi', 'Posisi yang diambil',
				'trim',
				array(
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
			$level_prestasi = $this->input->post('level_prestasi');
				if ($level_prestasi == 1) {
					$reward_point = 2;
				} elseif ($level_prestasi == 2) {
					$reward_point = 3;
				} elseif ($level_prestasi == 3) {
					$reward_point = 4;
				} elseif ($level_prestasi == 4) {
					$reward_point = 5;
				}

			$data = array(
				'nim' => $this->session->userdata('nim'),
				'nama_prestasi' 	=> $this->input->post('nama_prestasi'),
				'peringkat_prestasi'  	=> $this->input->post('peringkat_prestasi'),
        'tipe_prestasi'    	=> $this->input->post('tipe_prestasi'),
        'role_prestasi'    		=> $this->input->post('role_prestasi'),
				'jenis_prestasi'    		=> $this->input->post('jenis_prestasi'),
				'level_prestasi'    		=> $level_prestasi,
				'deskripsi_prestasi'    		=> $this->input->post('role_prestasi'),
				'reward_poin'    		=> $reward_point,
				'penyelenggara_prestasi'    		=> $this->input->post('penyelenggara_prestasi'),
				'tempat_prestasi'    		=> $this->input->post('tempat_prestasi'),
				'tgl_prestasi_start'	=> $this->input->post('date_start'),
				'tgl_prestasi_end'	=> $this->input->post('date_end'),
				'date_modified'	=> date('Y-m-d H:i:s')
			);
		}
		if ($this->form_validation->run() == true && $this->Prestasi_model->add_prestasi($data))
		{
			//check to see if we are creating the user
			//redirect them to checkout page
      $this->session->set_flashdata('status',
      '  <div class="alert alert-success alert-dismissible fade show" role="alert">
        <strong>Registrasi Berhasil!</strong> Silakan gunakan NIM dan password anda untuk login.
        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
          <span aria-hidden="true">×</span>
        </button>
      </div> ');
			redirect('prestasi');
		}
		else
		{
			//display the create user form
			//set the flash data error message if there is one
			$this->data['message'] = (validation_errors() ? validation_errors() : ($this->session->flashdata('message')));
			// $this->load->view('user_home');
			$data['content'] = 'add_prestasi.php';
			$this->load->view("user_template.php",$data,$this->data);
			// $this->load->view('add_prestasi', $this->data);
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

	function updatePrestasi(){

		date_default_timezone_set('Asia/Jakarta');
		$level_prestasi = $this->input->post('level_prestasi');
			if ($level_prestasi == 1) {
				$reward_point = 2;
			} elseif ($level_prestasi == 2) {
				$reward_point = 3;
			} elseif ($level_prestasi == 3) {
				$reward_point = 4;
			} elseif ($level_prestasi == 4) {
				$reward_point = 5;
			}

		$data=array(
			'nama_prestasi'=> $this->input->post('nama_prestasi'),
			'peringkat_prestasi'=>$this->input->post('peringkat_prestasi'),
			'tipe_prestasi'=>$this->input->post('tipe_prestasi'),
			'role_prestasi'=>$this->input->post('role_prestasi'),
			'jenis_prestasi'=>$this->input->post('jenis_prestasi'),
			'deskripsi_prestasi'=>$this->input->post('deskripsi_prestasi'),
			'reward_poin'    		=> $reward_point,
			'penyelenggara_prestasi' => $this->input->post('penyelenggara_prestasi'),
			'tempat_prestasi' => $this->input->post('tempat_prestasi'),
			'level_prestasi' => $level_prestasi,
			'tgl_prestasi_start'=>$this->input->post('tgl_prestasi_start'),
			'tgl_prestasi_end'=>$this->input->post('tgl_prestasi_end'),
			'date_modified'	=> date('Y-m-d H:i:s')
		);

		$where = array(
			'id_prestasi'=> $this->input->post('id_prestasi')
		);

		$result=$this->Prestasi_model->updatePrestasi($data,$where);

	}

	function delete(){
		$id = $this->input->post('id_prestasi');
		$result=$this->Prestasi_model->delete($id);
	}



}
