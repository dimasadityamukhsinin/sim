<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Guru_model extends CI_Model {

    public function __construct()
    {
        parent::__construct();
        $this->load->database();
    }

    // Listing all guru
    public function listing()
    {
        $this->db->select('*');
        $this->db->from('guru');
        $this->db->order_by('nip', 'desc');
        $query = $this->db->get();
        return $query->result();
    }

    // Pembayaran
    public function pembayaran($kode_guru)
    {
        $this->db->select('pembayaran_guru.*,
                           guru.*,
                           bulan.*');
        $this->db->from('pembayaran_guru');
        //Join
        $this->db->join('guru','guru.kode_guru = pembayaran_guru.kode_guru','inner');
        $this->db->join('bulan','bulan.kode_bulan = pembayaran_guru.kode_bulan','inner');
        $this->db->where('pembayaran_guru.kode_guru', $kode_guru);
        $this->db->order_by('pembayaran_guru.kode_guru', 'asc');
        echo $this->db->last_query();
        $query = $this->db->get();
        return $query->result();
    }

    //Login Tata Usaha
    public function login($username,$password)
    {
        $this->db->select('*');
        $this->db->from('guru');
        // JOIN
        $this->db->where(array('nip' => $username,
                               'password' => $password));
        $this->db->order_by('kode_guru', 'desc');
        $query = $this->db->get();
        return $query->row();
    }

    // Detail guru
    public function detail($kode_guru)
    {
        $this->db->select('*');
        $this->db->from('guru');
        $this->db->where('kode_guru', $kode_guru);
        $query = $this->db->get();
        return $query->row();
    }

    // Detail guru
    public function guru($nip)
    {
        $this->db->select('*');
        $this->db->from('guru');
        $this->db->where('nip', $nip);
        $query = $this->db->get();
        return $query->row();
    }

    // Tambah
    public function tambah($data)
    {
        $this->db->insert('guru', $data);
        echo $this->db->last_query();
    }

    // Tambah Pembayaran
    public function tambah_pembayaran($data)
    {
        $this->db->insert('pembayaran_guru', $data);
    }

    // Edit
    public function edit($data)
    {
        $this->db->where('kode_guru', $data['kode_guru']);
        $this->db->update('guru', $data);
    }


    // Delete
    public function delete($data)
    {
        $this->db->where('kode_guru', $data['kode_guru']);
        $this->db->delete('guru', $data);
    }

    // Delete
    public function delete_pembayaran($data)
    {
        $this->db->where('kode_guru', $data['kode_guru']);
        $this->db->delete('pembayaran_guru', $data);
        echo $this->db->last_query();
    }
}
?>