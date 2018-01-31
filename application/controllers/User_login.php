<?php


Class User_login extends CI_Controller {

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
		$this->load->view('user_login');
	}

	// Show registration page
	public function user_registration_show() {
		$this->load->view('user_register');
	}

// Validate and store registration data in database
// public function new_user_registration() {

// Check validation for user input in SignUp form
// $this->form_validation->set_rules('username', 'Username', 'trim|required|xss_clean');
// $this->form_validation->set_rules('email_value', 'Email', 'trim|required|xss_clean');
// $this->form_validation->set_rules('password', 'Password', 'trim|required|xss_clean');
// 	if ($this->form_validation->run() == FALSE) {
// 		$this->load->view('registration_form');
// 		} else {
// 			$data = array(
// 				'user_name' => $this->input->post('username'),
// 				'user_email' => $this->input->post('email_value'),
// 				'user_password' => $this->input->post('password')
// 			);
// 		$result = $this->login_database->registration_insert($data);
// 		if ($result == TRUE) {
// 			$data['message_display'] = 'Registration Successfully !';
// 			$this->load->view('login_form', $data);
// 		} else {
// 			$data['message_display'] = 'Username already exist!';
// 			$this->load->view('registration_form', $data);
// 		}
// 	}
// }

// Check for user login process
public function user_login_process() {

	$this->form_validation->set_rules(
			'nim', 'Nomor Induk Mahasiswa (NIM)',
			'trim|required|min_length[14]|max_length[14]|numeric',
			array(
							'required'      => 'Mohon isi %s.',
							'numeric'      => 'Format NIM hanya angka.',
							'min_length'     => 'Jumlah digit NIM kurang dari format.',
							'max_length'     => 'Jumlah digit NIM melebihi format.',
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
		$this->load->view('user_home');
		}else{
			$this->load->view('user_login');
		}
	} else {
		$data = array(
		'nim' => $this->input->post('nim'),
		'password' => $this->input->post('password')
		);
		$result = $this->Login_model->login($data);
		if ($result == TRUE) {
			$nim = $this->input->post('nim');
			$result = $this->Login_model->read_user_information($nim);
				if ($result != false) {
				$session_data = array(
				'nim' => $result[0]->nim,
				'email' => $result[0]->email,
				);
				// Add user data in session
				$this->session->set_userdata('logged_in', $session_data);
				$this->load->view('user_home');
				}
		} else {
			$data = array(
			'error_message' => 'NIM atau password salah'
			);
			$this->load->view('user_login', $data);
		}
	}
}

// Logout from admin page
public function logout() {

		// Removing session data
		$sess_array = array(
		'nim' => ''
		);
		$this->session->unset_userdata('logged_in', $sess_array);
		$data['message_display'] = 'Berhasil Logout';
		$this->load->view('user_login', $data);
	}

}

?>
