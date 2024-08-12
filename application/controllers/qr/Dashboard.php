<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Dashboard extends CI_Controller
{

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
        $data = array(
            'assetCategories' => $this->Asset_model->get_all_asset_category()
        );
        $dataMenu['list_menu'] = $this->Navigation_model->get_menu();
        $dataMenu['list_sub_menu'] = $this->Navigation_model->get_sub_menu();

        $this->load->view('qr/template/header');
        $this->load->view('qr/template/sidebar_admin', $dataMenu);
        $this->load->view('qr/admin/dashboard', $data );
        $this->load->view('qr/template/footer');
    }
}
