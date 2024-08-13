<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Navigation extends CI_Controller {

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
        //     'get_all_asset' => $this->Navigation_model->get_all_asset_test()
        // );

        $dataMenu['list_menu'] = $this->Navigation_model->get_menu();

        $dataMenu['list_sub_menu'] = $this->Navigation_model->get_sub_menu();

        $this->load->view('qr/template/header');
        $this->load->view('qr/template/sidebar_admin', $dataMenu);
        $this->load->view('Navigation/Index');
        $this->load->view('qr/template/footer');
	}

    public function view($id)
    {
        // $id_asset = decode_id($id);
        $data = array(
            'row' => $this->Navigation_model->get_navigation($id)
        );

        $dataMenu['list_menu'] = $this->Navigation_model->get_menu();

        $dataMenu['list_sub_menu'] = $this->Navigation_model->get_sub_menu();

        // var_dump($data);
        // die;

        $this->load->view('qr/template/header');
        $this->load->view('qr/template/sidebar_admin', $dataMenu);
        $this->load->view('Navigation/detail', $data);
        $this->load->view('qr/template/footer');
    }

    public function edit($id)
    {
        // $id_asset = decode_id($id);

        $dataMenu['list_menu'] = $this->Navigation_model->get_menu();

        $dataMenu['list_sub_menu'] = $this->Navigation_model->get_sub_menu();

        $data = array(
            'row' => $this->Navigation_model->get_navigation($id),
            'roles' => $this->Navigation_model->get_navigation_roles($id),
            'parent' => $this->Navigation_model->get_navigation_parent($id)
        );

        // var_dump($data);
        // die;
        $this->load->view('qr/template/header');
        $this->load->view('qr/template/sidebar_admin', $dataMenu);
        $this->load->view('Navigation/edit',$data);
        $this->load->view('qr/template/footer');
    }

    public function delete($ids)
    {
        // $id_asset = decode_id($id);
        $array = explode(",", $ids);
        $id_user = $this->session->userdata('logged_in')['id'];
        foreach($array as $item){
            $data = array(
                'deletedtime' => date('Y-m-d H:i:s'),
                'deletedbyid' => $id_user,
                'isdeleted' => 1
            );

            $this->db->where('id', $item);
            $this->db->update('navigation', $data);

        }

        $dataMenu['list_menu'] = $this->Navigation_model->get_menu();

        $dataMenu['list_sub_menu'] = $this->Navigation_model->get_sub_menu();

        $this->load->view('qr/template/header');
        $this->load->view('qr/template/sidebar_admin', $dataMenu);
        $this->load->view('Navigation/Index');
        $this->load->view('qr/template/footer');
    }

    public function create()
    {
        $dataMenu['list_menu'] = $this->Navigation_model->get_menu();

        $dataMenu['list_sub_menu'] = $this->Navigation_model->get_sub_menu();

        $this->load->view('qr/template/header');
        $this->load->view('qr/template/sidebar_admin', $dataMenu);
        $this->load->view('Navigation/create');
        $this->load->view('qr/template/footer');
    }

    public function getDataNavNew(){
        $limit = $_REQUEST['length'];
        $start =$_REQUEST['start'];
        $order_field = $_REQUEST['order'][0]['column'];
        $order_ascdesc = $_REQUEST['order'][0]['dir'];
        $order = $_REQUEST['columns'][$order_field]['data'];

        $param1 = $_REQUEST['columns'][2]['search']['value'];

        $callback = array(
            'draw' => $_REQUEST['draw'], // Ini dari datatablenya
            'recordsTotal' => $this->Navigation_model->get_count_navigation_fix($param1),
            'recordsFiltered'=> $this->Navigation_model->get_count_navigation_fix($param1),
            'data'=> $this->Navigation_model->get_navigation_fix($start, $limit, $order, $order_ascdesc, $param1)
        );


        echo json_encode($callback);
    }

    public function getAllDataRole(){
       

        $q = $_REQUEST['q'];
        
        $page = $_REQUEST['page'];
        
        $rowPerPage = $_REQUEST['rowPerPage'];

        if(!isset($page)){
            $page = 1;
        }

        $callback = array(
            'total_count'=> $this->Navigation_model->get_count_All_Data_Role_fix($q),
            'items'=> $this->Navigation_model->get_All_Data_Role_fix($page, $rowPerPage, $q)
        );


        echo json_encode($callback);
    }

    public function getAllDataParentMenu(){
       

        $q = $_REQUEST['q'];
        
        $page = $_REQUEST['page'];
        
        $rowPerPage = $_REQUEST['rowPerPage'];

        if(!isset($page)){
            $page = 1;
        }

        $callback = array(
            'total_count'=> $this->Navigation_model->get_count_All_Data_Parent_Menu_fix($q),
            'items'=> $this->Navigation_model->get_All_Data_Parent_Menu_fix($page, $rowPerPage, $q)
        );


        echo json_encode($callback);
    }

    public function post()
    {
        $id_user = $this->session->userdata('logged_in')['id'];

        $this->form_validation->set_rules('myradio', 'Tipe Menu', 'required');
        $this->form_validation->set_rules('name', 'Name Menu', 'required');
        $this->form_validation->set_rules('route', 'Route Menu', 'required');
        $this->form_validation->set_rules('order', 'Order Menu', 'required');
        $this->form_validation->set_rules('myradio2', 'Visibilitas Menu', 'required');
        // $this->form_validation->set_rules('Roles', 'Roles Menu', 'required');

        if ($this->form_validation->run() != false && $this->input->post('Roles') != NULL) {

            $data = array(
                'Type' => $this->input->post('myradio'),
                'Name' => $this->input->post('name'),
                'Route' => $this->input->post('route'),
                'Urutan' => $this->input->post('order'),
                'IsVisible' => $this->input->post('myradio2'),
                'parentNavigationId' => $this->input->post('ParentNavigationId')?: null,
                'CreatedTime' => date('Y-m-d H:i:s'),
                'CreatedById' => $id_user,
                'IsActive' => 1,
                'IsDeleted' => "true"
            );

            $this->db->insert('navigation', $data);
            $id = $this->db->insert_id();

            foreach($this->input->post('Roles') as $item){
                $dataRole = array(
                    'MenuId' => $id,
                    'RoleId' => $item
                );
                $this->db->insert('navigation_assignment', $dataRole);
            }

            return redirect(base_url('Configuration/Navigation/index'));
        } else {
            return redirect(base_url('Configuration/Navigation/index'));
        }
    }

    public function update()
    {
        $id_user = $this->session->userdata('logged_in')['id'];

        $this->form_validation->set_rules('myradio', 'Tipe Menu', 'required');
        $this->form_validation->set_rules('name', 'Name Menu', 'required');
        $this->form_validation->set_rules('route', 'Route Menu', 'required');
        $this->form_validation->set_rules('order', 'Order Menu', 'required');
        $this->form_validation->set_rules('myradio2', 'Visibilitas Menu', 'required');
        // $this->form_validation->set_rules('Roles', 'Roles Menu', 'required');

        $id = $this->input->post('id');

        if ($this->form_validation->run() != false && $this->input->post('Roles') != NULL) {

            $data = array(
                'Type' => $this->input->post('myradio'),
                'Name' => $this->input->post('name'),
                'Route' => $this->input->post('route'),
                'Urutan' => $this->input->post('order'),
                'IsVisible' => $this->input->post('myradio2'),
                'parentNavigationId' => $this->input->post('ParentNavigationId')?: null,
                'UpdatedTime' => date('Y-m-d H:i:s'),
                'UpdatedById' => $id_user
            );

            $this->db->where('id', $id);
            $this->db->update('navigation', $data);

            $this->db->where('MenuId', $id);
            $this->db->delete('navigation_assignment');

            
            foreach($this->input->post('Roles') as $item){
                $dataRole = array(
                    'MenuId' => $id,
                    'RoleId' => $item
                );
                $this->db->insert('navigation_assignment', $dataRole);
            }
              
            return redirect(base_url('Configuration/Navigation/index'));
        } else {
            return redirect(base_url('Configuration/Navigation/index'));
        }      
    }

    private function _validate()
    {
        $response = $this->response;
        $request = $this->request;

        if ($response->status) {
        $this->_validate_index_datatable();

        if (!isset($request->search)) $request->search = '';
        if (!isset($request->active)) $request->active = null;
        if (!isset($request->statusLogin)) $request->statusLogin = null;
        }
    }

    private function _generate_sort()
    {
        $this->load->helper('datatable');

        $response = $this->response;
        $request = $this->request;

        if ($response->status) {
            $order_options = array(
                1 => 'name',
                2 => 'status'
            );

            $this->order_column = get_order_column($order_options, $request->order[0]['column']);
            $this->order_direction = get_order_direction($request->order[0]['dir']);
        }
    }

    private function _generate_filters()
    {
        $response = $this->response;
        $request = $this->request;

        if ($response->status) {
        $filters = new stdClass();

        $filters->active = $request->active;

        if ($request->statusLogin) $filters->status_login = $request->statusLogin;

        $this->filters = $filters;
        }
    }

    private function _get_data()
    {
        $response = $this->response;
        $request = $this->request;

        if ($response->status) {
            $this->data = $this->main->index(
                $request->start,
                $request->length,
                $request->search['value'],
                $this->order_column,
                $this->order_direction,
                $this->filters
            );
        }
    }

    protected function _validate_index_datatable()
    {
        $response = $this->response;
        $request = $this->request;

        // Main validation datatable
        $response = get_must_sent_message($response, !isset($request->draw), "draw");
        $response = get_must_sent_message($response, !isset($request->start), "start");
        $response = get_must_sent_message($response, !isset($request->length), "length");
        $response = get_must_sent_message($response, !isset($request->search), "search");
        $response = get_must_sent_message($response, !isset($request->order[0]['column']), "order[0]['column']");
        $response = get_must_sent_message($response, !isset($request->order[0]['dir']), "order[0]['dir']");

        if($response->status)
        {
        // Main validation datatable
        $response = must_filled($response, $request->draw, "draw");
        $response = must_filled($response, $request->start !== null, "start");
        $response = must_filled($response, $request->length, "length");
        $response = must_filled($response, $request->order[0]['column'] !== null, "order[0]['column']");
        $response = must_filled($response, $request->order[0]['dir'], "order[0]['dir']");
        }
    }

    private function _generate_return()
    {
        $response = $this->response;
        $request = $this->request;

        if ($response->status) {
            $response->draw = $request->draw;
            $response->recordsTotal = $this->main->count('', $this->filters);
            $response->recordsFiltered = $this->main->count($request->search['value'], $this->filters);
        }
    }




}
