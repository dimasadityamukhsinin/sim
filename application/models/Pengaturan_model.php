<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Pengaturan_model extends CI_Model {

    public function __construct()
    {
        parent::__construct();
        $this->load->database();
    }

    // Listing all profile
    public function listing()
    {
        $this->db->select('*');
        $this->db->from('profile');
        $query = $this->db->get();
        return $query->result();
    }

    public function hak_akses()
    {
        $this->db->select('*');
        $this->db->from('hak_akses');
        $this->db->order_by('id_hak_akses', 'asc');
        $query = $this->db->get();
        return $query->result();
    }

    // Edit
    public function edit($data)
    {
        $this->db->update('kelas', $data);
    }

    // Detail guru
    public function detail($kode_guru)
    {
        $this->db->select('*');
        $this->db->from('guru');
        $this->db->where('kode_guru', $kode_guru);
        $this->db->order_by('kode_guru', 'desc');
        echo $this->db->last_query();
        $query = $this->db->get();
        return $query->row();
    }
}
?>