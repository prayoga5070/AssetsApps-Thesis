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

  public function GetData($request)
  {
    // Array of database columns which should be read and sent back to DataTables. Use a space where
    // you want to insert a non-database field (for example a counter or static image)
    $aColumns = array('id', 'code', 'name', 'qrcode', 'year_acq', 'status', 'user', 'location', 'description', 'created_at');
    // Indexed column (used for fast and accurate table cardinality)
    $sIndexColumn = $aColumns[0];
    // DB table to use
    $sTable = "3_asset a";

    // Paging
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
    $sWhere = "";
    if (
      (isset($request['kodeAsset'])&&$request['kodeAsset']!='') || 
      (isset($request['nameAsset'])&&$request['nameAsset']!='')||
      (isset($request['statusAsset'])&&$request['statusAsset']!='')||
      (isset($request['userAsset'])&&$request['userAsset']!=''))
    {
      $sWhere .= ' where ';
      if(  (isset($request['kodeAsset'])&&$request['kodeAsset']!='')){
        $sWhere.='code like \'%'.$request['kodeAsset'].'%\'';
      }
      if(  (isset($request['nameAsset'])&&$request['nameAsset']!='')){
        if(  ( $sWhere != ' where ')){
          $sWhere.=' and ';
        }
        $sWhere.='name like \'%'.$request['nameAsset'].'%\'';
      }
      if(  (isset($request['statusAsset'])&&$request['statusAsset']!='')){
        if(  ( $sWhere != ' where ')){
          $sWhere.=' and ';
        }
        $sWhere.='status like \'%'.$request['statusAsset'].'%\'';
      }
      if(  (isset($request['userAsset'])&&$request['userAsset']!='')){
        if(  ( $sWhere != ' where ')){
          $sWhere.=' and ';
        }
        $sWhere.='user like \'%'.$request['userAsset'].'%\'';
      }
      if(  (isset($request['locationAsset'])&&$request['locationAsset']!='')){
        if(  ( $sWhere != ' where ')){
          $sWhere.=' and ';
        }
        $sWhere.='location like \'%'.$request['locationAsset'].'%\'';
      }
    }
   
    // SQL queries
    $sQuery = "
          SELECT id,code,name,qrcode,year_acq,status,user,location,description,created_at
          FROM $sTable
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
}

/* End of file Stock_model.php */
