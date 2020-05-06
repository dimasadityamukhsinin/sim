<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Siswa_model extends CI_Model {

    public function __construct()
    {
        parent::__construct();
        $this->load->database();
    }

    // Listing all siswa
    public function listing()
    {
        $this->db->select('*');
        $this->db->from('siswa');
        $this->db->order_by('kode_siswa', 'desc');
        $query = $this->db->get();
        return $query->result();
    }

    //Listing all Tata Usaha
    public function siswa($nis)
    {
        $this->db->select('*');
        $this->db->from('siswa');
        $this->db->where('nis', $nis);
        $query = $this->db->get();
        return $query->row();
    }

    public function hak_akses()
    {
        $this->db->select('*');
        $this->db->from('hak_akses');
        $this->db->order_by('id_hak_akses', 'asc');
        $query = $this->db->get();
        return $query->result();
    }

    // Detail siswa
    public function detail($kode_siswa)
    {
        $this->db->select('*');
        $this->db->from('siswa');
        $this->db->where('kode_siswa', $kode_siswa);
        $query = $this->db->get();
        return $query->row();
    }

    // Tambah
    public function tambah($data)
    {
        $this->db->insert('siswa', $data);
    }

    // Edit
    public function edit($data)
    {
        $this->db->where('kode_siswa', $data['kode_siswa']);
        $this->db->update('siswa', $data);
    }


    // Delete
    public function delete($data)
    {
        $this->db->where('kode_siswa', $data['kode_siswa']);
        $this->db->delete('siswa', $data);
    }
}
?>