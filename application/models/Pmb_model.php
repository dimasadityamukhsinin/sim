<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Pmb_model extends CI_Model {
    
    public function __construct() 
    {
        parent::__construct();
        $this->load->database();
    }
    
    //Listing all Pembayaran Siswa
    public function listing()
    {
        $this->db->select('*');
        $this->db->from('pembangunan');
        $this->db->order_by('kode_pembangunan',  'asc');
        $query = $this->db->get();
        return $query->result();
    }

    public function total_masuk($nis)
    {
        $this->db->select('sum(jumlah_bayar) as jumlah');
        $this->db->from('pembangunan');
        $this->db->where('pembangunan.nis', $nis);
        $query = $this->db->get();
        return $query->row();
    }

    public function sisa_pmb($nis)
    {
        $this->db->select('kategori_bayar_pmb.jumlah - sum(jumlah_bayar) as jumlah');
        $this->db->from('pembangunan');
        // Join
        $this->db->join('kategori_bayar_pmb','kategori_bayar_pmb.kode_bayar_pmb = pembangunan.kode_bayar_pmb','inner');
        $this->db->where('nis', $nis);
        $query = $this->db->get();
        return $query->row();
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
        $this->db->from('kategori_bayar_pmb');
        $this->db->order_by('kode_bayar_pmb', 'asc');
        $query = $this->db->get();
        return $query->result();
    }

    public function detail($nis)
    {
        $this->db->select('pembangunan.*,
                           siswa.nama_siswa,
                           kategori_bayar_pmb.*');
        $this->db->from('pembangunan');
        //Join
        $this->db->join('siswa','siswa.nis = pembangunan.nis','inner');
        $this->db->join('kategori_bayar_pmb','kategori_bayar_pmb.kode_bayar_pmb = pembangunan.kode_bayar_pmb','inner');
        $this->db->where('pembangunan.nis', $nis);
        $this->db->order_by('nis', 'asc');
        $query = $this->db->get();
        return $query->result();
    }

    public function detail_cetak($nis)
    {
        $this->db->select('pembangunan.*,
                           siswa.nama_siswa,
                           kategori_bayar_pmb.*');
        $this->db->from('pembangunan');
        //Join
        $this->db->join('siswa','siswa.nis = pembangunan.nis','inner');
        $this->db->join('kategori_bayar_pmb','kategori_bayar_pmb.kode_bayar_pmb = pembangunan.kode_bayar_pmb','inner');
        $this->db->where('pembangunan.nis', $nis);
        $this->db->order_by('nis', 'asc');
        $query = $this->db->get();
        return $query->row();
    }

    // Detail siswa
    public function siswa($nis)
    {
        $this->db->select('*');
        $this->db->from('siswa');
        $this->db->where('nis', $nis);
        $query = $this->db->get();
        return $query->row();
    }


    // Tambah
    public function tambah($data)
    {
        $this->db->insert('pembangunan', $data);
    }

    // Delete
    public function delete($data)
    {
        $this->db->where('nis', $data['nis']);
        $this->db->delete('pembangunan', $data);
    }
}