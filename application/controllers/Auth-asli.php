<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Auth extends CI_Controller
{
    function __construct()
    {
		parent::__construct();
        $this->load->helper('url');
        $this->load->model('auth_model');
	}

	public function index()
	{
		$this->load->view('Auth/login');
	}
	
	public function register()
	{
		$this->load->view('Auth/register');
	}

	public function reg_action()
	{
		$fullname = $this->input->post('fullname');
		$username = $this->input->post('username');
		$password = $this->input->post('password');
		$repassword = $this->input->post('repassword');

		if ($password != $repassword)
		{
			echo "Password tidak sama";
		}
		else
		{
			$data = array(
				'fullname'=>$fullname,
				'username'=>$username,
				'password'=>$password);
			$result=$this->auth_model->simpan('users',$data);
			if ($result > 0)
			{
				echo "Data berhasil disimpan";
			}
			else
			{
				echo "Data gagal disimpan";
			}
		}
	}

	public function login_action()
	{
		$username = $this->input->post('username');
		$password = $this->input->post('password');
		$check_login_r = $this->auth_model->getLogin($username,$password)->num_rows();
		if ($check_login_r > 0)
		{
			$datauser = $this->auth_model->getLogin($username,$password)->row_array();
			$sessions = array(
				'userid'=>$datauser['id_users'],
				'nameuser'=>$datauser['username'],
				'namefull'=>$datauser['fullname'],
				'status'=>'ok',
			);
			$this->session->set_userdata($sessions);
			redirect("dataproyek");
		}
		else
		{
			echo "<script>alert('Login Gagal')</script>";
			$this->index();
		}
	}

	public function logout_action()
	{
		$this->session->sess_destroy();
		redirect('auth');
	}
}
?>