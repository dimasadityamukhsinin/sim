<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Datasiswa_model extends CI_Model {

    public function __construct()
    {
        parent::__construct();
        $this->load->database();
    }

    

    // Listing all Kelas
    public function listing($kode_guru)
    {
        $this->db->select('kelas.*,
                           jurusan.*,
                           tahun_ajaran.*');
        $this->db->from('kelas');
        //Join
        $this->db->join('tahun_ajaran','tahun_ajaran.kode_ajaran = kelas.kode_ajaran','inner');
        $this->db->join('jurusan','jurusan.nama_jurusan = kelas.nama_jurusan','inner');
        $this->db->where('kode_guru', $kode_guru);
        $query = $this->db->get();
        return $query->result();
    }

    public function hitung_jabatan($kode_guru)
    {
        $this->db->select('*');
        $this->db->from('kelas');
        $this->db->where('kode_guru', $kode_guru);
        $query = $this->db->get();
        return $query->num_rows();
    }

    // Listing all Data Siswa
    public function data_siswa($kode_kelas)
    {
        $this->db->select('kelas_siswa.*,
                           siswa.*');
        $this->db->from('kelas_siswa');
        //Join
        $this->db->join('siswa','siswa.nis = kelas_siswa.nis','inner');
        $this->db->where('kelas_siswa.kode_kelas',$kode_kelas);
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