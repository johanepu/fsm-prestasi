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
		$data['title'] = 'RewardMe - Login Admin';
		$this->load->view('kucing/admin_login');
	}


// Check for user login process
public function admin_login_process() {

	$this->form_validation->set_rules(
			'username', 'Username',
			'trim|required',
			array(
							'required'      => '
							<div class="alert alert-danger alert-dismissible fade show" role="alert">
								Mohon isi %s, untuk login.
								<button type="button" class="close" data-dismiss="alert" aria-label="Close">
									<span aria-hidden="true">×</span>
								</button>
							</div>
							',
			)
	);
	$this->form_validation->set_rules(
			'password', 'Password',
			'trim|required',
			array(
							'required'      => '
							<div class="alert alert-danger alert-dismissible fade show" role="alert">
								Mohon isi %s, untuk login.
								<button type="button" class="close" data-dismiss="alert" aria-label="Close">
									<span aria-hidden="true">×</span>
								</button>
							</div>
							'
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
					'error_message' => '
					<div class="alert alert-danger alert-dismissible fade show" role="alert">
						Akun belum terdaftar, silakan cek kembali username dan password
						<button type="button" class="close" data-dismiss="alert" aria-label="Close">
							<span aria-hidden="true">×</span>
						</button>
					</div>
					'
					);
					$this->load->view('kucing/admin_login', $data);
				}

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
		$data['message_display'] = '
		<div class="alert alert-success alert-dismissible fade show" role="alert">
			Berhasil logout
			<button type="button" class="close" data-dismiss="alert" aria-label="Close">
				<span aria-hidden="true">×</span>
			</button>
		</div>
		';
		redirect('Admin_login', $data);
	}


}

?>
