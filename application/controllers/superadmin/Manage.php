<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Manage extends CI_Controller {

	public function __construct()
	{
		parent::__construct();
		//Do your magic here
		if ($this->session->userdata('logged_in') != true && $this->session->userdata('level') != 1 ) {
			redirect(base_url('auth'));
		}
	}
	
	public function index()
	{
        $this->load->view('template_admin/header_landing');
		$this->load->view('template_admin/style_landing');
		$this->load->view('template_admin/menu_landing');
		$this->load->view('superadmin/index');
	}

	public function dashboard(){
		$this->load->view('template_admin/header');
		$this->load->view('template_admin/sidebar_super');
		$this->load->view('superadmin/dashboard');
		$this->load->view('template_admin/footer');
	}

	public function profile(){

		$data = array(
            'get_user' => $this->Users_model->get_users()
        );
      
		$this->load->view('template_admin/header');
		$this->load->view('template_admin/sidebar_super');
		$this->load->view('superadmin/profile',$data);
		$this->load->view('template_admin/footer');
	}

	public function access(){
		$data = array(
            'get_access' => $this->Users_model->get_access()
        );

		$this->load->view('template_admin/header');
		$this->load->view('template_admin/sidebar_super');
		$this->load->view('superadmin/access',$data);
		$this->load->view('template_admin/footer');
	}

	public function edit_access($id){
		$data = array(
            'get_access' => $this->Users_model->get_access_id($id)
        );

		$this->load->view('template_admin/header');
		$this->load->view('template_admin/sidebar_super');
		$this->load->view('superadmin/edd_access',$data);
		$this->load->view('template_admin/footer');

	}

	public function update_access(){
		$id = $this->input->post('id');
		$data = array(
                      'booking_menu' =>$this->input->post('booking'),
                      'helpdesk_menu'=>$this->input->post('helpdesk'),
                      'iso_menu' => $this->input->post('iso'),
                      'ehs_menu' => $this->input->post('ehs'),
                      'assets_menu' => $this->input->post('assets'),
                      'dash_a' => $this->input->post('dash_a'),
                      'dash_b' => $this->input->post('dash_b'),
                      'dash_c' => $this->input->post('dash_c'),
                      'dash_d' => $this->input->post('dash_d'),
                      'earsip' => $this->input->post('earsip'),
                      'updated_at' => date('Y-m-d H:i:s'),
                  );
		$this->db->where('user_id',$id);
        $this->db->update('access',$data);
        return redirect(base_url('superadmin/manage/access'));

	}

	public function adduser(){

		$this->load->view('template_admin/header');
		$this->load->view('template_admin/sidebar_super');
		$this->load->view('superadmin/add_user');
		$this->load->view('template_admin/footer');
	}

	public function addaccess(){
		$data = array(
            'get_access' => $this->Users_model->get_access()
        );

		$this->load->view('template_admin/header');
		$this->load->view('template_admin/sidebar_super');
		$this->load->view('superadmin/add_access',$data);
		$this->load->view('template_admin/footer');
	}

	public function post_user(){
		$data = array(
					  'name' =>$this->input->post('name'),
                      'email'=>$this->input->post('email'),
                      'password'=>get_hash($this->input->post('password')),
                      'level' => $this->input->post('level'),
                      'created_at' => date('Y-m-d H:i:s'),
                      'last_update' => date('Y-m-d H:i:s'),
                      'deleted_at' => NULL,
                      'active_at' => date('Y-m-d H:i:s')
                  );
        $this->db->insert('auth',$data);
        $id = $this->db->insert_id();
        $data1 = array(
        			  'user_id' => $id,
        			  'booking_menu' => 1,
                      'helpdesk_menu'=>1,
                      'iso_menu' => 1,
                      'ehs_menu' => 1,
                      'updated_at' => date('Y-m-d H:i:s'),
                      'deleted_at' => NULL,
                  );
        $this->db->insert('access',$data1);
        return redirect(base_url('superadmin/manage/profile'));

	}

	public function post_access(){
		$id = $this->input->post('id');
		$data = array(
					  'booking_menu' =>$this->input->post('booking'),
                      'helpdesk_menu'=>$this->input->post('helpdesk'),
                      'iso_menu' => $this->input->post('iso'),
                      'ehs_menu' => $this->input->post('ehs'),
                      'assets_menu' => $this->input->post('assets'),
                      'dash_a' => $this->input->post('dash_a'),
                      'dash_b' => $this->input->post('dash_b'),
                      'dash_c' => $this->input->post('dash_c'),
                      'dash_d' => $this->input->post('dash_d'),
                      'updated_at' => date('Y-m-d H:i:s'),
                      'deleted_at' => NULL,
                  );
		$this->db->where('id',$id);
        $this->db->update('access',$data);
        return redirect(base_url('superadmin/manage/access'));

	}

	public function edit_prf($id){
		$result = $this->db->select('a.id,a.name,a.email, a.password,a.level,a.created_at,a.last_update,a.deleted_at,a.active_at')
                    ->where([
                    	'a.id' => $id,
                        'a.deleted_at' => null,
                    ])->get('auth' . ' a', 1)->row();

        $data['row'] = $result;
        $data['get_dept'] = $this->Users_model->get_dept();
		$this->load->view('template_admin/header');
		$this->load->view('template_admin/sidebar_super');
		$this->load->view('superadmin/edd_prf',$data);
		$this->load->view('template_admin/footer');
	}

	public function active($id){
	$data1= array(
                  'active_at' => date('Y-m-d H:i:s'),
                  'last_update' => date('Y-m-d H:i:s'),
              );
	$this->db->where('id',$id);
    $this->db->update('auth',$data1);
    return redirect(base_url('superadmin/manage/profile'));

	}

	public function deactive($id){
	$data1= array(
                  'active_at' => null,
                  'last_update' => date('Y-m-d H:i:s'),
              );
	$this->db->where('id',$id);
    $this->db->update('auth',$data1);
    return redirect(base_url('superadmin/manage/profile'));

	}

	public function update_prf(){
		$id = $this->input->post('id');
		$data1= array(
					  'name' =>$this->input->post('name'),
                      'email'=>$this->input->post('email'),
                      'level' => $this->input->post('level'),
                      'dept_id' => $this->input->post('dept'),
                      'last_update' => date('Y-m-d H:i:s'),
                  );
		$this->db->where('id',$id);
        $this->db->update('auth',$data1);
        return redirect(base_url('superadmin/manage/profile'));
	}

	public function delete_prf($id){
		$data1= array(
										'deleted_at' => date('Y-m-d H:i:s'),
										'active_at' => NULL,
                  );
		$this->db->where('id',$id);
    $this->db->update('auth',$data1);
    return redirect(base_url('superadmin/manage/profile'));

	}

	public function update_pw()
	{
		$id = $this->input->post('id');
		$row = $this->db->select('id, level, email, password')->where(['id' => $id, 'deleted_at' => null, 'active_at !=' => null])->get('auth');

    	if ($row->num_rows() > 0) {
            	$password_m = $row->row()->password;
            	$pw_old = $this->input->post('old');
            	$pw_new = $this->input->post('new');

                if (hash_verified($pw_old, $password_m)) {

                        $data1 = array(
                                'password' => get_hash($pw_new),
                            );
                        $this->db->where('id',$id);
				        $this->db->update('auth',$data1);
				        $this->session->sess_destroy();
				        return redirect(base_url('superadmin/manage/profile'));
            
                } else {
                	echo "password salah";
                    redirect(base_url('superadmin/manage/profile'));
                }
            } else {
            	echo "data tidak sesuai";
                redirect(base_url('superadmin/manage/profile'));
            } 
	}

	public function slider(){
		$data = array(
            'get_slider' => $this->Content_model->get_slider()
        );

		$this->load->view('template_admin/header');
		$this->load->view('template_admin/sidebar_super');
		$this->load->view('superadmin/slider',$data);
		$this->load->view('template_admin/footer');
	}

	public function abouts(){
		$data = array(
            'get_slider' => $this->content_models->get_slider()
        );

		$this->load->view('template_admin/header');
		$this->load->view('template_admin/sidebar_super');
		$this->load->view('superadmin/abouts');
		$this->load->view('template_admin/footer');
	}

	public function features(){
		$data = array(
            'get_slider' => $this->content_models->get_slider()
        );

		$this->load->view('template_admin/header');
		$this->load->view('template_admin/sidebar_super');
		$this->load->view('superadmin/add_user');
		$this->load->view('template_admin/footer');
	}

	public function teams(){
		$data = array(
            'get_slider' => $this->content_models->get_slider()
        );

		$this->load->view('template_admin/header');
		$this->load->view('template_admin/sidebar_super');
		$this->load->view('superadmin/add_user');
		$this->load->view('template_admin/footer');
	}

	public function contact(){
		$data = array(
            'get_slider' => $this->content_models->get_slider()
        );
		$this->load->view('template_admin/header');
		$this->load->view('template_admin/sidebar_super');
		$this->load->view('superadmin/add_user');
		$this->load->view('template_admin/footer');
	}
 
 public function sooutstanding()
	{
		if ($this->session->userdata('logged_in')['dept'] == 12 || $this->session->userdata('logged_in')['dept'] == 8 || $this->session->userdata('logged_in')['dept'] == 3 || $this->session->userdata('logged_in')['dept'] == 1) {
        // Menerima data dari form
        $startDate = $this->input->post('startDate');
        $endDate = $this->input->post('endDate');

        // Lakukan operasi atau proses sesuai kebutuhan dengan data yang diterima
        // ...

        // Kirim data kembali ke view jika diperlukan
        $data['startDate'] = $startDate;
        $data['endDate'] = $endDate;
        
        $this->load->view('sooutstanding/getdataapimki', $data);
			// $this->load->view('sooutstanding/getdataapimki');
			$this->load->view('sooutstanding/joinheaderdetail');
			$this->load->view('sooutstanding/sooutstanding');
			// $this->load->view('sooutstanding/sooutstandingheader');
			
			
		}else {
			redirect(base_url('portal/error_access'));
		}
	}
	
}
