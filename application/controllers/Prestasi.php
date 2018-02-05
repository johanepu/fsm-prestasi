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

				// Load database
				$this->load->model('Prestasi_model');
				}

	public function index()
	{
		// $this->load->view('user_home');
		$data['content'] = 'data_prestasi.php';
		$nim = $this->session->userdata('nim');
		$data['prestasi'] = $this->Prestasi_model->tampil_user_prestasi($nim);
		$this->load->view("user_template.php",$data);

	}

	public function addPrestasi()
	{


		$this->data['title'] = "Tambah Prestasi";

		//validate form input
		$this->form_validation->set_rules(
        'nama_prestasi', 'Nama Kegiatan',
        'required|trim',
        array(
                'required'      => 'Anda belum memilih %s.'
							)
    );
    $this->form_validation->set_rules(
        'peringkat_prestasi', 'Peringkat yang diraih',
        'required|trim',
        array(
                'required'      => 'Anda belum mengisi %s.'
        )
    );


		$this->form_validation->set_rules(
				'tipe_prestasi', 'Tipe Prestasi',
				'required',
				array(
								'required'      => 'Anda belum memilih %s.'
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
								'required'      => 'Anda belum memilih %s.'
				)
		);

		$this->form_validation->set_rules(
				'level_prestasi', 'Level Prestasi',
				'required|callback_check_default',
				array(
								'required'      => 'Anda belum memilih %s.',
								'check_default'      => 'Anda belum memilih %s.'
				)
		);

		$this->form_validation->set_rules(
				'deskripsi_prestasi', 'Posisi yang diambil',
				'required',
				array(
								'required'      => 'Anda belum mengisi %s.'
				)
		);

		if ($this->form_validation->run() == true)
		{
      date_default_timezone_set('Asia/Jakarta');
			$data = array(
				'nim' => $this->session->userdata('nim'),
				'nama_prestasi' 	=> $this->input->post('nama_prestasi'),
				'peringkat_prestasi'  	=> $this->input->post('peringkat_prestasi'),
        'tipe_prestasi'    	=> $this->input->post('tipe_prestasi'),
        'role_prestasi'    		=> $this->input->post('role_prestasi'),
				'jenis_prestasi'    		=> $this->input->post('jenis_prestasi'),
				'level_prestasi'    		=> $this->input->post('level_prestasi'),
				'deskripsi_prestasi'    		=> $this->input->post('role_prestasi'),
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
			redirect('Prestasi');
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


}
