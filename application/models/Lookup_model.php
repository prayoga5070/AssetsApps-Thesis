<?php

defined('BASEPATH') or exit('No direct script access allowed');

class Lookup_model extends CI_Model
{

    public function get_lookup_fix($offset, $limit, $order_column, $order_direction, $q1, $q2)
    {
      $sql = "ROW_NUMBER() OVER (ORDER BY z.Id) AS no, z.* from (
          SELECT  a.id , a.`type` as typename, a.`name` as name , a.value as value, a.orderno as urutan, a.isactive as status, a.createdtime as createdtime, e.`name` as createdby, a.updatedtime as updatedtime, e.`name` as updatedby
          FROM `lookup` a
          left join auth e on e.id = a.createdbyid
          left join auth f on f.id = a.updatedbyid
          where a.isdeleted = 0 ";
      $search = "";
      if($q1){
        $search = " and a.type like '%" . $q1 . "%'";
      }

      if($q2){
        $search = $search . " and a.name like '%" . $q2 . "%'";
      }

      $final = $sql . $search . " ) z";
      $this->db->select($final);
      $this->db->order_by($order_column, $order_direction);
      $this->db->limit($limit, $offset);
      
      $query = $this->db->get();
      $data = $query->result();
      return $data;   
    }

    public function get_count_lookup_fix($q1, $q2)
    {
      $this->db->select("a.id")
         ->from("lookup a")
         ->join("auth e", "e.id = a.createdbyid", "left")
         ->join("auth f", "f.id = a.updatedbyid", "left")
         ->where('a.isdeleted', 0);
      $this->_search_query($q1, $q2);
      $query = $this->db->count_all_results();
      $data = $query;
      return $data;
    }

    public function get_lookup($id)
    {
      $result = $this->db->select("a.id , a.`type` as typename, a.`name` as name , a.value as value, a.orderno as urutan, a.isactive as status, a.createdtime as createdtime, e.`name` as createdby, a.updatedtime as updatedtime, e.`name` as updatedby")
      ->join('auth e', 'e.id = a.createdbyid', 'left')
      ->join('auth f', 'f.id = a.updatedbyid', 'left')
      ->where(['a.isdeleted' => 0, 'a.id' => $id])
      ->get('lookup a');
      $data = $result->row();
      return $data;   
    }

    private function _where_query($filters)
    {
      if (isset($filters->active)) {
        if ($filters->active == '1') $this->db->where('a.active', 1);
        if ($filters->active == '0') $this->db->where('a.active', 0);
      }

      if (isset($filters->status_login)) $this->db->where('a.status_login', $filters->status_login);

      // $this->db->where('main.status_login != 0');
      // $this->db->where('main.status_login != 1');
    }

    private function _search_query($q1, $q2)
    {

      if ($q1) {
        $this->db->group_start();
        $this->db->or_where('a.type LIKE', '%' . $q1 . '%');
        if ($q2) {
          $this->db->or_where('a.name LIKE', '%' . $q2 . '%');
        }
        $this->db->group_end();
      }
      if ($q2) {
        $this->db->group_start();
          $this->db->or_where('a.name LIKE', '%' . $q2 . '%');
        $this->db->group_end();
      }
    }
    
}

/* End of file Stock_model.php */
