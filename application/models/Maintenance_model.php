<?php

defined('BASEPATH') or exit('No direct script access allowed');

class Maintenance_model extends CI_Model
{
    public function get_all_filter($user_id, $created_at, $created_by, $code, $status, $user_level)
    {
        $this->db->select('a.id, a.status, a.created_at, a.updated_at, b.code, c.name');
        $this->db->from('maintenance as a');
        $this->db->join('3_asset as b', 'a.asset_id = b.id', 'left');
        $this->db->join('auth as c', 'a.created_by = c.id', 'left');
        if (!in_array($user_level, [1, 4])) {
            $this->db->where('a.created_by', $user_id);
        }
        if (!empty($created_at)) {
            $this->db->where('DATE(a.created_at)', $created_at);
        }
        if (!empty($created_by)) {
            $this->db->where('c.name', $created_by);
        }
        if (!empty($code)) {
            $this->db->where('b.code', $code);
        }
        if (!empty($status)) {
            $this->db->where('a.status', $status);
        }
        $this->db->order_by('a.created_at', 'DESC');

        $result = $this->db->get();
        return $result->result();
    }

    public function get($id)
    {
        $this->db->select('a.id, a.status, a.created_at, a.updated_at, b.code, c.name');
        $this->db->from('maintenance as a');
        $this->db->join('3_asset as b', 'a.asset_id = b.id', 'left');
        $this->db->join('auth as c', 'a.created_by = c.id', 'left');
        $this->db->where('a.id', $id);

        $query = $this->db->get();
        return $query->row();
    }

    public function get_all_notes($id)
    {
        $this->db->select('a.id, a.maintenance_id, a.notes, a.created_at, a.status, b.name');
        $this->db->from('maintenance_notes_history as a');
        $this->db->join('auth as b', 'a.created_by = b.id', 'left');
        $this->db->where('a.maintenance_id', $id);

        $result = $this->db->get();
        return $result->result();
    }
}
