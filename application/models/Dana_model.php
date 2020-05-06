<?php
defined('BASEPATH') or exit('No script access allowed');

class Dana_model extends CI_Model {

    public function __construct()
    {
        parent::__construct();
        $this->load->database();
    }

    public function listing()
    {
        $this->db->select('*');
        $this->db->from('dana');
        $this->db->order_by('kode_dana', 'asc');
        $query = $this->db->get();
        return $query->result();
    }

    public function total_masuk()
    {
        $this->db->select('sum(jumlah_dana) as jumlah_dana');
        $this->db->from('dana');
        $this->db->where('jenis = "masuk"');
        $query = $this->db->get();
        return $query->row();
    }
    
    public function total_keluar()
    {
        $this->db->select('sum(jumlah_dana) as jumlah_dana');
        $this->db->from('dana');
        $this->db->where('jenis = "keluar" ');
        $query = $this->db->get();
        return $query->row();
    }

    // Tambah
    public function tambah($data)
    {
        $this->db->insert_batch('dana', $data);
    }

    // Edit
    public function edit($data)
    {
        $this->db->where('kode_dana', $data['kode_dana']);
        $this->db->update('dana', $data);
    }

    // Detail Dana Masuk
    public function detail($kode_dana)
    {
        $this->db->select('*');
        $this->db->from('dana');
        $this->db->where('kode_dana', $kode_dana);
        $query = $this->db->get();
        return $query->row();
    }

    // Delete
    public function delete($data)
    {
        $this->db->where('kode_dana', $data['kode_dana']);
        $this->db->delete('dana', $data);
    }
}
?>