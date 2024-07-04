<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Dashboard extends CI_Controller {

    public function __construct()
    {
        parent::__construct();
        //Do your magic here
        if ($this->session->userdata('logged_in') != true) {
            redirect(base_url('auth'));
        }
    }

	public function index()
	{
        // $data = array(
        //     'get_all_asset' => $this->Asset_model->get_all_asset()
        // );
        $this->load->view('qr/template/header');
        $this->load->view('qr/template/sidebar_admin');
        $this->load->view('qr/admin/dashboard');
        $this->load->view('qr/template/footer');
	}
}
