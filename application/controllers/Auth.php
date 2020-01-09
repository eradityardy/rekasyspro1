<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Auth extends MY_Controller
{
    public function __construct()
    {
		parent::__construct();
        $this->load->helper('url');
        $this->load->model('users_model');
	}

	public function index()
	{
		if($this->session->userdata('authenticated')) // Jika user sudah login (Session authenticated ditemukan)
			redirect('dashboard'); // Redirect ke page home
		
		// function render_login tersebut dari file core/MY_Controller.php
		$this->render_login('login'); // Load view login.php
	}

	public function login()
	{
		$username = $this->input->post('username'); // Ambil isi dari inputan username pada form login
		$password = $this->input->post('password'); // Ambil isi dari inputan password pada form login
		$user = $this->users_model->get($username); // Panggil fungsi get yang ada di UserModel.php
		
		if(empty($user))
		{ // Jika hasilnya kosong / user tidak ditemukan
			$this->session->set_flashdata('message', 'Username tidak ditemukan'); // Buat session flashdata
			redirect('auth'); // Redirect ke halaman login
		}else {
		  	if($password == $user->password){ // Jika password yang diinput sama dengan password yang didatabase
				$session = array(
					'authenticated'=>true, // Buat session authenticated dengan value true
					'username'=>$user->username,  // Buat session username
					'fullname'=>$user->fullname, // Buat session nama
					'role'=>$user->role // Buat session role
				);
				$this->session->set_userdata($session); // Buat session sesuai $session
				redirect('dashboard'); // Redirect ke halaman home
			}else { 
				$this->session->set_flashdata('message', 'Password salah'); // Buat session flashdata
				redirect('auth'); // Redirect ke halaman login
			}
		}
	}

	public function logout()
	{
		$this->session->sess_destroy();
		redirect('auth');
	}
} ?>