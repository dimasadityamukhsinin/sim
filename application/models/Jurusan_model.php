<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Jurusan_model extends CI_Model {
    
    public function __construct() 
    {
        parent::__construct();
        $this->load->database();
    }
    
    //Listing all jurusan
    public function listing()
    {
        $this->db->select('jurusan.*,
                           kategori_bayar.*');
        $this->db->from('jurusan');
        // Join
        $this->db->join('kategori_bayar','kategori_bayar.jumlah = jurusan.jumlah');
        $this->db->order_by('kode_jurusan', 'asc');
        $query = $this->db->get();
        return $query->result();
    }

    // Detail
    public function detail($nama_jurusan)
    {
        $this->db->select('*');
        $this->db->from('jurusan');
        $this->db->where('kode_jurusan', $nama_jurusan);
        $this->db->order_by('kode_jurusan', 'desc');
        $query = $this->db->get();
        return $query->row();
    }

    // Tambah
    public function tambah($data)
    {
        $this->db->insert('jurusan', $data);
    }

    // Edit
    public function edit($data)
    {
        $this->db->where('kode_jurusan', $data['kode_jurusan']);
        $this->db->update('jurusan', $data);
    }

    // Delete
    public function delete($data)
    {
        $this->db->where('kode_jurusan', $data['kode_jurusan']);
        $this->db->delete('jurusan', $data);
    }
}