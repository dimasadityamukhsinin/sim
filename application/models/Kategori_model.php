<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Kategori_model extends CI_Model {
    
    public function __construct() 
    {
        parent::__construct();
        $this->load->database();
    }
    
    //Listing all Kategori SPP
    public function listing_spp()
    {
        $this->db->select('*');
        $this->db->from('kategori_bayar');
        $this->db->order_by('kode_bayar', 'desc');
        $query = $this->db->get();
        return $query->result();
    }

    //Listing all Kategori PMB
    public function listing_pmb()
    {
        $this->db->select('*');
        $this->db->from('kategori_bayar_pmb');
        $this->db->order_by('kode_bayar_pmb', 'desc');
        $query = $this->db->get();
        return $query->result();
    }

    // Detail Kategori SPP
    public function detail_spp($kode_bayar)
    {
        $this->db->select('*');
        $this->db->from('kategori_bayar');
        $this->db->where('kode_bayar', $kode_bayar);
        $this->db->order_by('kode_bayar', 'asc');
        $query = $this->db->get();
        return $query->row();
    }

    // Detail Kategori PMB
    public function detail_pmb($kode_bayar)
    {
        $this->db->select('*');
        $this->db->from('kategori_bayar_pmb');
        $this->db->where('kode_bayar_pmb', $kode_bayar);
        $this->db->order_by('kode_bayar_pmb', 'asc');
        $query = $this->db->get();
        return $query->row();
    }

    // Tambah Kategori SPP
    public function tambah_spp($data)
    {
        $this->db->insert('kategori_bayar', $data);
    }

    // Tambah Kategori SPP
    public function tambah_pmb($data)
    {
        $this->db->insert('kategori_bayar_pmb', $data);
    }

    // Edit
    public function edit($data)
    {
        $this->db->where('kode_bayar', $data['kode_bayar']);
        $this->db->update('kategori_bayar', $data);
    }

    // Delete
    public function delete($data)
    {
        $this->db->where('kode_bayar', $data['kode_bayar']);
        $this->db->delete('kategori_bayar', $data);
    }

    // Delete
    public function delete_pmb($data)
    {
        $this->db->where('jumlah', $data['jumlah']);
        $this->db->delete('kategori_bayar_pmb', $data);
    }
}