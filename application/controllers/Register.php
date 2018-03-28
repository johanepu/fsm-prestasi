<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Register extends CI_Controller
{
    public function __construct() {
        parent:: __construct();

        $this->load->helper(array('form', 'url', 'captcha'));
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
                'required'      => '
								<div class="alert alert-danger alert-dismissible fade show " role="alert">
									<strong>Data belum lengkap!</strong> Anda belum mengisi %s.
									<button type="button" class="close" data-dismiss="alert" aria-label="Close">
										<span aria-hidden="true">×</span>
									</button>
								</div>
                ',
                'alpha_numeric_spaces'      => '
                <div class="alert alert-danger alert-dismissible fade show " role="alert">
                  <strong>Data belum benar!</strong> %s tidak boleh berisi karakter lain
                  <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                    <span aria-hidden="true">×</span>
                  </button>
                </div>
                ',
                'is_unique'     => '
                <div class="alert alert-danger alert-dismissible fade show " role="alert">
                  <strong>Data redundan!</strong> Nama sudah digunakan
                  <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                    <span aria-hidden="true">×</span>
                  </button>
                </div>
                ',
        )
    );
    $this->form_validation->set_rules(
        'jurusan', 'Departemen/Jurusan',
        'required|callback_check_default',
        array(
                'required'      => '
								<div class="alert alert-danger alert-dismissible fade show " role="alert">
									<strong>Data belum lengkap!</strong> Anda belum mengisi %s.
									<button type="button" class="close" data-dismiss="alert" aria-label="Close">
										<span aria-hidden="true">×</span>
									</button>
								</div>
                ',
                'check_default'      => '
                <div class="alert alert-danger alert-dismissible fade show " role="alert">
                  <strong>Data belum lengkap!</strong> Anda belum mengisi %s.
                  <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                    <span aria-hidden="true">×</span>
                  </button>
                </div>
                '
        )
    );
    $this->form_validation->set_rules(
        'nim', 'Nomor Induk Mahasiswa (NIM)',
        'required|min_length[14]|max_length[14]|callback_nim_validation|numeric|is_unique[users.nim]',
        array(
                'required'      => '
								<div class="alert alert-danger alert-dismissible fade show " role="alert">
									<strong>Data belum lengkap!</strong> Anda belum mengisi %s.
									<button type="button" class="close" data-dismiss="alert" aria-label="Close">
										<span aria-hidden="true">×</span>
									</button>
								</div>
                ',
                'numeric'      => '
                <div class="alert alert-danger alert-dismissible fade show " role="alert">
                  <strong>Data belum benar!</strong> NIM hanya diisi angka
                  <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                    <span aria-hidden="true">×</span>
                  </button>
                </div>
                ',
                'is_unique'     => '
                <div class="alert alert-danger alert-dismissible fade show " role="alert">
                  <strong>Data redundan!</strong> NIM sudah digunakan
                  <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                    <span aria-hidden="true">×</span>
                  </button>
                </div>
                ',
                'min_length'     => '
                <div class="alert alert-danger alert-dismissible fade show " role="alert">
                  <strong>NIM 14 digit!</strong> Jumlah digit NIM kurang dari format
                  <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                    <span aria-hidden="true">×</span>
                  </button>
                </div>
                ',
                'max_length'     => '
                <div class="alert alert-danger alert-dismissible fade show " role="alert">
                  <strong>NIM 14 digit!</strong> Jumlah digit NIM lebih dari format
                  <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                    <span aria-hidden="true">×</span>
                  </button>
                </div>
                ',
        )
    );
    $this->form_validation->set_rules(
        'email', 'Email',
        'required|valid_email|is_unique[users.email]',
        array(
                'required'      => '
								<div class="alert alert-danger alert-dismissible fade show" role="alert">
									<strong>Data belum lengkap!</strong> Anda belum mengisi %s
									<button type="button" class="close" data-dismiss="alert" aria-label="Close">
										<span aria-hidden="true">×</span>
									</button>
								</div>
                ',
                'is_unique'     => '
                <div class="alert alert-danger alert-dismissible fade show" role="alert">
                  <strong>Data redundan!</strong> Email sudah digunakan
                  <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                    <span aria-hidden="true">×</span>
                  </button>
                </div>
                ',
                'valid_email'     => '
                <div class="alert alert-danger alert-dismissible fade show" role="alert">
                  <strong>Data belum benar!</strong> Format email tidak valid
                  <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                    <span aria-hidden="true">×</span>
                  </button>
                </div>
                ',
        )
    );
    $this->form_validation->set_rules(
        'password', 'Password',
        'required|matches[passwordconf]|min_length[5]',
        array(
                'required'      => '
                <div class="alert alert-danger alert-dismissible fade show" role="alert">
                  <strong>Data belum lengkap!</strong>   %s perlu diisi untuk login.
                  <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                    <span aria-hidden="true">×</span>
                  </button>
                </div>
                ',
                'matches'     => '
                <div class="alert alert-danger alert-dismissible fade show" role="alert">
                  <strong>Data belum benar!</strong>   %s tidak cocok
                  <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                    <span aria-hidden="true">×</span>
                  </button>
                ',
                'min_length'     => '
                <div class="alert alert-danger alert-dismissible fade show" role="alert">
                  <strong>Data belum lengkap!</strong>  %s tidak boleh kurang dari 5 karakter
                  <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                    <span aria-hidden="true">×</span>
                  </button>
                </div>
                ',
        )
    );
    $this->form_validation->set_rules(
        'passwordconf', 'Konfirmasi Password',
        'required',
        array(
                'required'      => '
								<div class="alert alert-danger alert-dismissible fade show col-md-12" role="alert">
									<strong>Data belum lengkap!</strong>   %s perlu diisi untuk konfirmasi
									<button type="button" class="close" data-dismiss="alert" aria-label="Close">
										<span aria-hidden="true">×</span>
									</button>
								</div>
                ',
        )
    );
    $inputCaptcha = $this->input->post('captcha');
    $sessCaptcha = $this->session->userdata('captchaCode');
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
    if ($inputCaptcha === $sessCaptcha) {
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
    }
		else
		{
      if ($this->session->userdata('captchaCode') != 0) {
        $this->session->set_flashdata('info2',
        '  <div class="alert alert-danger alert-dismissible fade show" role="alert">
          <strong>Captcha tidak sesuai!</strong> Silakan coba kembali
          <button type="button" class="close" data-dismiss="alert" aria-label="Close">
            <span aria-hidden="true">×</span>
          </button>
        </div> ');
      }
      $config = array(
          'img_path'	 => './captcha/',
          'img_url'	 => base_url().'captcha/',
          'img_width'	 => '200',
          'font_path'     => './captcha/fonts/PlayfairDisplay-Regular.otf',
          'img_height' => 30,
          'word_length'   => 5,
          'font_size'     => 20,
          'pool'   => '0123456789abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ',
          'expiration' => 7200,
          // White background and border, black text and red grid
          'colors'    => array(
          'background' => array(255, 255, 255),
          'border' => array(255, 255, 255),
          'text' => array(70, 70, 70),
          'grid' => array(104, 210, 231)
          )
      );
      $this->load->helper('captcha');
      $captcha = create_captcha($config);
      // Unset previous captcha and store new captcha word
      $this->session->unset_userdata('captchaCode');
      $this->session->set_userdata('captchaCode',$captcha['word']);

      // Send captcha image to view
      $data['captchaImg'] = $captcha['image'];

			//display the create user form
			//set the flash data error message if there is one
			$this->data['message'] = (validation_errors() ? validation_errors() : ($this->session->flashdata('message')));
			$this->load->view('user_register', $data);
		}
	}

  public function refresh(){
        // Captcha configuration
        $config = array(
            'img_path'	 => './captcha/',
            'img_url'	 => base_url().'captcha/',
            'img_width'	 => '200',
            'font_path'     => './captcha/fonts/PlayfairDisplay-Regular.otf',
            'img_height' => 30,
            'word_length'   => 5,
            'font_size'     => 20,
            'pool'   => '0123456789abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ',
            'expiration' => 7200,
            // White background and border, black text and red grid
            'colors'    => array(
            'background' => array(255, 255, 255),
            'border' => array(255, 255, 255),
            'text' => array(70, 70, 70),
            'grid' => array(104, 210, 231)
            )
        );
        $captcha = create_captcha($config);

        // Unset previous captcha and store new captcha word
        $this->session->unset_userdata('captchaCode');
        $this->session->set_userdata('captchaCode',$captcha['word']);

        // Display captcha image
        echo $captcha['image'];
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
  }
}
