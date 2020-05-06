<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Absen_siswa_model extends CI_Model {

    public function __construct()
    {
        parent::__construct();
        $this->load->database();
    }

    // Listing all administrasi
    public function siswa()
    {
        $this->db->select('absen_siswa.*,
                           siswa.*');
        $this->db->from('absen_siswa');
        // JOIN
        $this->db->join('siswa','siswa.nis = absen_siswa.nis','inner');
        $query = $this->db->get();
        return $query->result();
    }

    function datakehadiran($tahun,$bulan)
    {
        $this->db->select('*');
        $this->db->from('absen_siswa');
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

    public function riwayat($nis)
    {
        $this->db->select('absen_siswa.*,
                           metode_kehadiran.*,
                           siswa.*');
        $this->db->from('absen_siswa');
        //Join
        $this->db->join('siswa','siswa.nis = absen_siswa.nis','inner');
        $this->db->join('metode_kehadiran','metode_kehadiran.metode = absen_siswa.metode','inner');
        $this->db->where('absen_siswa.nis', $nis);
        $this->db->order_by('absen_siswa.nis', 'asc');
        $query = $this->db->get();
        return $query->result();
    }

    // Tambah Absensi Administrasi
    public function tambah($data)
    {
        $this->db->insert('absen_siswa',  $data);
    }

    // Delete Administrasi
    public function delete($data)
    {
        $this->db->where('nis', $data['nis']);
        $this->db->delete('absen_siswa', $data);
    }

    // Total kehadiran
    public function total_kehadiran($nis)
    {
        $this->db->select('*');
        $this->db->from('absen_siswa');
        $this->db->where('nis', $nis);
        $query = $this->db->get();
        return $query->num_rows();
    }
    
}
?>