<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Profile_model extends CI_Model {
    
    public function __construct() 
    {
        parent::__construct();
        $this->load->database();
    }

    // Listing all profile administrasi
    public function administrasi($kode_administrasi)
    {
        $this->db->select('*');
        $this->db->from('administrasi');
        $this->db->where('kode_administrasi', $kode_administrasi);
        $query = $this->db->get();
        return $query->row();
    }

    public function edit_administrasi($data)
    {
        $this->db->where('kode_administrasi', $data['kode_administrasi']);
        $this->db->update('administrasi', $data);
    }

    // Listing all profile siswa
    public function siswa($kode_siswa)
    {
        $this->db->select('*');
        $this->db->from('siswa');
        $this->db->where('kode_siswa', $kode_siswa);
        $query = $this->db->get();
        return $query->row();
    }

    public function edit_siswa($data)
    {
        $this->db->where('kode_siswa', $data['kode_siswa']);
        $this->db->update('siswa', $data);
    }

     public function edit_guru($data)
    {
        $this->db->where('kode_guru', $data['kode_guru']);
        $this->db->update('guru', $data);
    }
}
?>