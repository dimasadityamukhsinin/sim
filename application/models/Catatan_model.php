<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Catatan_model extends CI_Model {

    public function __construct()
    {
        parent::__construct();
        $this->load->database();
    }

    // Listing all Catatan
    public function listing()
    {
        $this->db->select('*');
        $this->db->from('catatan');
        $this->db->order_by('kode_catatan', 'asc');
        $query = $this->db->get();
        return $query->result();
    }

    // Tambah Catatan
    public function tambah($data)
    {
        $this->db->insert('catatan',  $data);
    }

    // Edit
    public function edit($data)
    {
        $this->db->where('kode_catatan', $data['kode_catatan']);
        $this->db->update('catatan', $data);
    }

    // Detail Catatan
    public function detail($kode_catatan)
    {
        $this->db->select('*');
        $this->db->from('catatan');
        $this->db->where('kode_catatan', $kode_catatan);
        $query = $this->db->get();
        return $query->row();
    }

    // Delete
    public function delete($data)
    {
        $this->db->where('kode_catatan', $data['kode_catatan']);
        $this->db->delete('catatan', $data);
    }
}
?>