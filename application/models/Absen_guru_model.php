<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Absen_guru_model extends CI_Model {

    public function __construct()
    {
        parent::__construct();
        $this->load->database();
    }

    // Listing all administrasi
    public function guru()
    {
        $this->db->select('absen_guru.*,
                           guru.*');
        $this->db->from('absen_guru');
        // JOIN
        $this->db->join('guru','guru.nip = absen_guru.nip','inner');
        $query = $this->db->get();
        return $query->result();
    }

    function datakehadiran($tahun,$bulan)
    {
        $this->db->select('*');
        $this->db->from('absen_guru');
        $this->db->where('YEAR(tanggal) = '.$tahun.' AND MONTH(tanggal) = '.$bulan.'');
        $query = $this->db->get();
        return $query->result();
    }

    public function detail_siswa($nip)
    {
        $this->db->select('*');
        $this->db->from('administrasi');
        //Join
        $this->db->where('nip', $nip);
        $this->db->order_by('nip', 'asc');
        $query = $this->db->get();
        return $query->row();
    }

    public function riwayat($nip)
    {
        $this->db->select('absen_guru.*,
                           metode_kehadiran.*,
                           guru.*');
        $this->db->from('absen_guru');
        //Join
        $this->db->join('guru','guru.nip = absen_guru.nip','inner');
        $this->db->join('metode_kehadiran','metode_kehadiran.metode = absen_guru.metode','inner');
        $this->db->where('absen_guru.nip', $nip);
        $this->db->order_by('absen_guru.nip', 'asc');
        $query = $this->db->get();
        return $query->result();
    }

    // Tambah Absensi Administrasi
    public function tambah($data)
    {
        $this->db->insert('absen_guru',  $data);
    }

    // Delete Administrasi
    public function delete($data)
    {
        $this->db->where('nip', $data['nip']);
        $this->db->delete('absen_guru', $data);
    }

    // Total kehadiran
    public function total_kehadiran($nip)
    {
        $this->db->select('*');
        $this->db->from('absen_guru');
        $this->db->where('nip', $nip);
        $query = $this->db->get();
        return $query->num_rows();
    }
    
}
?>