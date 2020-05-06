<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Kelas_model extends CI_Model {
    
    public function __construct() 
    {
        parent::__construct();
        $this->load->database();
    }

    public function ambil_kel()
    {
        $query = $this->db->get('konfigurasi');
        return $query->row();
        
    }
    
    //Listing all kelas
    public function listing()
    {
        $this->db->select('kelas_siswa.*,
                           kelas.*,
                           siswa.*');
        $this->db->from('kelas_siswa');
        //Join
        $this->db->join('kelas','kelas.kode_kelas = kelas_siswa.kode_kelas','inner');
        $this->db->join('siswa','siswa.nis = kelas_siswa.nis','inner');
        $this->db->order_by('id',  'asc');
        $query = $this->db->get();
        return $query->result();
    }

    // Cari
    public function cetak($kode_kelas)
    {
        $this->db->select('kelas_siswa.*,
                           kelas.*,
                           siswa.*,
                           pembangunan.*');
        $this->db->from('kelas_siswa');
        //Join
        $this->db->join('kelas','kelas.kode_kelas = kelas_siswa.kode_kelas','inner');
        $this->db->join('siswa','siswa.nis = kelas_siswa.nis','inner');
        $this->db->join('pembangunan','pembangunan.nis = siswa.nis','inner');
        $this->db->where('kelas.kode_kelas',$kode_kelas);
        $query = $this->db->get();
        return $query->result();
    }

    public function total_masuk($nis)
    {
        $this->db->select('sum(jumlah_bayar) as jumlah,
                           kelas.*,');
        $this->db->from('kelas');
        // Join

        $this->db->where('pembangunan.nis', $nis);
        $query = $this->db->get();
        return $query->result();
    }

    // Detail
    public function detail($nis)
    {
        $this->db->select('kelas_siswa.*,
                           kelas.*,
                           siswa.*');
        $this->db->from('kelas_siswa');
        //Join
        $this->db->join('kelas','kelas.kode_kelas = kelas_siswa.kode_kelas','inner');
        $this->db->join('siswa','siswa.nis = kelas_siswa.nis','inner');
        $this->db->where('nis', $nis);
        $query = $this->db->get();
        return $query->row();
    }

    //Login Siswa
    public function login($username,$password)
    {
        $this->db->select('*');
        $this->db->from('siswa');
        $this->db->where(array('nis' => $username,
                               'password' => $password));
        $this->db->order_by('kode_siswa', 'desc');
        $query = $this->db->get();
        return $query->row();
    }

    public function tambah($data)
    {
        $this->db->where('nis', $data['nis']);
        $this->db->insert('kelas_siswa', $data);
    }

    public function hitung_kelas()
    {
        $this->db->select('*');
        $this->db->from('kelas');
        $query = $this->db->get();
        return $query->num_rows();
    }

    public function edit($data)
    {
        $this->db->where('nis', $data['nis']);
        $this->db->update('kelas_siswa', $data);
    }

    // Delete
    public function delete($data)
    {
        $this->db->where('nis', $data['nis']);
        $this->db->delete('kelas_siswa', $data);
    }

    public function kelas()
    {
        $this->db->select('kelas.*,
                           guru.*,
                           tahun_ajaran.*');
        $this->db->from('kelas');
        // JOIN
        $this->db->join('guru','guru.kode_guru = kelas.kode_guru','inner');
        $this->db->join('tahun_ajaran','tahun_ajaran.kode_ajaran = kelas.kode_ajaran','inner');
        $this->db->order_by('kode_kelas', 'asc');
        $query = $this->db->get();
        return $query->result();
    }

    public function siswa($kode_jurusan)
    {
        $this->db->select('*');
        $this->db->from('kelas_siswa');
        $this->db->where('kode_jurusan', $kode_jurusan);
        $query = $this->db->get();
        return $query->result();
    }
}