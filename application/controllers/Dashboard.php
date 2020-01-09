<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Dashboard extends MY_Controller {

    function __construct()
    {
		parent::__construct();
        $this->load->helper('url');
        $this->load->model('users_model');
	}

    public function index()
    {
        $this->render_backend('dashboard');
    }
} ?>