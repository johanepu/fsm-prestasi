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
		$nim = '';
		$data['title'] = 'RewardMe - Data Mahasiswa';
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


	public function lihat_user($nim){

		$data['data_user'] = $this->User_model->lihat_user($nim);
		$data['prestasi_user'] = $this->Prestasi_model->tampil_user_prestasi($nim);
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

		$data['title'] = 'RewardMe - Profil Mahasiswa';
		$data['content'] = 'kucing/view_user.php';
		$this->load->view("kucing/admin_template.php",$data);
	}

	function userData(){
		$nim = $this->input->post('nim');
		$result=$this->User_model->getProfil($nim);

		echo json_encode($result);
	}

	function updateUser(){

		date_default_timezone_set('Asia/Jakarta');
		//set user data
		$namalengkap= $this->input->post('namalengkap');
		$email=$this->input->post('email');
		$alamat=$this->input->post('alamat');
		$tingkatan=$this->input->post('tingkatan');
		$nomor_hp=$this->input->post('nomor_hp');
		$nim = $this->input->post('nim');

		$data=array(
			'namalengkap'=> $this->input->post('namalengkap'),
			'email'=>$this->input->post('email'),
			'alamat'=>$this->input->post('alamat'),
			'tingkatan'=>$this->input->post('tingkatan'),
			'nomor_hp'=>$this->input->post('nomor_hp'),
		);

		$where = array(
			'nim'=> $nim
		);

		$result=$this->User_model->updateProfil($data,$where);
		//set user data
		$this->session->set_userdata('namalengkap',$namalengkap);
		$this->session->set_userdata('email',$email);
		$this->session->set_userdata('alamat',$alamat);
		$this->session->set_userdata('tingkatan',$tingkatan);
		$this->session->set_userdata('nomor_hp',$nomor_hp);

	}

	function delete(){
		$nim = $this->input->post('nim');
		$result=$this->User_model->deleteUser($nim);
	}



}
