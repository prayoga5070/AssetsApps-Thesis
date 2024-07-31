<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Report extends CI_Controller
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
        $this->load->view('qr/template/header');
        $dataMenu['list_menu'] = $this->Navigation_model->get_menu();
        $dataMenu['list_sub_menu'] = $this->Navigation_model->get_sub_menu();
        $this->load->view('qr/template/sidebar_admin', $dataMenu);
        $this->load->view('qr/admin/report', $data);
        $this->load->view('qr/template/footer');
    }

    public function log()
    {
        
        $data = array(
            'assetCategories' => $this->Asset_model->get_all_asset_category()
        );
        $this->load->view('qr/template/header');
        $dataMenu['list_menu'] = $this->Navigation_model->get_menu();
        $dataMenu['list_sub_menu'] = $this->Navigation_model->get_sub_menu();
        $this->load->view('qr/template/sidebar_admin', $dataMenu);
        $this->load->view('qr/admin/log', $data);
        $this->load->view('qr/template/footer');
    }

    public function log_detail($id)
    {
        $id_log = decode_id($id);
        $data = array(
            'log' => $this->Asset_model->log_asset($id_log),
            'row' => $this->Asset_model->get_asset($id_log)
        );
        $this->load->view('qr/template/header');
        $this->load->view('qr/template/sidebar_admin', $data);
        $this->load->view('qr/admin/log_detail');
        $this->load->view('qr/template/footer');
    }
}
