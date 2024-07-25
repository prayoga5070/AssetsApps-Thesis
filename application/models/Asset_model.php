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

  public function asset_code($code)
  {
    $result = $this->db->select('a.id, a.code, a.name , a.qrcode, a.year_acq, a.status, a.user, a.location, a.description, b.file_path, b.file_name')->join('3_file_asset as b', 'a.id=b.id_asset', 'left')->where(['a.deleted_at' => NULL, 'a.code' => $code])->get('3_asset as a');

    $data = $result->row();
    return $data;
  }

  public function get_all_asset_category()
  {
    $result = $this->db->select('a.id, a.name, a.id_department')->where(['a.deleted_at' => NULL])->get('3_category_asset as a');

    $data = $result->result();
    return $data;
  }

  public function get_all_active_asset()
  {
    $result = $this->db->select('a.id, a.code, a.name , a.qrcode, a.year_acq, a.status, a.user, a.location, a.description,a.created_at')->where(['a.status' => 'Active'])->order_by('a.created_at', 'DESC')->get('3_asset as a');

    $data = $result->result();
    return $data;
  }

  public function get_all_active_asset_peminjaman()
  {
    $result = $this->db->select('a.id, a.code, a.name, a.qrcode, a.year_acq, a.status, a.user, a.location, a.description, a.created_at, fa.id as file_id, fa.file_name, fa.file_path, ca.name as category_name')
      ->from('3_asset as a')
      ->join('3_file_asset as fa', 'fa.id_asset = a.id', 'left')
      ->join('3_category_asset as ca', 'ca.id = a.id_category', 'left')
      ->where(['a.status' => 'Active'])
      ->group_start()
      ->where('a.user IS NULL')
      ->or_where('a.user', '')
      ->group_end()
      ->order_by('a.created_at', 'DESC')
      ->get();

    $data = $result->result();
    return $data;
  }
}

/* End of file Stock_model.php */
