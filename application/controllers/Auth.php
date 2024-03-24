<?php
defined('BASEPATH') OR exit('No direct script access allowed');

    include_once './vendor/autoload.php';

    use PHPMailer\PHPMailer\PHPMailer;
    use PHPMailer\PHPMailer\SMTP;
    use PHPMailer\PHPMailer\Exception;

class Auth extends CI_Controller {

	public function index()
	{
		$this->load->view('login');
	}

	public function validate()
    {
        $email = $this->input->post('email', true);
        $password = $this->input->post('password', true);

        $this->Auth_model->validate($email, $password);
    }

    public function register()
    {        
         $this->load->view('register');
    }

    public function email_check($email)
    {
      return strpos($email, '@mitrakiaraindonesia.com') !== false;
    }

    public function register_post()
    {
       function random_numeric($length) {
                $chars = '0123456789';
                return substr(str_shuffle($chars), 0, $length);
        }
      
      $name = $this->input->post('name', true);
      $email = $this->input->post('email', true);
      $password = $this->input->post('password', true);

      $this->form_validation->set_rules('email', 'email','trim|required|min_length[1]|max_length[255]|is_unique[auth.email]|valid_email|callback_email_check');
      $this->form_validation->set_rules('password', 'password','trim|required|min_length[1]|max_length[255]');
      $this->form_validation->set_rules('name', 'name','trim|required|min_length[1]|max_length[255]');

      if ($this->form_validation->run()==true)
      {

         $data = array(

                'name' => $this->input->post('name'),
                'email' => $this->input->post('email'),
                'password' => get_hash($this->input->post('password')),
                'level' => 3,
                'created_at' => date('Y-m-d H:i:s'),
                'last_update' => date('Y-m-d H:i:s'),
                'active_at' => date('Y-m-d H:i:s')
            );

            $this->db->insert('auth',$data);
            $id = $this->db->insert_id();
            $data1 = array(
                    'user_id' => $id,
                    'updated_at' => date('Y-m-d H+30:i:s'),
            );
            $this->db->insert('access',$data1);
            $this->session->set_flashdata('msg', '');

              $data['email'] = $email;
              $this->session->set_flashdata('msg', '<div class="alert alert-success">
                    <strong>Success! </strong>Proses Pendaftaran Berhasil</div>');
              redirect(base_url('auth'));
                 
              }
              else
              {
                $this->session->set_flashdata('msg', '<div class="alert alert-danger">
                  <strong>Failed! </strong>Email anda sudah terdaftar atau bukan dari MKI</div>');
                redirect('auth/register');
              }
       	
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

