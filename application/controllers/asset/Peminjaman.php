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
        $this->dataMenu['list_menu'] = $this->Navigation_model->get_menu();
        $this->dataMenu['list_sub_menu'] = $this->Navigation_model->get_sub_menu();
    }

    public function index()
    {
        $user_id = $this->session->userdata('logged_in')['id'];
        $user_level = $this->session->userdata('logged_in')['level'];

        if ($this->input->post()) {
            $created_by = $this->input->post('created_by');
            $created_at = $this->input->post('created_at');
            $status = $this->input->post('status');

            redirect('asset/peminjaman/index?created_at=' . urlencode($created_at) . '&created_by=' . urlencode($created_by) . '&status=' . urlencode($status));
        }

        // Retrieve the query parameters for filtering
        $created_at = $this->input->get('created_at');
        $created_by = $this->input->get('created_by');
        $status = $this->input->get('status');

        $filter_result = $this->Peminjaman_model->get_all_peminjaman(
            $user_id,
            $created_by,
            $created_at,
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
        $this->load->view('asset/peminjaman/load_data', $data);
        $this->load->view('qr/template/footer');
    }

    public function view($id)
    {
        $id_log = decode_id($id);

        $data = array(
            'row' => $this->Peminjaman_model->get($id_log),
            'categories' => $this->Peminjaman_model->get_peminjaman_category($id_log),
            'assets' => $this->Peminjaman_model->get_peminjaman_category_asset($id_log),
        );

        $this->load->view('qr/template/header');
        $this->load->view('qr/template/sidebar_admin', $this->dataMenu);
        $this->load->view('asset/peminjaman/view', $data);
        $this->load->view('qr/template/footer');
    }

    public function add()
    {
        $userLogInName = $this->session->userdata('logged_in')['name'];
        $data = array(
            'userLogInName' => $userLogInName,
            'assetCategories' => $this->Asset_model->get_all_asset_category()
        );

        $this->load->view('qr/template/header');
        $this->load->view('qr/template/sidebar_admin', $this->dataMenu);
        $this->load->view('asset/peminjaman/add', $data);
        $this->load->view('qr/template/footer');
    }

    public function post_add()
    {
        $json_data = json_decode($this->input->raw_input_stream, true);

        $form_data = $json_data['form'];
        $table_data = $json_data['table'];

        $_POST = [];
        foreach ($form_data as $item) {
            $_POST[$item['name']] = $item['value'];
        }

        $user_id = $this->session->userdata('logged_in')['id'];

        $data = array(
            'start_date' => $_POST['start_date'],
            'end_date' => $_POST['end_date'],
            'location' => $_POST['location'],
            'description' => $_POST['description'],
            'status' => $_POST['status'],
            'created_by' => $user_id,
            'created_at' => date('Y-m-d H:i:s'),
        );
        $this->db->insert('peminjaman', $data);
        $peminjaman_id = $this->db->insert_id();

        foreach ($table_data as $row) {
            $asset_data = array(
                'peminjaman_id' => $peminjaman_id,
                'asset_category_id' => $row['asset_category_id'],
                'quantity' => $row['quantity'],
                'description' => $row['description'],
                'created_by' => $user_id,
                'created_at' => date('Y-m-d H:i:s'),
            );
            $this->db->insert('peminjaman_list_category', $asset_data);
        }

        $response = array(
            'status' => 'success',
            'message' => 'Data submitted successfully',
            'url' => base_url('asset/peminjaman')
        );
        echo json_encode($response);
    }

    public function edit($id)
    {
        $id_log = decode_id($id);

        // $categories = $this->Peminjaman_model->get_peminjaman_category($id_log);
        // $category_ids = array_map(function ($category) {
        //     return $category->id;
        // }, $categories);

        $data = array(
            'row' => $this->Peminjaman_model->get($id_log),
            'categories' =>  $this->Peminjaman_model->get_peminjaman_category($id_log),
            'assets' => $this->Peminjaman_model->get_peminjaman_category_asset($id_log),
            'assetCategories' => $this->Asset_model->get_all_asset_category()
        );

        $this->load->view('qr/template/header');
        $this->load->view('qr/template/sidebar_admin', $this->dataMenu);
        $this->load->view('asset/peminjaman/edit', $data);
        $this->load->view('qr/template/footer');
    }

    public function post_edit($id)
    {
        // Set the content type to application/json
        header('Content-Type: application/json');

        try {
            // Decode the incoming JSON data
            $json_data = json_decode($this->input->raw_input_stream, true);

            // Check if JSON decoding was successful
            if ($json_data === null && json_last_error() !== JSON_ERROR_NONE) {
                echo json_encode(array(
                    'status' => 'error',
                    'message' => 'Invalid JSON data'
                ));
                return;
            }

            // Extract form and table data from the decoded JSON
            $form_data = $json_data['form'];
            $table_data = $json_data['table'];

            // Populate $_POST with form data
            $_POST = [];
            foreach ($form_data as $item) {
                $_POST[$item['name']] = $item['value'];
            }

            // Get the user ID from the session
            $user_id = $this->session->userdata('logged_in')['id'];

            // Prepare data for the `peminjaman` table update
            $data = array(
                'start_date' => $_POST['start_date'],
                'end_date' => $_POST['end_date'],
                'location' => $_POST['location'],
                'description' => $_POST['description'],
                'status' => $_POST['status'],
                'updated_by' => $user_id,
                'updated_at' => date('Y-m-d H:i:s'),
            );
            $this->db->where('id', $id);
            $this->db->update('peminjaman', $data);

            // Fetch existing records from the database
            $data_categories = $this->Peminjaman_model->get_peminjaman_category($id);
            $existing_ids = array_column($data_categories, 'id');
            $new_ids = array_column($table_data, 'id');
            $ids_to_delete = array_diff($existing_ids, $new_ids);

            // Delete records that are not present in the new data
            if (!empty($ids_to_delete)) {
                $this->db->where_in('id', $ids_to_delete);
                $this->db->update('peminjaman_list_category', array(
                    'deleted_at' => date('Y-m-d H:i:s'),
                    'deleted_by' => $user_id
                ));
            }

            // Process each row in the `table_data`
            foreach ($table_data as $row) {
                $asset_data = array(
                    'asset_category_id' => $row['asset_category_id'],
                    'quantity' => $row['quantity'],
                    'description' => $row['description']
                );

                // Determine if this is an insert or update operation
                if (!empty($row['id'])) {
                    // Update existing row
                    $asset_data['updated_at'] = date('Y-m-d H:i:s');
                    $asset_data['updated_by'] = $user_id;

                    $this->db->where('id', $row['id']);
                    $this->db->update('peminjaman_list_category', $asset_data);
                } else {
                    // Insert new row
                    $asset_data['peminjaman_id'] = $id;
                    $asset_data['created_at'] = date('Y-m-d H:i:s');
                    $asset_data['created_by'] = $user_id;

                    $this->db->insert('peminjaman_list_category', $asset_data);
                }
            }

            // Prepare and send the JSON response
            $response = array(
                'status' => 'success',
                'message' => 'Data submitted successfully',
                'url' => base_url('asset/peminjaman'),
            );
            echo json_encode($response);
        } catch (Exception $e) {
            // Handle exceptions and send an error response
            $response = array(
                'status' => 'error',
                'message' => $e->getMessage()
            );
            echo json_encode($response);
        }
    }

    public function process($id)
    {
        $id_log = decode_id($id);

        $data = array(
            'row' => $this->Peminjaman_model->get($id_log),
            'categories' => $this->Peminjaman_model->get_peminjaman_category($id_log),
            'assets' => $this->Peminjaman_model->get_peminjaman_category_asset($id_log),
            'assetDropdown' => $this->Asset_model->get_all_active_asset_peminjaman()
        );

        $this->load->view('qr/template/header');
        $this->load->view('qr/template/sidebar_admin', $this->dataMenu);
        $this->load->view('asset/peminjaman/process', $data);
        $this->load->view('qr/template/footer');
    }

    public function post_process($id)
    {
        // Set the content type to application/json
        header('Content-Type: application/json');

        try {
            // Decode the incoming JSON data
            $json_data = json_decode($this->input->raw_input_stream, true);

            // Check if JSON decoding was successful
            if ($json_data === null && json_last_error() !== JSON_ERROR_NONE) {
                echo json_encode(array(
                    'status' => 'error',
                    'message' => 'Invalid JSON data'
                ));
                return;
            }

            // Extract form and table data from the decoded JSON
            $form_data = $json_data['form'];
            $table_data = $json_data['table'];

            // Populate $_POST with form data
            $_POST = [];
            foreach ($form_data as $item) {
                $_POST[$item['name']] = $item['value'];
            }

            $user_id = $this->session->userdata('logged_in')['id'];

            if ($_POST['status'] != 'Done') {
                $data = array(
                    'notes_approver' => $_POST['approver_note'],
                    'status' => $_POST['status'],
                    'updated_by' => $user_id,
                    'updated_at' => date('Y-m-d H:i:s'),
                );
                $this->db->where('id', $id);
                $this->db->update('peminjaman', $data);
            } else {
                $get_peminjaman = $this->Peminjaman_model->get($id);
                foreach ($table_data as $row) {
                    $get_asset = $this->Asset_model->get_asset($row['id']);
                    if ($get_asset->status != 'Active' || !empty($get_asset->user)) {
                        $response = array(
                            'status' => 'error',
                            'message' => 'Salah satu asset sudah tidak active atau sedang dipinjam',
                        );
                        echo json_encode($response);
                        return;
                    } else {
                        $data_asset = array(
                            'user' => $get_peminjaman->created_by_name,
                            'updated_at' => date('Y-m-d H:i:s'),
                            'id_user' => $user_id,
                        );
                        $this->db->where('id', $row['id']);
                        $this->db->update('3_asset', $data_asset);

                        // Log
                        $data_log_asset = array(
                            'id_asset' => $get_asset->id,
                            'code' => $get_asset->code,
                            'name' => $get_asset->name,
                            'year_acq' => $get_asset->year_acq,
                            'status' => $get_asset->status,
                            'user' => $get_peminjaman->created_by_name,
                            'location' => $get_peminjaman->location,
                            'description' => $get_asset->description,
                            'created_at' => date('Y-m-d H:i:s'),
                            'id_user' => $user_id
                        );
                        $this->db->insert('3_log_asset', $data_log_asset);

                        $data_peminjaman_list_asset = array(
                            'peminjaman_id' => $id,
                            'asset_id' => $row['id'],
                            'created_at' => date('Y-m-d H:i:s'),
                            'created_by' => $user_id
                        );
                        $this->db->insert('peminjaman_list_asset', $data_peminjaman_list_asset);
                    }
                }
                $data = array(
                    'notes_approver' => $_POST['approver_note'],
                    'status' => $_POST['status'],
                    'updated_by' => $user_id,
                    'updated_at' => date('Y-m-d H:i:s'),
                );
                $this->db->where('id', $id);
                $this->db->update('peminjaman', $data);
            }

            $response = array(
                'status' => 'success',
                'message' => 'Data submitted successfully',
                'url' => base_url('asset/peminjaman'),
            );
            echo json_encode($response);
        } catch (Exception $e) {
            $response = array(
                'status' => 'error',
                'message' => $e->getMessage()
            );
            echo json_encode($response);
        }
    }
}
