<?php


Class Admin_login extends CI_Controller {

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
		}

	// Show login page
	public function index() {
		$this->load->view('kucing/admin_login');
	}


// Check for user login process
public function admin_login_process() {

	$this->form_validation->set_rules(
			'username', 'Username',
			'trim|required',
			array(
							'required'      => 'Mohon isi %s, niat login rak to.',
			)
	);
	$this->form_validation->set_rules(
			'password', 'Password',
			'trim|required',
			array(
							'required'      => '%s perlu diisi untuk login.'
			)
	);

	if ($this->form_validation->run() == FALSE) {
		if(isset($this->session->userdata['logged_in'])){
			redirect('Admin_home', 'refresh');
		}else{
			$this->load->view('kucing/admin_login');
		}
	} else {
		$data = array(
		'username' => $this->input->post('username'),
		'password' => $this->input->post('password')
		);
			$result=$this->Login_model->login_admin($data['username'],md5($data['password']));
			// $result = $this->Login_model->login($data);
			if($result)
			{
					$this->session->set_userdata('status', 'login');
					$this->session->set_userdata('admin_id',$result['admin_id']);
					$this->session->set_userdata('username',$result['username']);
					$this->session->set_userdata('nama_admin',$result['nama_admin']);

					// $sessionuser = $this->session->set_userdata('status');
					redirect('Admin_home', 'refresh');
				}
				else
				{
					$data = array(
					'error_message' => 'Akun belum terdaftar'
					);
					$this->load->view('kucing/admin_login', $data);
				}
		// if ($result == TRUE) {
		// 	$nim = $this->input->post('nim');
		// 	$result = $this->Login_model->read_user_information($nim);
		// 		if ($result != false) {
		// 		$session_data = array(
		// 			'nim' => $result[0]->nim,
		// 			'namalengkap' => $result[0]->namalengkap,
		// 			'jurusan' => $result[0]->jurusan,
		// 			'email' => $result[0]->email
		// 		);
		// 		// Add user data in session
		// 		$this->session->set_userdata('logged_in', $session_data);
		// 		//set session
	  //     $this->session->set_userdata('nim',$session_data['nim']);
	  //     $this->session->set_userdata('namalengkap',$result[0]->namalengkap);
	  //     $this->session->set_userdata('jurusan',$result['jurusan']);
	  //     $this->session->set_userdata('email',$result['email']);
		// 		redirect('User_home', 'refresh');
		// 		}
		// } else {
		// 	$data = array(
		// 	'error_message' => 'NIM atau password salah'
		// 	);
		// 	$this->load->view('user_login', $data);
		// }
	}
}

// Logout from admin page
public function logout() {

		// Removing session data
		$sess_array = array(
		'admin_id' => '',
		'username' => '',
		'nama_admin' => ''
		);
		$this->session->unset_userdata('logged_in', $sess_array);
		$this->session->sess_destroy();
		$data['message_display'] = 'Berhasil Logout';
		redirect('Admin_login', $data);
	}

}

?>
