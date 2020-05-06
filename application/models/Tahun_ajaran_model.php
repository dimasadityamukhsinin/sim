<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Tahun_ajaran_model extends CI_Model {
    
    public function __construct() 
    {
        parent::__construct();
        $this->load->database();
    }
    
    //Listing all Tahun Ajaran
    public function listing()
    {
        $this->db->select('*');
        $this->db->from('tahun_ajaran');
        $query = $this->db->get();
        return $query->result();
    }

    // Tambah Tahun Ajaran
    public function tambah($data)
    {
        $this->db->insert('tahun_ajaran',  $data);
    }

    // Edit
    public function edit($data)
    {
        $this->db->where('kode_ajaran', $data['kode_ajaran']);
        $this->db->update('tahun_ajaran', $data);
    }

    // Detail Tahun Ajaran
    public function detail($kode_ajaran)
    {
        $this->db->select('*');
        $this->db->from('tahun_ajaran');
        $this->db->where('kode_ajaran', $kode_ajaran);
        $query = $this->db->get();
        return $query->row();
    }

    // Delete
    public function delete($data)
    {
        $this->db->where('kode_ajaran', $data['kode_ajaran']);
        $this->db->delete('tahun_ajaran', $data);
    }
}