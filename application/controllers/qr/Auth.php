<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Auth extends CI_Controller {

	public function index()
	{
		$this->load->view('login');
	}

  public function validate()
  {
    $email = $this->input->post('email', true);
    $dept = $this->input->post('dept', true);
    $this->Auth_model->validasi_asset($email, $dept);
  }

  public function logout()
  {
    $this->session->unset_userdata('logged_in');
    $this->session->unset_userdata('level');
    $this->session->unset_userdata('email');
    $this->session->sess_destroy();
    redirect(base_url(), 'refresh');
  }

}
