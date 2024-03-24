<?php
defined('BASEPATH') or exit('No direct script access allowed');
require 'vendor/autoload.php';

class Asset extends CI_Controller
{

    public function __construct()
    {
        parent::__construct();
        //Do your magic here
        if ($this->session->userdata('logged_in') != TRUE) {
            redirect(base_url('auth'));
        }
    }

    public function index()
	{
        $data = array(
            'get_all_asset' => $this->Asset_model->get_all_asset()
        );
        $this->load->view('qr/template/header');
        $this->load->view('qr/template/sidebar', $data);
        $this->load->view('qr/user/dashboard', $data);
        $this->load->view('qr/template/footer');
	}

    public function setup()
    {
        $data = array(
            'get_all_asset' => $this->Asset_model->get_all_asset()
        );

        $this->load->view('qr/template/header');
        $this->load->view('qr/template/sidebar');
        $this->load->view('qr/user/asset', $data);
        $this->load->view('qr/template/footer');
    }

    public function qr_code($qrcode)
    {
        qrcode::png(
            $qrcode,
            $outfile = false,
            $level = QR_ECLEVEL_H,
            $size = 4,
            $margin = 1
        );
    }

    public function detail($id)
    {
        $id_asset = decode_id($id);
        $data = array(
            'row' => $this->Asset_model->get_asset($id_asset)
        );
        $this->load->view('qr/template/header');
        $this->load->view('qr/template/sidebar');
        $this->load->view('qr/user/detail', $data);
        $this->load->view('qr/template/footer');
    }

    public function scan()
    {
        $this->load->view('qr/template/header');
        $this->load->view('qr/template/sidebar');
        $this->load->view('qr/user/scan');
        $this->load->view('qr/template/footer');
    }

    public function scan_detail()
    {
        $id = $this->input->post('qr');
        $data = array(
            'row' => $this->Asset_model->asset_qr($id)
        );
        $this->load->view('qr/template/header');
        $this->load->view('qr/template/sidebar');
        $this->load->view('qr/user/view', $data);
        $this->load->view('qr/template/footer');
    }

    public function report()
    {
        $data = array(
            'assets' => $this->Asset_model->get_all_asset(),
        );
        $this->load->view('qr/template/header');
        $this->load->view('qr/template/sidebar');
        $this->load->view('qr/user/report', $data);
        $this->load->view('qr/template/footer');
    }

}
