<?php

defined('BASEPATH') or exit('No direct script access allowed');

class Peminjaman_Model extends CI_Model
{

    public function get_all_peminjaman($id_user)
    {
        $this->db->select('a.id, a.user_id, a.lokasi_id, a.alasan_peminjaman, a.created_at, a.status_id, a.flow_id');
        $this->db->from('peminjaman as a');
        $this->db->where('a.user_id', $id_user);
        $this->db->order_by('a.created_at', 'DESC');

        $result = $this->db->get();
        return $result->result();
    }

    public function get_peminjaman($id)
    {
        $this->db->select('a.id, a.user_id, a.lokasi_id, a.alasan_peminjaman, a.created_at, a.status_id, a.flow_id');
        $this->db->from('peminjaman as a');
        $this->db->where('a.id', $id);
        $this->db->order_by('a.created_at', 'DESC');

        $query = $this->db->get();
        return $query->row();
    }

    public function get_all_asset_peminjaman($id)
    {
        $this->db->select('a.id, b.code, b.name, b.year_acq, b.description, b.qrcode');
        $this->db->from('peminjaman_list_asset as a');
        $this->db->join('3_asset as b', 'a.asset_id = b.id', 'left');
        $this->db->where('a.peminjaman_id', $id);

        $result = $this->db->get();
        return $result->result();
    }

    public function add_pengajuan()
    {
        // Start transaction
        $this->db->trans_start();

        $data = array(
            'user_id' => $this->input->post('user_id'),
            'lokasi_id' => $this->input->post('lokasi_id'),
            'alasan_peminjaman' => $this->input->post('alasan_peminjaman'),
            'created_at' => date('Y-m-d H:i:s'),
        );

        // Insert data into 'peminjaman' table
        $this->db->insert('peminjaman', $data);

        // Get the last inserted ID
        $pengajuan_id = $this->db->insert_id();

        // Iterate over asset_ids from POST data
        foreach ($this->input->post('asset_ids') as $asset_id) {
            $asset_data = array(
                'pengajuan_id' => $pengajuan_id,  // Use the retrieved ID
                'asset_id' => $asset_id,
                'created_at' => date('Y-m-d H:i:s'),
            );

            // Insert data into 'peminjaman_list_asset' table
            $this->db->insert('peminjaman_list_asset', $asset_data);
        }

        // Complete the transaction
        $this->db->trans_complete();

        // Check if the transaction was successful
        if ($this->db->trans_status() === FALSE) {
            // If something went wrong, roll back the transaction
            $this->session->set_flashdata('msg', 'Error occurred. Transaction rolled back.');
        } else {
            // If everything went well, commit the transaction
            $this->session->set_flashdata('msg', 'Pengajuan added successfully.');
        }

        // Redirect to 'auth' base URL
        return redirect(base_url('auth'));
    }
}

/* End of file Stock_model.php */
