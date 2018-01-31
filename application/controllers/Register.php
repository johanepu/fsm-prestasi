<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Register extends CI_Controller
{
    public function __construct() {
        parent:: __construct();

        $this->load->helper(array('form', 'url'));
        $this->load->library(array('session', 'form_validation', 'email'));
        $this->load->model('Register_model');
    }

	//create a new user
	function index()
	{
		//load the registration helper under helper folder
		$this->load->helper('registration');

		$this->data['title'] = "Register User";

		//validate form input
		$this->form_validation->set_rules('namalengkap', 'Nama Lengkap', 'required');
		$this->form_validation->set_rules('jurusan', 'Departemen/Jurusan', 'required|callback_check_default');
    $this->form_validation->set_message('check_default', 'You need to select something other than the default');
    $this->form_validation->set_rules('nim', 'Nomor Induk Mahasiswa (NIM)', 'required');
    $this->form_validation->set_rules('email', 'Email', 'required|valid_email');
    $this->form_validation->set_rules('password', 'Password', 'required|matches[passwordconf]');
		$this->form_validation->set_rules('passwordconf', 'Ulangi Password', 'required');

		// $this->form_validation->set_rules('agree', '...', 'callback_terms_check');

		if ($this->form_validation->run() == true)
		{
			$data = array(
				'namalengkap' 	=> $this->input->post('namalengkap'),
				'jurusan'  	=> $this->input->post('jurusan'),
        'nim'    	=> $this->input->post('nim'),
        'email'    		=> $this->input->post('email'),
        'password' 		=> $this->input->post('password'),
				'date_created'	=> date('Y-m-d H:i:s'),
			);
		}
		if ($this->form_validation->run() == true && $this->Register_model->register($data))
		{
			//check to see if we are creating the user
			//redirect them to checkout page
			redirect('success');
		}
		else
		{
			//display the create user form
			//set the flash data error message if there is one
			$this->data['message'] = (validation_errors() ? validation_errors() : ($this->session->flashdata('message')));

			$this->load->view('user_register', $this->data);
		}
	}

	function success()
	{
		$this->data['message'] = "<h1>User created successfully...</h1>";
		$this->load->view('success', $this->data);
	}


  function check_default($post_string)
  {
    return $post_string == '0' ? FALSE : TRUE;
  }
}
