<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Users extends MY_Controller {

    function __construct()
    {
		parent::__construct();
        $this->load->helper('url');
        $this->load->model('users_model');
	}

    public function index()
    {
        $data['title'] = 'Users';
        $data['title2'] = 'Data Pengguna';
        $data['users'] = $this->users_model->get_users();
        if($this->session->userdata('role') != 'manager'){
            redirect('showerror');
        }
        $this->render_backend('Users/users', $data);
    }

    public function tambahusers()
    {
        $data['title'] = 'Users';
        $data['title2'] = 'Data Pengguna';
        $data['title3'] = 'Tambah Pengguna';
        $this->render_backend('Users/users_tambah', $data);
    }

    public function simpanusers()
    {
        $fullname = $this->input->post('fullname');
        $username = $this->input->post('username');
        $password = $this->input->post('password');
		$data = array(
            'fullname' => $fullname,
            'username' => $username,
            'password' => $password
		);
		$this->users_model->add_users($data, 'users');
		redirect('users');
    }

    public function editusers($kodex=0)
    {
        if ($this->uri->segment(3)==null) {
            echo "<script>alert('Kamu belum memilih data yang ingin diedit')</script>";
            redirect('users');
        }
        $users = $this->users_model->get_users(" WHERE id_users = '$kodex'")->row_array();
        $data = array(
            'title'=>'Users',
            'title2'=>'Data Pengguna',
            'title3'=>'Edit Pengguna',
            'id_users'=>$users['id_users'],
            'fullname'=>$users['fullname'],
            'username'=>$users['username'],
            'password'=>$users['password'],
        );
        $this->render_backend('Users/users_edit',$data);
    }

    public function updateusers()
    {
        if (!$_POST['updateusers']) {
            redirect('users');
        }
        $id_users = $this->input->post('id_users');
        $fullname = $this->input->post('fullname');
        $username = $this->input->post('username');
        $data = array(
            'fullname'=>$fullname,
            'username'=>$username
        );
        $result = $this->users_model->edit_users('users', $data, array('id_users'=>$id_users));
        if ($result == 1) {
            echo "<script>alert('Data berhasil diupdate')</script>";
            redirect('users');
        }
        else {
            echo "<script>alert('Data gagal diupdate')</script>";
            redirect('users/editusers/');
        }
    }

    public function hapususers($kodex=0)
    {
        if ($this->uri->segment(3)==null) {
            echo "<script>alert('Kamu belum memilih data yang ingin dihapus')</script>";
            redirect('users');
        }
        $result = $this->users_model->delete_users('users', array('id_users'=>$kodex));
        if ($result == 1) {
            echo "<script>alert('Data berhasil dihapus')</script>";
            redirect('users');
        }
        else {
            echo "<script>alert('Data gagal dihapus')</script>";
            redirect('users');
        }
    }
}