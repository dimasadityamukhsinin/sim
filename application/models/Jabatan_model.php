<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Jabatan_model extends CI_Model {
    
    public function __construct() 
    {
        parent::__construct();
        $this->load->database();
    }
    
    //Listing all kelas
    public function listing()
    {
        $this->db->select('kelas.*,
                           guru.*,
                           jurusan.*,
                           tahun_ajaran.*');
        $this->db->from('kelas');
        //Join
        $this->db->join('guru','guru.kode_guru = kelas.kode_guru','inner');
        $this->db->join('tahun_ajaran','tahun_ajaran.kode_ajaran = kelas.kode_ajaran','inner');
        $this->db->join('jurusan','jurusan.nama_jurusan = kelas.nama_jurusan','inner');
        $this->db->order_by('kode_kelas',  'desc');
        $query = $this->db->get();
        return $query->result();
    }

    public function guru()
    {
        $this->db->select('*');
        $this->db->from('guru');
        $query = $this->db->get();
        return $query->result();
    }

    public function kelas()
    {
        $this->db->select('*');
        $this->db->from('kelas');
        $this->order_by('kode_kelas','desc');
        $query = $this->db->get();
        return $query->result();
    }

    public function jurusan()
    {
        $this->db->select('*');
        $this->db->from('jurusan');
        $query = $this->db->get();
        return $query->result();
    }

    // Detail siswa
    public function detail($jabatan_guru)
    {
        $this->db->select('kelas.*,
                           tahun_ajaran.*');
        $this->db->from('kelas');
        // Join
        $this->db->join('tahun_ajaran','tahun_ajaran.kode_ajaran = kelas.kode_ajaran','inner');
        $this->db->where('kode_kelas', $jabatan_guru);
        $this->db->order_by('kode_kelas', 'desc');
        $query = $this->db->get();
        return $query->row();
    }

    // Edit
    public function edit($data)
    {
        $this->db->where('kode_kelas', $data['kode_kelas']);
        $this->db->update('kelas', $data);
    }

    // Tambah
    public function tambah($data)
    {
        $this->db->insert('kelas', $data);
    }

    // Delete
    public function delete($data)
    {
        $this->db->where('kode_kelas', $data['kode_kelas']);
        $this->db->delete('kelas', $data);
    }
}