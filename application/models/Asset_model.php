<?php

defined('BASEPATH') or exit('No direct script access allowed');

class Asset_model extends CI_Model
{

    public function get_all_asset()
    {
      $result = $this->db->select('a.id, a.code, a.name , a.qrcode, a.year_acq, a.status, a.user, a.location, a.description,a.created_at')->where(['a.deleted_at' => NULL])->order_by('a.created_at', 'DESC')->get('3_asset as a');

      $data = $result->result();
      return $data;   
    }

    public function get_asset($id)
    {
      $result = $this->db->select('a.id, a.code, a.name , a.qrcode, a.year_acq, a.status, a.user, a.location, a.description, b.file_path, b.file_name')->join('3_file_asset as b', 'a.id=b.id_asset', 'left')->where(['a.deleted_at' => NULL, 'a.id' => $id])->get('3_asset as a');

      $data = $result->row();
      return $data;   
    }

    public function log_asset($id_asset)
    {
      $result = $this->db->select('a.id, a.code, a.name, a.year_acq, a.status, a.user, a.location, a.description, a.created_at')->where(['a.id_asset' => $id_asset])->order_by('a.created_at', 'DESC')->get('3_log_asset as a');

      $data = $result->result();
      return $data;   
    }

    public function asset_qr($qr)
    {
      $result = $this->db->select('a.id, a.code, a.name , a.qrcode, a.year_acq, a.status, a.user, a.location, a.description, b.file_path, b.file_name')->join('3_file_asset as b', 'a.id=b.id_asset', 'left')->where(['a.deleted_at' => NULL, 'a.qrcode' => $qr])->get('3_asset as a');

      $data = $result->row();
      return $data;   
    }

    

}

/* End of file Stock_model.php */
