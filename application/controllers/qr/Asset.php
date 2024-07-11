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
            return redirect(base_url('auth'));
        }

        if (
            $this->session->userdata('logged_in')['dept'] != 8 &&
            $this->session->userdata('logged_in')['dept'] != 3 &&
            $this->session->userdata('logged_in')['dept'] != 6
        ) {
            return redirect(base_url('qr/user/asset'));
        }
    }

    public function setup()
    {
        $data = array(
            'get_all_asset' => $this->Asset_model->get_all_asset()
        );

        $this->load->view('qr/template/header');
        $this->load->view('qr/template/sidebar_admin', $data);
        $this->load->view('qr/admin/asset', $data);
        $this->load->view('qr/template/footer');
    }

    public function add()
    {
        $this->load->view('qr/template/header');
        $this->load->view('qr/template/sidebar_admin');
        $this->load->view('qr/admin/add');
        $this->load->view('qr/template/footer');
    }

    public function edit($id)
    {
        $id_asset = decode_id($id);
        $data = array(
            'row' => $this->Asset_model->get_asset($id_asset)
        );
        $this->load->view('qr/template/header');
        $this->load->view('qr/template/sidebar_admin', $data);
        $this->load->view('qr/admin/edit', $data);
        $this->load->view('qr/template/footer');
    }

    public function qr_code($qrcode)
    {
        // Edit : Params with link QR
        // get path assets
        $path = $this->db->select('link')->where(['code' => 'scan_link'])->get('3_asset_path')->row()->link;
        $param = $path . "/" . $qrcode;
        qrcode::png(
            $param,
            $outfile = false,
            $level = QR_ECLEVEL_H,
            $size = 2,
            $margin = 1
        );
    }

    public function post()
    {

        $this->form_validation->set_rules('code', 'Code Asset', 'required');
        $this->form_validation->set_rules('name', 'Name Asset', 'required');
        $this->form_validation->set_rules('year_acq', 'Tahun Akuisisi', 'required');
        $this->form_validation->set_rules('status', 'Status', 'required');
        $this->form_validation->set_rules('user', 'User', 'required');
        $this->form_validation->set_rules('location', 'Location', 'required');
        $this->form_validation->set_rules('qr_code', 'QR Code', 'is_unique[aset.qrcode]');

        if ($this->form_validation->run() != false) {
            //Setup Generate QRCode
            function random_alphanumeric_string($length)
            {
                $chars = '0123456789ABCDEFGHIJKLMNOPQRSTUVWXYZabcdefghijklmnopqrstuvwxyz';
                return substr(str_shuffle($chars), 0, $length);
            }
            $random = random_alphanumeric_string(5);
            $id_user = $this->session->userdata('logged_in')['id'];

            $data = array(
                'code' => $this->input->post('code'),
                'name' => $this->input->post('name'),
                'year_acq' => $this->input->post('year_acq'),
                'status' => $this->input->post('status'),
                'user' => $this->input->post('user'),
                'location' => $this->input->post('location'),
                'qrcode' => $random,
                'description' => $this->input->post('description'),
                'created_at' => date('Y-m-d H:i:s'),
                'updated_at' => date('Y-m-d H:i:s'),
                'deleted_at' => NULL,
                'id_user' => $id_user
            );
            $this->db->insert('3_asset', $data);
            $id = $this->db->insert_id();

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
                'id_user' => $id_user
            );
            $this->db->insert('3_log_asset', $raw);

            return redirect(base_url('qr/asset/setup'));
        } else {
            $this->load->view('qr/template/header');
            $this->load->view('qr/template/sidebar_admin');
            $this->load->view('qr/admin/add');
            $this->load->view('qr/template/footer');
        }
    }
    public function tableData()
    {
        
        $resultDatas = [];
        $data = $this->Asset_model->GetData($_REQUEST);
        foreach ($data['data'] as $list) {
            $row = [];
            $row[] = $list['code'];
            $row[] =  $list['name'];
            $row[] =  $list['status'];
            $row[] =  $list['user'];
            $row[] =  '<img src="' . base_url('qr/asset/qr_code/' . $list['qrcode']) . '">';
            $button = '';
            $button .= ' <div class="btn-group mb-4 btn-group-sm">
                                            
            <a href="' . base_url('qr/asset/edit/' . encode_id($list['id'])) . '" 
            class="btn btn-warning"><i class="fa fa-edit"></i> Edit</a>
                                            
            <a href="' . base_url('qr/asset/detail/' . encode_id($list['id'])) . '" 
            class="btn btn-info"><i class="fa fa-info"></i> Detail</a>';
            if ($_SESSION ["logged_in"] ["dept"] == 6) {
                $button .= '<a href=" '. base_url('qr/asset/delete/'.encode_id($list['id'])) . '"
                 class="btn btn-danger"><i class="fa fa-trash"></i> Delete</a>';
            }

            $button .= '</div>';
            $row[] =  $button;
            $resultDatas[] = $row;
        }
        $output = [
            'draw' => $_REQUEST['draw'],
            'recordsTotal' => $data['totalRecord'],
            'recordsFiltered' => $data['totalRecord'],
            'data' => $resultDatas,
        ];
        echo json_encode($output, JSON_HEX_QUOT | JSON_HEX_TAG);
    }
    public function tableDataLog()
    {
        
        $resultDatas = [];
        $data = $this->Asset_model->GetData($_REQUEST);
        foreach ($data['data'] as $list) {
            $row = [];
            $row[] = $list['code'];
            $row[] =  $list['name'];
            $row[] =  $list['status'];
            $row[] =  $list['user'];
         
            $button = '';
            $button .= '  <div class="btn-group btn-group-sm">
            <a href="'. base_url( 'qr/report/log_detail/'.encode_id($list['id'])).'" 
            class="btn btn-info btn-sm"><i class="fa fa-info"></i> Log Detail</a>
            </div>';
            
            $row[] =  $button;
            $resultDatas[] = $row;
        }
        $output = [
            'draw' => $_REQUEST['draw'],
            'recordsTotal' => $data['totalRecord'],
            'recordsFiltered' => $data['totalRecord'],
            'data' => $resultDatas,
        ];
        echo json_encode($output, JSON_HEX_QUOT | JSON_HEX_TAG);
    }
    public function tableDataRekap()
    {
        
        $resultDatas = [];
        $data = $this->Asset_model->GetData($_REQUEST);
        foreach ($data['data'] as $list) {
            $row = [];
            $row[] = $list['code'];
            $row[] =  $list['name'];
            $row[] =  $list['status'];
            $row[] =  $list['user'];
            $row[] =  $list['location'];
            $resultDatas[] = $row;
        }
        $output = [
            'draw' => $_REQUEST['draw'],
            'recordsTotal' => $data['totalRecord'],
            'recordsFiltered' => $data['totalRecord'],
            'data' => $resultDatas,
        ];
        echo json_encode($output, JSON_HEX_QUOT | JSON_HEX_TAG);
    }
    public function tableDataDashboard()
    {
        
        $resultDatas = [];
        $data = $this->Asset_model->GetData($_REQUEST);
        foreach ($data['data'] as $list) {
            $row = [];
            $row[] = $list['code'];
            $row[] =  $list['name'];
            $row[] =  $list['user'];
            $row[] =  $list['location'];
            $resultDatas[] = $row;
        }
        $output = [
            'draw' => $_REQUEST['draw'],
            'recordsTotal' => $data['totalRecord'],
            'recordsFiltered' => $data['totalRecord'],
            'data' => $resultDatas,
        ];
        echo json_encode($output, JSON_HEX_QUOT | JSON_HEX_TAG);
    }
    public function update()
    {
        $this->form_validation->set_rules('code', 'Code Asset', 'required');
        $this->form_validation->set_rules('name', 'Name Asset', 'required');
        $this->form_validation->set_rules('year_acq', 'Tahun Akuisisi', 'required');
        $this->form_validation->set_rules('status', 'Status', 'required');
        $this->form_validation->set_rules('user', 'User', 'required');
        $this->form_validation->set_rules('location', 'Location', 'required');

        $id = $this->input->post('id');

        if ($this->form_validation->run() != false) {

            $id_user = $this->session->userdata('logged_in')['id'];

            $data = array(
                'code' => $this->input->post('code'),
                'name' => $this->input->post('name'),
                'year_acq' => $this->input->post('year_acq'),
                'status' => $this->input->post('status'),
                'user' => $this->input->post('user'),
                'description' => $this->input->post('description'),
                'location' => $this->input->post('location'),
                'updated_at' => date('Y-m-d H:i:s'),
                'id_user' => $id_user
            );
            $this->db->where('id', $id);
            $this->db->update('3_asset', $data);

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

    public function delete($id)
    {
        $id_asset = decode_id($id);
        $id_user = $this->session->userdata('logged_in')['id'];
        $data = array(
            'id_user' => $id_user,
            'updated_at' => date('Y-m-d H:i:s'),
            'deleted_at' => date('Y-m-d H:i:s'),
        );
        $this->db->where('id', $id_asset);
        $this->db->update('3_asset', $data);
        $data1 = array(
            'updated_at' => date('Y-m-d H:i:s'),
            'deleted_at' => date('Y-m-d H:i:s'),
        );
        $this->db->where('id_asset', $id_asset);
        $this->db->update('3_file_asset', $data1);

        return redirect(base_url('qr/asset/setup'));
    }

    public function detail($id)
    {
        $id_asset = decode_id($id);
        $data = array(
            'row' => $this->Asset_model->get_asset($id_asset)
        );
        $this->load->view('qr/template/header');
        $this->load->view('qr/template/sidebar_admin', $data);
        $this->load->view('qr/admin/detail', $data);
        $this->load->view('qr/template/footer');
    }


    public function scan()
    {
        $this->load->view('qr/template/header');
        $this->load->view('qr/template/sidebar_admin');
        $this->load->view('qr/admin/scan');
        $this->load->view('qr/template/footer');
    }

    public function scan_detail($id)
    {
        $data = array(
            'row' => $this->Asset_model->asset_qr($id)
        );
        $this->load->view('qr/template/header');
        $this->load->view('qr/template/sidebar_admin');
        $this->load->view('qr/admin/view', $data);
        $this->load->view('qr/template/footer');
    }
}
