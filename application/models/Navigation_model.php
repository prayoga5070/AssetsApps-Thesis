<?php

defined('BASEPATH') or exit('No direct script access allowed');

class Navigation_model extends CI_Model
{

    public function get_all_navigation()
    {
      $result = $this->db->select('a.id, a.code, a.name , a.qrcode, a.year_acq, a.status, a.user, a.location, a.description,a.created_at')->where(['a.deleted_at' => NULL])->order_by('a.created_at', 'DESC')->get('3_asset as a');

      $data = $result->result();
      return $data;   
    }

    public function get_navigation_fix($offset, $limit, $order_column, $order_direction, $q1)
    {
      $sql = "ROW_NUMBER() OVER (ORDER BY z.Id) AS no, z.* from (
          SELECT  a.id , c.`name` as typename, a.`Name` as name , a.Route as route, a.Urutan as urutan, a.IsVisible as isvisible, a.CreatedTime as createdtime, e.`name` as createdby, a.UpdatedTime as updatedtime, e.`name` as updatedby, a.IsActive as isactive, GROUP_CONCAT(d.`Name` separator '<br>') AS allowedroles, g.`name` as status
          FROM `navigation` a
          left join navigation_assignment b on a.Id = b.MenuId
          left join lookup c on c.`value` = a.Type and c.type = 'NavigationType'
          left join lookup d on d.`value` = b.RoleId and d.type = 'Roles'
          left join auth e on e.id = a.CreatedById
          left join auth f on f.id = a.UpdatedById
          left join lookup g on g.`value` = a.IsVisible and g.type = 'MenuStatus'
          where a.IsDeleted = 0 ";
      $search = "";
      if($q1){
        $search = " and a.name like '%" . $q1 . "%'";

      }

      $final = $sql . $search . "GROUP BY a.id) z";
      $this->db->select($final);
      $this->db->order_by($order_column, $order_direction);
      $this->db->limit($limit, $offset);
      
      $query = $this->db->get();
      $data = $query->result();
      return $data;   
    }

    public function get_All_Data_Role_fix($offset, $limit, $q1)
    {
      $paging = " * FROM ( ";
      $sql = "select ROW_NUMBER() OVER (ORDER BY a.id) AS Number, a.value as id, a.`name` as text FROM `lookup` a where a.IsDeleted = 0 and a.IsActive = 1 and a.type = 'Roles'";
      $search = "";
      if($q1){
        $search = " and a.name like '%" . $q1 . "%'";
      }

      $subfinal = $sql . $search;

      $queryfinal = $paging . $subfinal . ") TBL WHERE Number BETWEEN ((" . $offset . " - 1) * ". $limit . " + 1 ) AND (" . $offset . " * ". $limit . ")";

      $this->db->select($queryfinal);
      
      $query = $this->db->get();
      $data = $query->result();
      return $data;   
    }

    public function get_count_navigation_fix($q1)
    {
      $this->db->select("a.id
          FROM `navigation` a
          left join navigation_assignment b on a.Id = b.MenuId
          left join lookup c on c.`value` = a.Type and c.type = 'NavigationType'
          left join lookup d on d.`value` = b.RoleId and d.type = 'Roles'
          left join auth e on e.id = a.CreatedById
          left join auth f on f.id = a.UpdatedById
          left join lookup g on g.`value` = a.IsVisible and g.type = 'MenuStatus'
          ")
        ->where('a.IsDeleted', 0);
      $this->_search_query($q1);
      $this->db->group_by('a.Id');
      $query = $this->db->count_all_results();
      $data = $query;
      return $data;
    }

    public function get_count_All_Data_Role_fix($q1)
    {
      $this->db->select("a.id as id, a.`name` as text FROM lookup as a")->where('a.IsDeleted', 0)->where('a.IsActive', 1)->where('a.type', 'Roles');
      $this->_search_queryAllRole($q1);
      $query = $this->db->count_all_results('lookup as a');
      $data = $query;
      return $data;
    }

    public function get_All_Data_Parent_Menu_fix($offset, $limit, $q1)
    {
      $paging = " * FROM ( ";
      $sql = "select ROW_NUMBER() OVER (ORDER BY a.id) AS Number, a.id as id, a.`name` as text FROM `navigation` a where a.IsDeleted = 0 and a.IsActive = 1 and a.type = 1";
      $search = "";
      if($q1){
        $search = " and a.name like '%" . $q1 . "%'";
      }

      $subfinal = $sql . $search;

      $queryfinal = $paging . $subfinal . ") TBL WHERE Number BETWEEN ((" . $offset . " - 1) * ". $limit . " + 1 ) AND (" . $offset . " * ". $limit . ")";

      $this->db->select($queryfinal);
      
      $query = $this->db->get();
      $data = $query->result();
      return $data;   
    }

    public function get_count_All_Data_Parent_Menu_fix($q1)
    {
      $this->db->select("a.id as id, a.`name` as text FROM navigation as a")->where('a.IsDeleted', 0)->where('a.IsActive', 1)->where('a.type', 1);
      $this->_search_queryAllRole($q1);
      $query = $this->db->count_all_results('navigation as a');
      $data = $query;
      return $data;
    }

    public function get_navigation($id)
    {
      $result = $this->db->select("a.id ,a.type as type, c.`name` as typename, a.`Name` as name, h.`Name` as parentname, a.Route as route, a.Urutan as urutan
      , a.IsVisible as isvisible, a.CreatedTime as createdtime, e.`name` as createdby, a.UpdatedTime as updatedtime
      , e.`name` as updatedby, a.IsActive as isactive, GROUP_CONCAT(d.`Name` separator '<br>') AS allowedroles, g.`name` as status")
      ->join('navigation_assignment b', 'a.Id = b.MenuId', 'left')
      ->join('lookup c', "c.`value` = a.Type and c.type = 'NavigationType'", 'left')
      ->join('lookup d', "d.`value` = b.RoleId and d.type = 'Roles'", 'left')
      ->join('auth e', 'e.id = a.CreatedById', 'left')
      ->join('auth f', 'f.id = a.UpdatedById', 'left')
      ->join('lookup g', "g.`value` = a.IsVisible and g.type = 'MenuStatus'", 'left')
      ->join('navigation h', "h.`type` = 1 and h.id = a.ParentNavigationId", 'left')
      ->where(['a.IsDeleted' => 0, 'a.id' => $id])
      ->get('navigation a');

      $data = $result->row();
      return $data;   
    }

    public function get_navigation_roles($id)
    {
      $result = $this->db->select("d.`value` as id, d.`Name` AS text")
      ->join('navigation_assignment b', 'a.Id = b.MenuId', 'left')
      ->join('lookup c', "c.`value` = a.Type and c.type = 'NavigationType'", 'left')
      ->join('lookup d', "d.`value` = b.RoleId and d.type = 'Roles'", 'left')
      ->where(['a.IsDeleted' => 0, 'a.id' => $id])
      ->get('navigation a');

      $data = $result->result();
      return $data;   
    }

    public function get_navigation_parent($id)
    {
      $result = $this->db->select("b.Id as id, b.`Name` AS text")
      ->join('navigation b', 'a.ParentNavigationId = b.Id', 'left')
      ->where(['a.IsDeleted' => 0, 'a.id' => $id])
      ->get('navigation a');

      $data = $result->result();
      return $data;   
    }

    // public function get_all_asset_test()
    // {
    //   $result = $this->db->select('a.id, a.code, a.name , a.qrcode, a.year_acq, a.status, a.user, a.location, a.description,a.created_at')->where(['a.deleted_at' => NULL])->order_by('a.created_at', 'DESC')->get('3_asset as a');

    //   $data = $result->result();
    //   return $data;   
    // }

    // public function get_count_all_asset_test($q, $filters)
    // {
    //   $this->_where_query($filters);
    //   $this->_search_query($q);

    //   return $this->db->count_all_results('3_asset as a');
      
    // }

    // public function get_all_navigation_new($offset, $limit, $q, $order_column, $order_direction, $filters)
    // {
    //   $result = $this->db->select('
    //   a.id, a.code, a.name , a.qrcode, a.year_acq
    //   , a.status, a.user, a.location, a.description
    //   ,a.created_at')
    //   ->_where_query($filters)
    //   ->_search_query($q)
    //   ->order_by($order_column, $order_direction)
    //   ->limit($limit, $offset)
    //   ->get('3_asset as a');

    //   $data = $result->result();
    //   return $data;   
    // }

    public function get_menu()
    {
      $result = $this->db->select('m.Id,m.Type,m.Name,m.Route,m.Urutan,m.IsVisible')
      ->from('navigation m')
      ->join('navigation_assignment a','a.MenuId = m.Id', 'left')
      ->where(['a.RoleId' => $this->session->level, 'm.IsActive' => '1', 'm.IsDeleted' => '0', 'm.Type' => '1'])
      ->order_by('m.Urutan', 'ASC')
      ->get()->result_array();

      return $result;   
    }

    public function get_sub_menu()
    {
      $result = $this->db->select('m.Id,m.Type,m.Name,m.Route,m.Urutan,m.ParentNavigationId,m.IsVisible')
      ->from('navigation m')
      ->join('navigation_assignment a','a.MenuId = m.Id', 'left')
      ->where(['a.RoleId' => $this->session->level, 'm.IsActive' => '1', 'm.IsDeleted' => '0', 'm.Type' => '2'])
      ->order_by('m.Urutan', 'ASC')
      ->get()->result_array();

      return $result;   
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

    private function _search_query($q)
    {
      if ($q) {
        $this->db->group_start();
        $this->db->or_where('a.name LIKE', '%' . $q . '%');
        $this->db->group_end();
      }
    }
    private function _search_queryAllRole($q)
    {
      if ($q) {
        $this->db->group_start();
        $this->db->or_where('a.name LIKE', '%' . $q . '%');
        $this->db->group_end();
      }
    }
}

/* End of file Stock_model.php */
