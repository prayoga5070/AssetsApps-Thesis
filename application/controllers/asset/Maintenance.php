<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Maintenance extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        //Do your magic here
        if ($this->session->userdata('logged_in') != true) {
            redirect(base_url('auth'));
        }
        $this->dataMenu['list_menu'] = $this->Navigation_model->get_menu();
        $this->dataMenu['list_sub_menu'] = $this->Navigation_model->get_sub_menu();
    }

    public function index()
    {
        $user_id = $this->session->userdata('logged_in')['id'];
        $user_level = $this->session->userdata('logged_in')['level'];

        if ($this->input->post()) {
            // Handle form submission
            $created_at = $this->input->post('created_at');
            $created_by = $this->input->post('created_by');
            $code = $this->input->post('code');
            $status = $this->input->post('status');

            // Redirect with query parameters
            redirect('asset/maintenance/index?created_at=' . urlencode($created_at) . '&created_by=' . urlencode($created_by) . '&code=' . urlencode($code) . '&status=' . urlencode($status));
        }

        // Retrieve the query parameters for filtering
        $created_at = $this->input->get('created_at');
        $created_by = $this->input->get('created_by');
        $code = $this->input->get('code');
        $status = $this->input->get('status');

        $filter_result = $this->Maintenance_model->get_all_filter(
            $user_id,
            $created_at,
            $created_by,
            $code,
            $status,
            $user_level
        );

        $data = array(
            'get_all_peminjaman' => $filter_result,
            'user_id' => $user_id,
            'user_level' => $user_level
        );

        $this->load->view('qr/template/header');
        $this->load->view('qr/template/sidebar_admin', $this->dataMenu);
        $this->load->view('asset/maintenance/load_data', $data);
        $this->load->view('qr/template/footer');
    }

    public function view($id)
    {
        $id_log = decode_id($id);
        $notes = $this->Maintenance_model->get_all_notes($id_log);
        // $notes_text = '';
        // foreach ($notes as $note) {
        //     $notes_text .= $note->created_at . "\n";
        //     $notes_text .= $note->status . ' by ' . $note->name . " :\n";
        //     $notes_text .= $note->notes . "\n\n";
        // }

        $data = array(
            'row' => $this->Maintenance_model->get($id_log),
            'log' => $notes,
        );

        $this->load->view('qr/template/header');
        $this->load->view('qr/template/sidebar_admin', $this->dataMenu);
        $this->load->view('asset/maintenance/view', $data);
        $this->load->view('qr/template/footer');
    }

    public function add()
    {
        $userLogInName = $this->session->userdata('logged_in')['name'];
        $data = array(
            'userLogInName' => $userLogInName
        );

        $this->load->view('qr/template/header');
        $this->load->view('qr/template/sidebar_admin', $this->dataMenu);
        $this->load->view('asset/maintenance/add', $data);
        $this->load->view('qr/template/footer');
    }

    public function post_add()
    {
        $this->session->unset_userdata('msg');
        $this->form_validation->set_rules('code', 'No Asset', 'required');
        $this->form_validation->set_rules('note', 'Notes', 'required');

        $data = array(
            'validation_errors' => validation_errors(),
            'userLogInName' => $this->session->userdata('logged_in')['name'],
            'code' => $this->input->post('code'),
            'note' =>  $this->input->post('note')
        );

        // Check if form validation passed
        if ($this->form_validation->run() == FALSE) {
            $this->load->view('qr/template/header');
            $this->load->view('qr/template/sidebar_admin', $this->dataMenu);
            $this->load->view('asset/maintenance/add', $data);
            $this->load->view('qr/template/footer');
        } else {
            // Validation passed, process form data
            $user_id = $this->session->userdata('logged_in')['id'];
            $asset = $this->Asset_model->asset_code($this->input->post('code'));

            if ($asset) {
                if ($asset->status != 'Active') {
                    $this->session->set_flashdata('msg', '<div class="alert alert-danger"><strong>Failed! </strong>Asset not active or under maintenance</div>');
                    $this->load->view('qr/template/header');
                    $this->load->view('qr/template/sidebar_admin', $this->dataMenu);
                    $this->load->view('asset/maintenance/add', $data);
                    $this->load->view('qr/template/footer');
                } else {
                    $data = array(
                        'asset_id' => $asset->id,
                        'status' => 'Waiting for Maintenance',
                        'created_by' =>  $user_id,
                        'created_at' => date('Y-m-d H:i:s'),
                    );
                    $this->db->insert('maintenance', $data);

                    $maintenance_id = $this->db->insert_id();
                    $notes = array(
                        'maintenance_id' => $maintenance_id,
                        'notes' => $this->input->post('note'),
                        'created_by' =>  $user_id,
                        'created_at' => date('Y-m-d H:i:s'),
                        'status' => 'Request',
                    );
                    $this->db->insert('maintenance_notes_history', $notes);

                    $ass = array(
                        'status' => 'Maintenance',
                        'updated_at' => date('Y-m-d H:i:s'),
                    );
                    $this->db->where('id', $asset->id);
                    $this->db->update('3_asset', $ass);

                    redirect(base_url('asset/maintenance'));
                }
            } else {
                $this->session->set_flashdata('msg', '<div class="alert alert-danger"><strong>Failed! </strong>Invalid asset code</div>');
                $this->load->view('qr/template/header');
                $this->load->view('qr/template/sidebar_admin', $this->dataMenu);
                $this->load->view('asset/maintenance/add', $data);
                $this->load->view('qr/template/footer');
            }
        }
    }

    public function edit($id)
    {
        $id_log = decode_id($id);
        $notes = $this->Maintenance_model->get_all_notes($id_log);
        // $notes_text = '';
        // foreach ($notes as $note) {
        //     $notes_text .= $note->created_at . "\n";
        //     $notes_text .= $note->status . ' by ' . $note->name . " :\n";
        //     $notes_text .= $note->notes . "\n\n";
        // }

        $data = array(
            'row' => $this->Maintenance_model->get($id_log),
            'log' => $notes,
        );

        $this->load->view('qr/template/header');
        $this->load->view('qr/template/sidebar_admin', $this->dataMenu);
        $this->load->view('asset/maintenance/edit', $data);
        $this->load->view('qr/template/footer');
    }

    public function post_edit($id)
    {
        $id_log = decode_id($id);
        $this->session->unset_userdata('msg');
        $this->form_validation->set_rules('note', 'Notes', 'required');
        $this->form_validation->set_rules('status', 'Status', 'required');

        $notes = $this->Maintenance_model->get_all_notes($id_log);
        $notes_text = '';
        foreach ($notes as $note) {
            $notes_text .= $note->created_at . "\n";
            $notes_text .= $note->status . ' by ' . $note->name . " :\n";
            $notes_text .= $note->notes . "\n\n";
        }

        $data = array(
            'validation_errors' => validation_errors(),
            'row' => $this->Maintenance_model->get($id_log),
            'log' => $notes_text,
            // 'code' => $this->input->post('code'),
            // 'note' =>  $this->input->post('note'),
            // 'status' =>  $this->input->post('status')
        );

        if ($this->form_validation->run() == FALSE) {
            $this->load->view('qr/template/header');
            $this->load->view('qr/template/sidebar_admin', $this->dataMenu);
            $this->load->view('asset/maintenance/edit', $data);
            $this->load->view('qr/template/footer');
        } else {
            $user_id = $this->session->userdata('logged_in')['id'];
            $asset = $this->Asset_model->asset_code($this->input->post('code'));

            if ($asset) {
                $data = array(
                    'status' => $this->input->post('status'),
                    'updated_by' => $user_id,
                    'updated_at' => date('Y-m-d H:i:s'),
                );
                $this->db->where('id', $id_log);
                $this->db->update('maintenance', $data);

                $notes = array(
                    'maintenance_id' => $id_log,
                    'notes' => $this->input->post('note'),
                    'created_by' =>  $user_id,
                    'created_at' => date('Y-m-d H:i:s'),
                    'status' => $this->input->post('status')
                );
                $this->db->insert('maintenance_notes_history', $notes);
                return redirect(base_url('asset/maintenance'));
            } else {
                $this->session->set_flashdata('msg', '<div class="alert alert-danger"><strong>Failed! </strong>Invalid asset code</div>');
                $this->load->view('qr/template/header');
                $this->load->view('qr/template/sidebar_admin', $this->dataMenu);
                $this->load->view('asset/maintenance/edit', $data);
                $this->load->view('qr/template/footer');
            }
        }
    }

    public function scan_maintenance($id)
    {
        $asset = $this->Asset_model->asset_qr($id);
        $data = array('asset_code' => $asset->code);

        header('Content-Type: application/json');
        echo json_encode($data);
    }
}
