<?php

defined('BASEPATH') or exit('No direct script access allowed');

class Auth_model extends CI_Model
{

    public function validate($email, $password)
    {
        $row = $this->db->select('a.id, a.level, a.name,a.email, a.password, a.dept_id as dept')->join('access as b', 'b.user_id = a.id', 'left')->where(['a.email' => $email, 'a.deleted_at' => null, 'a.active_at !=' => null])->get('auth as a');

        if ($row->num_rows() > 0) {
            $email_m = $row->row()->email;
            $name = $row->row()->name;
            $password_m = $row->row()->password;
            $level = $row->row()->level;
            $id = $row->row()->id;
            $dept = $row->row()->dept;

            if ($email == $email_m) {
                if (hash_verified($password, $password_m)) {

                    $sesdata = array(
                        'logged_in' => TRUE,
                        'level' => $level,
                        'name' => $name,
                        'email' => $email,
                        'id' => $id,
                        'dept' => $dept,
                        'pass' => $password_m
                    );

                    $this->session->set_userdata('logged_in', $sesdata);
                    $this->session->set_userdata([
                        'level' => $level,
                        'name' => $name,
                        'email' => $email,
                        'id' => $id,
                        'dept' => $dept,
                        'pass' => $password_m
                    ]);

                    switch ($level) {
                        case 1:
                            redirect(base_url('superadmin/manage'), 'refresh');
                            break;
                        case 2:
                            redirect(base_url('portal'), 'refresh');
                            break;
                        case 3:
                            redirect(base_url('portal'), 'refresh');
                            break;
                        case 4:
                            redirect(base_url('portal'), 'refresh');
                            break;


                        default:
                            redirect(base_url('auth'), 'refresh');
                            break;
                    }
                } else {
                    $this->session->set_flashdata('msg', '<div class="alert alert-danger">
    <strong>Failed!</strong> Kata Sandi Salah.....</div>');
                    redirect(base_url('auth'));
                }
            } else {
                $this->session->set_flashdata('msg', '<div class="alert alert-danger">
    <strong>Failed!</strong> Email Belum Aktif.....</div>');
                redirect(base_url('auth'));
            }
        } else {
            $this->session->set_flashdata('msg', '<div class="alert alert-danger">
    <strong>Failed!</strong> User Tidak ditemukan..... </div>');
            redirect(base_url('auth'));
        }
    }

    public function register()
    {

        $data = array(
            'name' => $this->input->post('name'),
            'email' => $this->input->post('email'),
            'password' => get_hash($this->input->post('password')),
            'level' => 2,
            'created_at' => date('Y-m-d H:i:s'),
            'last_updated' => date('Y-m-d H:i:s')
        );

        $this->db->insert('users', $data);
        $this->session->set_flashdata('msg', '');
        return redirect(base_url('auth'));
    }

    //validasi assets
    public function validasi_asset($email, $dept)
    {
        $row = $this->db->select('a.id, a.level, a.name,a.email, a.password, a.dept_id as dept, b.assets_menu')->join('access as b', 'b.user_id=a.id', 'left')->where(['a.email' => $email, 'a.deleted_at' => null, 'a.active_at !=' => null])->get('auth as a');

        if ($row->num_rows() > 0) {
            $email_m = $row->row()->email;
            $name = $row->row()->name;
            $level = $row->row()->level;
            $id = $row->row()->id;
            $dept_m = $row->row()->dept;
            $assets_menu = $row->row()->assets_menu;

            if ($email == $email_m) {
                if (($dept == $dept_m)) {

                    $sesdata = array(
                        'logged_in' => TRUE,
                        'level' => $level,
                        'name' => $name,
                        'email' => $email,
                        'dept' => $dept,
                        'id' => $id,
                    );

                    $this->session->set_userdata('logged_in', $sesdata);

                    if ($assets_menu != NULL) {
                        $case = 1;
                    } else {
                        $case = 2;
                    }

                    switch ($case) {
                        case 1:
                            redirect(base_url('qr/dashboard'), 'refresh');
                            break;

                        case 2:
                            redirect(base_url('qr/user/asset'), 'refresh');
                            break;

                        default:
                            redirect(base_url('auth'), 'refresh');
                            break;
                    }
                } else {
                    $this->session->set_flashdata('msg', '<div class="alert alert-danger">
                         <strong>Failed!</strong> Kata Sandi Salah.....</div>');
                    redirect(base_url('auth'));
                }
            } else {
                $this->session->set_flashdata('msg', '<div class="alert alert-danger">
                         <strong>Failed!</strong> Email Belum Aktif.....</div>');
                redirect(base_url('auth'));
            }
        } else {
            $this->session->set_flashdata('msg', '<div class="alert alert-danger">
                        <strong>Failed!</strong> User Tidak ditemukan..... </div>');
            redirect(base_url('auth'));
        }
    }
}

/* End of file Auth_model.php */
