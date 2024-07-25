<?php

defined('BASEPATH') or exit('No direct script access allowed');

class Peminjaman_Model extends CI_Model
{
    public function get_all_peminjaman($user_id, $created_by, $id_category, $status)
    {
        $this->db->select('
        a.id, 
        a.start_date, 
        a.end_date, 
        a.location, 
        a.description, 
        a.created_at, 
        a.created_by, 
        d.name, 
        a.status, 
        CONCAT(a.start_date, " sampai ", a.end_date) AS durasi');

        $this->db->from('peminjaman AS a');
        $this->db->join('peminjaman_list_category AS b', 'a.id = b.peminjaman_id', 'left');
        $this->db->join('3_category_asset AS c', 'b.asset_category_id = c.id', 'left');
        $this->db->join('auth AS d', 'a.created_by = d.id', 'left');

        // Apply filters
        if (!in_array($user_id, [1, 2])) {
            $this->db->where('a.created_by', $user_id);
        }
        if (!empty($id_category)) {
            $this->db->where('c.id_category', $id_category);
        }
        if (!empty($created_by)) {
            $this->db->where('d.name', $created_by);
        }
        if (!empty($status)) {
            $this->db->where('a.status', $status);
        }
        $this->db->group_by('a.id ');
        $this->db->order_by('a.created_at', 'DESC');

        $result = $this->db->get();
        return $result->result();
    }

    public function get($id)
    {
        $this->db->select('a.id, a.start_date, a.end_date, a.location, a.description, a.created_by, a.created_at, a.status, a.notes_approver, u.name as created_by_name');
        $this->db->from('peminjaman as a');
        $this->db->join('auth as u', 'u.id = a.created_by', 'left');
        $this->db->where('a.id', $id);
        $this->db->order_by('a.created_at', 'DESC');

        $query = $this->db->get();
        return $query->row();
    }

    public function get_peminjaman_category($id)
    {
        $this->db->select('a.id, a.quantity, a.description, b.id as category_id, b.name, b.id_department');
        $this->db->from('peminjaman_list_category as a');
        $this->db->join('3_category_asset as b', 'a.asset_category_id = b.id', 'left');
        $this->db->where('a.peminjaman_id', $id);
        $this->db->where('a.deleted_by', NULL);
        $this->db->where('a.deleted_at', NULL);

        // var_dump($this->db->get_compiled_select());
        // die();

        $result = $this->db->get();
        return $result->result();
    }

    public function get_peminjaman_category_asset($id)
    {
        $this->db->select('a.id, a.asset_id, a.quantity, b.code, b.name, fa.id as file_id, fa.file_name, fa.file_path');
        $this->db->from('peminjaman_list_asset as a');
        $this->db->join('3_asset as b', 'a.asset_id = b.id', 'left');
        $this->db->join('3_file_asset as fa', 'fa.id_asset = a.id', 'left');
        $this->db->where('a.peminjaman_id', $id);

        $result = $this->db->get();
        return $result->result();
    }
}
/* End of file Stock_model.php */
