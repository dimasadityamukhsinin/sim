<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Absen_administrasi_model extends CI_Model {

    public function __construct()
    {
        parent::__construct();
        $this->load->database();
    }

    // Listing all administrasi
    public function administrasi()
    {
        $this->db->select('absen_administrasi.*,
                           administrasi.*');
        $this->db->from('absen_administrasi');
        // JOIN
        $this->db->join('administrasi','administrasi.nip = absen_administrasi.nip','inner');
        $query = $this->db->get();
        return $query->result();
    }

    function datakehadiran_administrasi($tahun,$bulan)
    {
        $this->db->select('*');
        $this->db->from('absen_administrasi');
        $this->db->where('YEAR(tanggal) = '.$tahun.' AND MONTH(tanggal) = '.$bulan.'');
        $query = $this->db->get();
        return $query->result();
    }

    public function detail_administrasi($nip)
    {
        $this->db->select('*');
        $this->db->from('administrasi');
        //Join
        $this->db->where('nip', $nip);
        $this->db->order_by('nip', 'asc');
        $query = $this->db->get();
        return $query->row();
    }

    public function riwayat_administrasi($nip)
    {
        $this->db->select('absen_administrasi.*,
                           metode_kehadiran.*');
        $this->db->from('absen_administrasi');
        //Join
        $this->db->join('metode_kehadiran','metode_kehadiran.metode = absen_administrasi.metode','inner');
        $this->db->where('absen_administrasi.nip', $nip);
        $query = $this->db->get();
        return $query->result();
    }

    // Tambah Absensi Administrasi
    public function tambah_administrasi($data)
    {
        $this->db->insert('absen_administrasi',  $data);
    }

    // Delete Administrasi
    public function delete_administrasi($data)
    {
        $this->db->where('nip', $data['nip']);
        $this->db->delete('absen_administrasi', $data);
    }
    
}
?>