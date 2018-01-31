<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Register extends CI_Controller {

        public function index()
        {
                $this->load->helper(array('form', 'url'));

                $this->load->library('form_validation');

                if ($this->form_validation->run() == FALSE)
                {
                        $this->load->view('user_register');
                }
                else
                {
                        $this->load->view('formsuccess');
                }
        }
}
