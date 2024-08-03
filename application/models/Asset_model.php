<?php

defined('BASEPATH') or exit('No direct script access allowed');

class Asset_model extends CI_Model
{

  public function get_all_asset()
  {
    $result = $this->db->select('a.id, a.code, a.name , a.qrcode, a.year_acq, a.status, a.user,
     a.location, a.description,a.created_at,a.id_category,c.name as kategoriName')
    ->join('3_category_asset as c', 'a.id_category = c.id', 'left')
    ->where(['a.deleted_at' => NULL])->order_by('a.created_at', 'DESC')->get('3_asset as a');

    $data = $result->result();
    return $data;
  }

  public function get_asset($id)
  {
    $result = $this->db
    ->select('a.id, a.code, a.name , a.qrcode, a.year_acq, a.status, a.user, 
    a.location, a.description, b.file_path, b.file_name,a.id_category,c.name as kategoriName')
    ->join('3_file_asset as b', 'a.id=b.id_asset', 'left')
    ->join('3_category_asset as c', 'a.id_category = c.id', 'left')

    ->where(['a.deleted_at' => NULL, 'a.id' => $id])->get('3_asset as a');

    $data = $result->row();
    return $data;
  }

  public function log_asset($id_asset)
  {
    $result = $this->db->select('a.id, a.code, a.name, a.year_acq, a.status, a.user, a.location, 
    a.description, a.created_at,a.id_category,c.name as kategoriName')
    ->join('3_category_asset as c', 'a.id_category = c.id', 'left')

    ->where(['a.id_asset' => $id_asset])->order_by('a.created_at', 'DESC')->get('3_log_asset as a');

    $data = $result->result();
    return $data;
  }

  public function asset_qr($qr)
  {
    $result = $this->db->select('a.id, a.code, a.name , a.qrcode, a.year_acq, a.status, a.user, a.location, 
    a.description, b.file_path, b.file_name,a.id_category,c.name as kategoriName')
    ->join('3_category_asset as c', 'a.id_category = c.id', 'left')
    ->join('3_file_asset as b', 'a.id=b.id_asset', 'left')
    ->where(['a.deleted_at' => NULL, 'a.qrcode' => $qr])->get('3_asset as a');

    $data = $result->row();
    return $data;
  }

  public function asset_code($code)
  {
    $result = $this->db->select('a.id, a.code, a.name , a.qrcode, a.year_acq, a.status, a.user, a.location,
     a.description, b.file_path, b.file_name,a.id_category,c.name as kategoriName')
    ->join('3_category_asset as c', 'a.id_category = c.id', 'left')
    ->join('3_file_asset as b', 'a.id=b.id_asset', 'left')
    ->where(['a.deleted_at' => NULL, 'a.code' => $code])->get('3_asset as a');

    $data = $result->row();
    return $data;
  }
  public function GetData($request) {
    // Array of database columns which should be read and sent back to DataTables. Use a space where
    // you want to insert a non-database field (for example a counter or static image)
    $aColumns = array('a.code', 'b.name', 'a.name', 'a.qrcode', 
    'a.year_acq', 'a.status', 'a.user', 'a.location', 'a.description', 'a.created_at');
    // Indexed column (used for fast and accurate table cardinality)
    $sIndexColumn = $aColumns[0];
    // DB table to use
    $sTable = "3_asset a";
    $sLimit = "";
    if (isset($request['length']) && $request['length'] != '-1') {
      $sLimit = "LIMIT " . intval($request['start']) . "," . intval($request['length']);
    }

    // Ordering
    $sOrder = "";
    if (isset($request['order'])) {
      $sOrder = "ORDER BY  ";
     
      $sOrder .= "" . $aColumns[intval($request['order']['0']['column'])] . " " .
      // "asc";
      $request['order']['0']['dir'];

      if ($sOrder == "ORDER BY") {
        $sOrder = "";
      }
    }

    // Filtering
    $sWhere = "where a.deleted_at is null ";
    if (
      (isset($request['kodeAsset'])&&$request['kodeAsset']!='') || 
      (isset($request['nameAsset'])&&$request['nameAsset']!='')||
      (isset($request['statusAsset'])&&$request['statusAsset']!='')||
      (isset($request['kategori'])&&$request['kategori']!='')||
      (isset($request['userAsset'])&&$request['userAsset']!='')||
      (isset($request['locationAsset'])&&$request['locationAsset']!=''))
      
    {

      if(  (isset($request['kodeAsset'])&&$request['kodeAsset']!='')){
        $sWhere.=' and ';
        $sWhere.='a.code like \'%'.$request['kodeAsset'].'%\'';
      }
      if(  (isset($request['kategori'])&&$request['kategori']!='')){
        $sWhere.=' and ';
        $sWhere.=' b.id = '.$request['kategori'].' ';
      }
      if(  (isset($request['nameAsset'])&&$request['nameAsset']!='')){
          $sWhere.=' and ';
        $sWhere.='a.name like \'%'.$request['nameAsset'].'%\'';
      }
      if(  (isset($request['statusAsset'])&&$request['statusAsset']!='')){
          $sWhere.=' and ';
        $sWhere.='a.status = \''.$request['statusAsset'].'\'';
      }
      if(  (isset($request['userAsset'])&&$request['userAsset']!='')){
          $sWhere.=' and ';
        $sWhere.='a.user like \'%'.$request['userAsset'].'%\'';
      }
      if(  (isset($request['locationAsset'])&&$request['locationAsset']!='')){
          $sWhere.=' and ';
        $sWhere.='a.location like \'%'.$request['locationAsset'].'%\'';
      }
    }
   
    // SQL queries
    $sQuery = "
          SELECT a.id, a.code,a.name,a.qrcode,a.year_acq,a.status,a.user,a.location,a.description,
          a.created_at,b.name as kategoriName
          FROM $sTable join 3_category_asset b on a.id_category = b.id
          $sWhere
          $sOrder
          $sLimit";
    $rResult = $this->db->query($sQuery)->result_array();

    // Total data set length
    $sQuery = "SELECT COUNT(*) FROM $sTable";
    $rResultTotal = $this->db->query($sQuery);
    $aResultTotal = $rResultTotal->result_array();
    $tempTotal = array_values($aResultTotal[0]);
    $iTotal = $tempTotal[0];

    // JSON-ify Output
    $output = array(
      "totalRecord" => $iTotal,
      "data" => $rResult
    );
    return $output;
  }
  public function get_all_asset_category()
  {
    $result = $this->db->select('a.id, a.name, a.id_department')
    ->where(['a.deleted_at' => NULL])->get('3_category_asset as a');

    $data = $result->result();
    return $data;
  }
  public function get_one_category($kategoriName)
  {
    $result = $this->db->select('a.id, a.name, a.id_department')
    ->where(['a.deleted_at' => NULL])
    ->where(['a.name' => $kategoriName])
    
    ->get('3_category_asset as a');

    $data = $result->result();
    return $data;
  }
  
}

/* End of file Stock_model.php */
