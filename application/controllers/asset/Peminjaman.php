<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Peminjaman extends CI_Controller
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
            'get_all_peminjaman' => $this->Peminjaman_model->get_all_peminjaman(1)
        );
        $this->load->view('qr/template/header');
        $this->load->view('qr/template/sidebar_admin', $data);
        $this->load->view('asset/peminjaman/load_peminjaman', $data);
        $this->load->view('qr/template/footer');
    }

    public function view_detail($id)
    {
        $id_log = decode_id($id);
        $data = array(
            'row' => $this->Peminjaman_model->get_peminjaman($id_log),
            'log' => $this->Peminjaman_model->get_all_asset_peminjaman($id_log)
        );
        // var_dump($data);
        // die();

        $this->load->view('qr/template/header');
        $this->load->view('qr/template/sidebar_admin', $data);
        $this->load->view('asset/peminjaman/view', $data);
        $this->load->view('qr/template/footer');
    }


    public function add()
    {
        $this->load->view('qr/template/header');
        $this->load->view('qr/template/sidebar_admin');
        $this->load->view('asset/peminjaman/add');
        $this->load->view('qr/template/footer');
    }

    public function post_add($q)
    {
        $data = array(
            'row' => $this->Peminjaman_model->get_peminjaman($id_log),
            'log' => $this->Peminjaman_model->get_all_asset_peminjaman($id_log)
        );

        $this->load->view('qr/template/header');
        $this->load->view('qr/template/sidebar_admin');
        $this->load->view('asset/peminjaman/add');
        $this->load->view('qr/template/footer');
    }

    public function edit($id)
    {
        $id_log = decode_id($id);
        $data = array(
            'row' => $this->Peminjaman_model->get_peminjaman($id_log),
            'log' => $this->Peminjaman_model->get_all_asset_peminjaman($id_log),
            'get_all_asset' => $this->Asset_model->get_all_asset()
        );
        // var_dump($data);
        // die();

        $this->load->view('qr/template/header');
        $this->load->view('qr/template/sidebar_admin', $data);
        $this->load->view('asset/peminjaman/edit', $data);
        $this->load->view('qr/template/footer');
    }

    public function post_edit()
    {
        // Accessing form data from POST request
        // $data = $_POST;

        $this->form_validation->set_rules('lokasi_id', 'Lokasi Peminjaman', 'required');
        $this->form_validation->set_rules('alasan_peminjaman', 'Alasan Peminjaman', 'required');
        $this->form_validation->set_rules('id', 'Id', 'required');

        // var_dump($data);
        // die();

        $id = $this->input->post('id');

        if ($this->form_validation->run() != false) {

            $id_user = $this->session->userdata('logged_in')['id'];

            $data = array(
                'user_id' => $id_user,
                'lokasi_id' => $this->input->post('name'),
                'alasan_peminjaman' => $this->input->post('year_acq'),
                'updated_at' => $this->input->post('status')
            );
            $this->db->where('id', $id);
            $this->db->update('peminjaman', $data);

            if (!empty($_FILES['fileupload']['name'])) {
                $upload = upload_file('fileupload', 'uploads/assetsqr/' . date('Y-m-d'), true, 'png|jpg|jpeg|gif', 5);
                $data1 = [
                    'id_asset' => $id,
                    'file_path' => $upload['path_min'],
                    'file_name' => $upload['name'],
                    'created_at' => date('Y-m-d H:i:s'),
                    'updated_at' => date('Y-m-d H:i:s'),
                    'deleted_at' => NULL,
                ];
                $this->db->insert('3_file_asset', $data1);
            }

            $raw = array(
                'id_asset' => $id,
                'code' => $this->input->post('code'),
                'name' => $this->input->post('name'),
                'year_acq' => $this->input->post('year_acq'),
                'status' => $this->input->post('status'),
                'user' => $this->input->post('user'),
                'description' => $this->input->post('description'),
                'location' => $this->input->post('location'),
                'created_at' => date('Y-m-d H:i:s'),
                'id_user' => $id_user,
            );
            $this->db->insert('3_log_asset', $raw);

            return redirect(base_url('qr/asset/setup'));
        } else {
            $this->load->view('qr/template/header');
            $this->load->view('qr/template/sidebar_admin');
            $this->load->view('qr/admin/edit');
            $this->load->view('qr/template/footer');
        }
    }
}
