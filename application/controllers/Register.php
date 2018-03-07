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
		$this->form_validation->set_rules(
        'namalengkap', 'Nama Lengkap',
        'required|trim|alpha_numeric_spaces|is_unique[users.namalengkap]',
        array(
                'required'      => 'Anda belum mengisi %s.',
                'alpha_numeric_spaces'      => '%s tidak boleh berisi karakter lain',
                'is_unique'     => 'Nama sudah digunakan.',
        )
    );
    $this->form_validation->set_rules(
        'jurusan', 'Departemen/Jurusan',
        'required|callback_check_default',
        array(
                'required'      => 'Anda belum memilih %s.',
                'check_default'      => 'Anda belum memilih %s.'
        )
    );
    $this->form_validation->set_rules(
        'nim', 'Nomor Induk Mahasiswa (NIM)',
        'required|min_length[14]|max_length[14]|callback_nim_validation|numeric|is_unique[users.nim]',
        array(
                'required'      => 'Mohon isi %s.',
                'numeric'      => 'Format NIM hanya angka.',
                'is_unique'     => '%s sudah digunakan.',
                'min_length'     => 'Jumlah digit NIM kurang dari format.',
                'max_length'     => 'Jumlah digit NIM melebihi format.',
        )
    );
    $this->form_validation->set_rules(
        'email', 'Email',
        'required|valid_email|is_unique[users.email]',
        array(
                'required'      => 'Mohon isi alamat %s.',
                'is_unique'     => '%s sudah digunakan.',
                'valid_email'     => '%s tidak valid.',
        )
    );
    $this->form_validation->set_rules(
        'password', 'Password',
        'required|matches[passwordconf]|min_length[5]',
        array(
                'required'      => '%s perlu diisi untuk login.',
                'matches'     => '%s tidak cocok.',
                'min_length'     => '%s tidak boleh kurang dari 5 karakter.',
        )
    );
    $this->form_validation->set_rules(
        'passwordconf', 'Konfirmasi Password',
        'required',
        array(
                'required'      => '%s perlu diisi untuk konfirmasi.',
        )
    );
    // $this->form_validation->set_rules(
    //     'agree', 'Ketentuan Keaslian Data',
    //     'required',
    //     array(
    //             'required'      => 'Ketentuan harus disetujui.',
    //     )
    // );

		// $this->form_validation->set_rules('agree', '...', 'callback_terms_check');

		if ($this->form_validation->run() == true)
		{
      date_default_timezone_set('Asia/Jakarta');
			$data = array(
				'namalengkap' 	=> ucwords($this->input->post('namalengkap')),
				'jurusan'  	=> $this->input->post('jurusan'),
        'nim'    	=> $this->input->post('nim'),
        'email'    		=> $this->input->post('email'),
        'password' 		=> md5($this->input->post('password')),
				'date_created'	=> date('Y-m-d H:i:s'),
			);
		}
		if ($this->form_validation->run() == true && $this->Register_model->register($data))
		{
			//check to see if we are creating the user
			//redirect them to checkout page
      $this->session->set_flashdata('info',
      '  <div class="alert alert-success alert-dismissible fade show" role="alert">
        <strong>Registrasi Berhasil!</strong> Silakan gunakan NIM dan password anda untuk login.
        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
          <span aria-hidden="true">×</span>
        </button>
      </div> ');
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
    $this->session->set_flashdata('status','<div class="alert alert-success"><p>Silahkan cek email untuk verifikasi</p></div>');
    redirect('User_login');
	}


  function check_default($post_string)
  {
    return $post_string == '0' ? FALSE : TRUE;
  }

  function nim_validation($nim_value)
  {
    $kodejurusan = $this->input->post('jurusan');

    if ($kodejurusan == 1) {
      $pattern = "|24010|i";
      if (!preg_match($pattern, $nim_value))
        {
            $this->form_validation->set_message('nim_validation', "Bukan format NIM Departemen Matematika");
            return FALSE;
        }
        else
        {
            return TRUE;
        }
    } elseif ($kodejurusan == 2) {
      $pattern = "|24020|i";
      if (!preg_match($pattern, $nim_value))
        {
            $this->form_validation->set_message('nim_validation', "Bukan format NIM Departemen Biologi");
            return FALSE;
        }
        else
        {
            return TRUE;
        }
    } elseif ($kodejurusan == 3) {
      $pattern = "|24030|i";
      if (!preg_match($pattern, $nim_value))
        {
            $this->form_validation->set_message('nim_validation', "Bukan format NIM Departemen Kimia");
            return FALSE;
        }
        else
        {
            return TRUE;
        }
    } elseif ($kodejurusan == 4) {
      $pattern = "|24040|i";
      if (!preg_match($pattern, $nim_value))
        {
            $this->form_validation->set_message('nim_validation', "Bukan format NIM Departemen Fisika");
            return FALSE;
        }
        else
        {
            return TRUE;
        }
    } elseif ($kodejurusan == 5) {
      $pattern = "(|24050|240102|i)";
      if (!preg_match($pattern, $nim_value))
        {
            $this->form_validation->set_message('nim_validation', "Bukan format NIM Departemen Statistika");
            return FALSE;
        }
        else
        {
            return TRUE;
        }
    } elseif ($kodejurusan == 6) {
      $pattern = "(|24060|240103|i)";
      if (!preg_match($pattern, $nim_value))
        {
            $this->form_validation->set_message('nim_validation', "Bukan format NIM Departemen Informatika");
            return FALSE;
        }
        else
        {
            return TRUE;
        }
    }
    // $pattern = "|240|i";
    // if (!preg_match($pattern, $nim_value))
    //   {
    //       $this->form_validation->set_message('nim_validation', "Bukan format nim fsm");
    //       return FALSE;
    //   }
    //   else
    //   {
    //       return TRUE;
    //   }
  }
}
