<?php
defined('BASEPATH') or exit('No direct script access allowed');
require 'vendor/autoload.php';

use PhpOffice\PhpSpreadsheet\Spreadsheet;
use PhpOffice\PhpSpreadsheet\Style\Alignment;
use PhpOffice\PhpSpreadsheet\Writer\Xlsx;

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
            // return redirect(base_url('qr/user/asset'));
        }
    }

    public function setup()
    {
        $data = array(
            'assetCategories' => $this->Asset_model->get_all_asset_category()
        );
// var_dump($data);exit;
        $this->load->view('qr/template/header');
        $dataMenu['list_menu'] = $this->Navigation_model->get_menu();
        $dataMenu['list_sub_menu'] = $this->Navigation_model->get_sub_menu();
    
        $this->load->view('qr/template/sidebar_admin', $dataMenu);
        $this->load->view('qr/admin/asset',$data);
        $this->load->view('qr/template/footer');
    }

    public function add()
    {
        $this->load->view('qr/template/header');
        $dataMenu['list_menu'] = $this->Navigation_model->get_menu();
        $dataMenu['list_sub_menu'] = $this->Navigation_model->get_sub_menu();
        $data = array(
            'assetCategories' => $this->Asset_model->get_all_asset_category()
        );
        $this->load->view('qr/template/sidebar_admin', $dataMenu);
        $this->load->view('qr/admin/add',$data);
        $this->load->view('qr/template/footer');
    }

    public function edit($id)
    {
        $id_asset = decode_id($id);
        $data = array(
            'row' => $this->Asset_model->get_asset($id_asset),
            'assetCategories' => $this->Asset_model->get_all_asset_category()
        );
        $this->load->view('qr/template/header');
        $dataMenu['list_menu'] = $this->Navigation_model->get_menu();
        $dataMenu['list_sub_menu'] = $this->Navigation_model->get_sub_menu();
        $this->load->view('qr/template/sidebar_admin', $dataMenu);
        $this->load->view('qr/admin/edit', $data);
        $this->load->view('qr/template/footer');
    }

    public function qr_code($qrcode)
    {
        // Edit : Params with link QR
        // get path assets
        $path=base_url('qr/asset/scan_detail');
        // $path = $this->db->select('link')->where(['code' => 'scan_link'])->get('3_asset_path')->row()->link;
        $param = $path . "/" . $qrcode;
        qrcode::png(
            $param,
            $outfile = false,
            $level = QR_ECLEVEL_H,
            $size = 2,
            $margin = 1
        );
    }
    function random_alphanumeric_string($length)
    {
        $chars = '0123456789ABCDEFGHIJKLMNOPQRSTUVWXYZabcdefghijklmnopqrstuvwxyz';
        return substr(str_shuffle($chars), 0, $length);
    }
    public function post()
    {

        $this->form_validation->set_rules('code', 'Code Asset', 'required');
        $this->form_validation->set_rules('name', 'Name Asset', 'required');
        $this->form_validation->set_rules('year_acq', 'Tahun Akuisisi', 'required');
        $this->form_validation->set_rules('status', 'Status', 'required');
        // $this->form_validation->set_rules('user', 'User', 'required');
        // $this->form_validation->set_rules('location', 'Location', 'required');
        $this->form_validation->set_rules('qr_code', 'QR Code', 'is_unique[aset.qrcode]');

        if ($this->form_validation->run() != false) {
            //Setup Generate QRCode

            $random = $this->random_alphanumeric_string(5);
            $id_user = $this->session->userdata('logged_in')['id'];

            $data = array(
                'code' => $this->input->post('code'),
                'name' => $this->input->post('name'),
                'id_category' => $this->input->post('id_category'),
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
            $dataMenu['list_menu'] = $this->Navigation_model->get_menu();
            $dataMenu['list_sub_menu'] = $this->Navigation_model->get_sub_menu();
            $this->load->view('qr/template/sidebar_admin', $dataMenu);
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
            $row[] =  $list['kategoriName'];
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
            if ($_SESSION["logged_in"]["dept"] == 6) {
                $button .= '<a href=" ' . base_url('qr/asset/delete/' . encode_id($list['id'])) . '"
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
            $row[] =  $list['kategoriName'];
            $row[] =  $list['name'];
            $row[] =  $list['status'];
            $row[] =  $list['user'];

            $button = '';
            $button .= '  <div class="btn-group btn-group-sm">
            <a href="' . base_url('qr/report/log_detail/' . encode_id($list['id'])) . '" 
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
            $row[] =  $list['kategoriName'];
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
            $row[] =  $list['kategoriName'];
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

    public function exportToExcel()
    {
        $data = $this->Asset_model->GetData($_REQUEST);

        $spreadsheet = new Spreadsheet();
        $sheet = $spreadsheet->getActiveSheet();

        $sheet->setCellValue('A1', 'Code');
        $sheet->setCellValue('B1', 'Name');
        $sheet->setCellValue('C1', 'Status');
        $sheet->setCellValue('D1', 'User');
        $sheet->setCellValue('E1', 'Location');

        $row = 2;
        foreach ($data['data'] as $item) {
            $sheet->setCellValue('A' . $row, $item['code']);
            $sheet->setCellValue('B' . $row, $item['name']);
            $sheet->setCellValue('C' . $row, $item['status']);
            $sheet->setCellValue('D' . $row, $item['user']);
            $sheet->setCellValue('E' . $row, $item['location']);
            $row++;
        }

        $filename = 'data_export_' . date('Ymd_His') . '.xlsx';
        header('Content-Type: application/vnd.openxmlformats-officedocument.spreadsheetml.sheet');
        header('Content-Disposition: attachment;filename="' . $filename . '"');
        header('Cache-Control: max-age=0');
        
        $writer = new Xlsx($spreadsheet);
        $writer->save('php://output');
        exit;
    }


    public function update()
    {
        $this->form_validation->set_rules('code', 'Code Asset', 'required');
        $this->form_validation->set_rules('name', 'Name Asset', 'required');
        $this->form_validation->set_rules('year_acq', 'Tahun Akuisisi', 'required');
        $this->form_validation->set_rules('status', 'Status', 'required');
        // $this->form_validation->set_rules('user', 'User', 'required');
        // $this->form_validation->set_rules('location', 'Location', 'required');

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
            $dataMenu['list_menu'] = $this->Navigation_model->get_menu();
            $dataMenu['list_sub_menu'] = $this->Navigation_model->get_sub_menu();
            $this->load->view('qr/template/sidebar_admin', $dataMenu);
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
        $dataMenu['list_menu'] = $this->Navigation_model->get_menu();
        $dataMenu['list_sub_menu'] = $this->Navigation_model->get_sub_menu();
        $this->load->view('qr/template/sidebar_admin', $dataMenu);
        $this->load->view('qr/admin/detail', $data);
        $this->load->view('qr/template/footer');
    }


    public function scan()
    {
        $this->load->view('qr/template/header');
        $dataMenu['list_menu'] = $this->Navigation_model->get_menu();
        $dataMenu['list_sub_menu'] = $this->Navigation_model->get_sub_menu();
        $this->load->view('qr/template/sidebar_admin', $dataMenu);
        $this->load->view('qr/admin/scan');
        $this->load->view('qr/template/footer');
    }

    public function scan_detail($id)
    {
        $data = array(
            'row' => $this->Asset_model->asset_qr($id)
        );
        $this->load->view('qr/template/header');
        $dataMenu['list_menu'] = $this->Navigation_model->get_menu();
        $dataMenu['list_sub_menu'] = $this->Navigation_model->get_sub_menu();
        $this->load->view('qr/template/sidebar_admin', $dataMenu);
        $this->load->view('qr/admin/view', $data);
        $this->load->view('qr/template/footer');
    }
    public function downloadTemplate()
    {
        $spreadsheet = new Spreadsheet();
        $fileName = "templateAsset.xlsx";
        $writer = new Xlsx($spreadsheet);
        $header = [
            array(
                "Kode Asset",
                "Kategori",
                "Nama Asset",
                "Year Acquisation",
                "Status",
                "User",
                "Location",
                "Description",
            )
        ];
        $activeWorksheet = $spreadsheet->getActiveSheet();
        $activeWorksheet->fromArray($header, NULL, 'A1');
        header('Content-Type: application/vnd.openxmlformats-officedocument.spreadsheetml.sheet');
        header('Content-Disposition: attachment; filename="' . urlencode($fileName) . '"');
        $writer->save('php://output');
    }
    public function uploadFotos()
    {
        $assetModel = new Asset_model();
        $originfile = null;
        $data = [];
        $countFile = 0;
        $notFounded = "";
        try {
            if ($_FILES) {

                $originfile = $_FILES['fileFoto'];

                $path = 'uploads/assetsqr/';

                if (isset($originfile) && $originfile['name'][0] !== '') {
                    if (is_array($originfile)) {
                        for ($i = 0; $i < sizeOf($originfile['name']); $i++) {
                            $originFileName = str_replace(" ", "_", $originfile['name'][$i]);
                            $filenameList = (explode(".", $originfile['name'][$i]));
                            $filesize = $originfile['size'][$i];
                            $tempFile = $originfile['tmp_name'][$i] . '/' . $originfile['name'][$i];

                            $dataDetail = $assetModel->asset_code($filenameList[0]);
                            if (isset($dataDetail)) {
                                $year = date("Y");
                                $month = date("m");
                                $date = date("d");
                                $hour = date("H");
                                $minutes = date("i");
                                $second = date("s");
                                $newName = $date . "" . $month . "" . $year . "" . $hour . "" . $minutes . "" . $second . "_" . $originFileName;
                                $dirFile = $path . $year . "-" . $month . "-" . $date  . "/";
                                if (!file_exists($dirFile)) {
                                    mkdir($dirFile, 0777, true);
                                }
                                move_uploaded_file($originfile['tmp_name'][$i], $dirFile . $newName);
                                // $filepathSave=
                                $data1 = [
                                    'id_asset' => $dataDetail->id,
                                    'file_path' => trim($dirFile, "/"),
                                    'file_name' => $newName,
                                    'created_at' => date('Y-m-d H:i:s'),
                                    'updated_at' => date('Y-m-d H:i:s'),
                                    'deleted_at' => NULL,
                                ];
                                $this->db->insert('3_file_asset', $data1);
                                $countFile++;
                            } else {
                                $notFounded .= "File Foto dengan Kode Asset " . $filenameList[0] . " Tidak Ditemukan";
                                $notFounded .= '<br/>';
                            }
                        }
                    }
                }
            }
        } catch (\Exception $th) {
            $notFounded .= "Upload Failed :" . $th;
            $notFounded .= '<br/>';
            var_dump($notFounded);
            exit;
        }
        //result untuk notif

        $data['notif'] = 'Upload ' . $countFile . ' File Success';
        if (isset($notFounded)) {
            $data['notif'] .= '<br/>';
            $data['notif'] .= '<br/>';
            $data['notif'] .= $notFounded;
        }
        $this->load->view('qr/template/header');
        $dataMenu['list_menu'] = $this->Navigation_model->get_menu();
        $dataMenu['list_sub_menu'] = $this->Navigation_model->get_sub_menu();
        $this->load->view('qr/template/sidebar_admin', $dataMenu);
        $this->load->view('qr/admin/asset', $data);
        $this->load->view('qr/template/footer');
    }
    public function uploadExcel()
    {
        $assetModel = new Asset_model();
        $counterSaved = 0;
        $notFounded = "";
        $originfile = null;
        if ($_FILES) {
            $originfile = $_FILES['fileExcel'];
        }
        $header = [
            array(
                "Kode Asset",
                "Kategori",
                "Nama Asset",
                "Year Acquisation",
                "Status",
                "User",
                "Location",
                "Description",
            )
        ];
        if (isset($originfile) && $originfile['name'] !== '') {
            if (is_array($originfile)) {
                $allowed_mime_type_arr = array(
                    'application/vnd.ms-excel', // For file .xls
                    'application/vnd.openxmlformats-officedocument.spreadsheetml.sheet', // For file .xlsx
                    'text/csv' // For file .csv
                );
                $counter = 0;

                if (isset($originfile['name']) && $originfile['name'] != "") {
                    if (in_array($originfile['type'], $allowed_mime_type_arr, true) == true) {
                        $arr_file = explode('.', $originfile['name']);
                        $extension = end($arr_file);
                        $reader = new \PhpOffice\PhpSpreadsheet\Reader\Xlsx();
                        $spreadsheet = $reader->load($originfile['tmp_name']);
                        $sheetData = $spreadsheet->getActiveSheet()->toArray();
                        if ($sheetData[0] == $header[0]) {
                            foreach ($sheetData as $dataloop) {
                                $counter++;
                                if ($counter == 1) {
                                    continue;
                                }
                                if ((!isset($dataloop[0])
                                    || $dataloop[0] == '')) {
                                    $notFounded .= "Kode Asset In Row " . ($counter - 1) . " Tidak Terisi";
                                    $notFounded .= "<br/>";
                                    continue;
                                }
                                if ((!isset($dataloop[1])
                                    || $dataloop[1] == '')) {
                                    $notFounded .= "Katgori Asset In Row " . ($counter - 1) . " Tidak Terisi";
                                    $notFounded .= "<br/>";
                                    continue;
                                }
                                $dataKategori = $assetModel->get_one_category($dataloop[1]);
                                // var_dump($dataloop[1]);
                                // var_dump($dataKategori);exit;
                                if (!isset($dataKategori)) {
                                    $notFounded .= "Kategori Asset " . $dataloop[1] . " In Row " . ($counter - 1) . " Already Exist";
                                    $notFounded .= "<br/>";
                                    continue;
                                }
                                $dataDetail = $assetModel->asset_code($dataloop[0]);
                                if (isset($dataDetail)) {
                                    $notFounded .= "Kode Asset " . $dataloop[0] . " In Row " . ($counter - 1) . " Already Exist";
                                    $notFounded .= "<br/>";
                                    continue;
                                }
                                if ((isset($dataloop[5])
                                    && $dataloop[6] != '')) {
                                    if ((!isset($dataloop[6]))) {
                                        $notFounded .= "Kode Asset " . $dataloop[0] . " In Row " . ($counter - 1) . " location tidak terisi";
                                        $notFounded .= "<br/>";
                                        continue;
                                    }
                                }
                                if ((isset($dataloop[6]) && $dataloop[5] != '')) {
                                    if (!isset($dataloop[5])) {
                                        $notFounded .= "Kode Asset " . $dataloop[0] . " In Row " . ($counter - 1) . " User tidak terisi";
                                        $notFounded .= "<br/>";
                                        continue;
                                    }
                                }
                                $random = $this->random_alphanumeric_string(5);
                                $id_user = $this->session->userdata('logged_in')['id'];
                                $data = array(
                                    'code' => $dataloop[0],
                                    'id_category'=>$dataKategori[0]->id,
                                    'name' => $dataloop[2],
                                    'year_acq' => $dataloop[3],
                                    'status' => $dataloop[4],
                                    'user' => $dataloop[5],
                                    'location' => $dataloop[6],
                                    'qrcode' => $random,
                                    'description' => $dataloop[7],
                                    'created_at' => date('Y-m-d H:i:s'),
                                    'updated_at' => date('Y-m-d H:i:s'),
                                    'deleted_at' => NULL,
                                    'id_user' => $id_user
                                );
                                $this->db->insert('3_asset', $data);
                                $counterSaved++;
                            }
                        } else {
                            $notFounded .= "Invalid Format Excel";
                        }
                    } else {
                        $notFounded .= "Invalid Format Excel";
                    }
                } else {
                }
            }
        }
        $data = [];
        $data['notif'] =  $counterSaved . ' Data File Success ';
        if (isset($notFounded)) {
            $data['notif'] .= '<br/>';
            $data['notif'] .= '<br/>';
            $data['notif'] .= $notFounded;
        }
        $this->load->view('qr/template/header');
        $dataMenu['list_menu'] = $this->Navigation_model->get_menu();
        $dataMenu['list_sub_menu'] = $this->Navigation_model->get_sub_menu();
        $this->load->view('qr/template/sidebar_admin', $dataMenu);
        $this->load->view('qr/admin/asset', $data);
        $this->load->view('qr/template/footer');
    }
    public function exportToExcel()
    {
        $assetModel = new Asset_model();
        $_REQUEST['length'] = -1;
        $data = $assetModel->GetData($_REQUEST);

        $spreadsheet = new Spreadsheet();
        $sheet = $spreadsheet->getActiveSheet();

        $sheet->setCellValue('A1', 'Code');
        $sheet->setCellValue('B1', 'Kategori Name');
        $sheet->setCellValue('C1', 'Name');
        $sheet->setCellValue('D1', 'Status');
        $sheet->setCellValue('E1', 'User');
        $sheet->setCellValue('F1', 'Location');

        $row = 2;
        foreach ($data['data'] as $item) {
            $sheet->setCellValue('A' . $row, $item['code']);
            $sheet->setCellValue('B' . $row, $item['kategoriName']);
            $sheet->setCellValue('C' . $row, $item['name']);
            $sheet->setCellValue('D' . $row, $item['status']);
            $sheet->setCellValue('E' . $row, $item['user']);
            $sheet->setCellValue('F' . $row, $item['location']);
            $row++;
        }

        $filename = 'data_export_' . date('Ymd_His') . '.xlsx';
        header('Content-Type: application/vnd.openxmlformats-officedocument.spreadsheetml.sheet');
        header('Content-Disposition: attachment;filename="' . $filename . '"');
        header('Cache-Control: max-age=0');

        $writer = new Xlsx($spreadsheet);
        $writer->save('php://output');
        exit;
    }
}
