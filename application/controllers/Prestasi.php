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
				$this->load->model('Login_model');
				}

	public function index()
	{
		// $this->load->view('user_home');
		$data['content'] = 'data_prestasi.php';
		$this->load->view("user_template.php",$data);
	}
}
