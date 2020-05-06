<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Spp_model extends CI_Model {
    
    public function __construct() 
    {
        parent::__construct();
        $this->load->database();
    }
    
    //Listing all Pembayaran Siswa
    public function listing()
    {
        $this->db->select('*');
        $this->db->from('kategori_bayar');
        $query = $this->db->get();
        return $query->result();
    }

    public function bulan()
    {
        $this->db->select('*');
        $this->db->from('bulan');
        $this->db->order_by('kode_bulan', 'asc');
        $query = $this->db->get();
        return $query->result();
    }

    public function jumlah()
    {
        $this->db->select('*');
        $this->db->from('kategori_bayar');
        $this->db->order_by('kode_bayar', 'asc');
        $query = $this->db->get();
        return $query->result();
    }

    public function detail($nis)
    {
        $this->db->select('spp.*,
                           siswa.nama_siswa');
        $this->db->from('spp');
        //Join
        $this->db->join('siswa','siswa.nis = spp.nis','inner');
        $this->db->where('spp.nis', $nis);
        $this->db->order_by('tanggal', 'asc');
        $query = $this->db->get();
        return $query->result();
    }

    public function detail_cetak($nis)
    {
        $this->db->select('spp.*,
                           siswa.nama_siswa,
                           kategori_bayar.*,
                           bulan.*');
        $this->db->from('spp');
        //Join
        $this->db->join('siswa','siswa.nis = spp.nis','inner');
        $this->db->join('kategori_bayar','kategori_bayar.jumlah = spp.jumlah','inner');
        $this->db->join('bulan','bulan.kode_bulan = spp.kode_bulan','inner');
        $this->db->where('spp.nis', $nis);
        $this->db->order_by('nis', 'asc');
        $query = $this->db->get();
        return $query->row();
    }

    // Detail siswa
    public function siswa($nis)
    {
        $this->db->select('kelas_siswa.*,
                           siswa.nis,
                           kelas.*,
                           tahun_ajaran.*,
                           jurusan.*,
                           kategori_bayar.*');
        $this->db->from('kelas_siswa');
        // Join
        $this->db->join('kelas','kelas.kode_kelas = kelas_siswa.kode_kelas','inner');
        $this->db->join('jurusan','jurusan.nama_jurusan = kelas.nama_jurusan','inner');
        $this->db->join('kategori_bayar','kategori_bayar.jumlah = jurusan.jumlah','inner');
        $this->db->join('tahun_ajaran','tahun_ajaran.kode_ajaran = kelas.kode_ajaran','inner');
        $this->db->join('siswa','siswa.nis = kelas_siswa.nis','inner');
        $this->db->where('siswa.nis', $nis);
        $query = $this->db->get();
        return $query->row();
    }


    // Tambah
    public function tambah($data)
    {
        $this->db->insert_batch('spp', $data);
    }

    // Delete
    public function delete($data)
    {
        $this->db->where('nis', $data['nis']);
        $this->db->delete('spp', $data);
    }
}