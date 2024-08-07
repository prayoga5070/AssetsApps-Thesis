<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Portal extends CI_Controller {

	/**
	 * Index Page for this controller.
	 *
	 * Maps to the following URL
	 * 		http://example.com/index.php/welcome
	 *	- or -
	 * 		http://example.com/index.php/welcome/index
	 *	- or -
	 * Since this controller is set as the default controller in
	 * config/routes.php, it's displayed at http://example.com/
	 *
	 * So any other public methods not prefixed with an underscore will
	 * map to /index.php/welcome/<method_name>
	 * @see https://codeigniter.com/userguide3/general/urls.html
	 */


	public function index()
	{ 
		if ($this->session->userdata('logged_in') != true && $this->session->userdata('level') != 1 ) {
	        redirect(base_url('auth'));
	    }
		
 	    $this->load->view('user/header');
		$this->load->view('template_admin/style_landing');
		$this->load->view('user/index');
		$this->load->view('user/footer');
		
	}

	public function error()
	{ 
		if ($this->session->userdata('logged_in') != true && $this->session->userdata('level') != 1 ) {
	        redirect(base_url('auth'));
	    }
	    
		$this->load->view('errors/index');
	}


	public function error_access()
	{ 
		if ($this->session->userdata('logged_in') != true && $this->session->userdata('level') != 1 ) {
	        redirect(base_url('auth'));
	    }
	    
		$this->load->view('errors/e_access');
	}

}
