<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Scanabsen_siswa_model extends CI_Model {
    
    public function __construct() 
    {
        parent::__construct();
        $this->load->database();
    }

    function scanmasuk_hadir($nis)
    {
        if($this->cekabsen($nis)) {
            $nis_siswa = $nis;
            $tanggal = date("Y-m-d");
            $jam = date("H:i:s");
            $metode = "1";
            $status_kehadiran = "hadir";
            $data = array(  'nis'   =>  $nis_siswa,
            'tanggal'   =>  $tanggal,
            'jam'       =>  $jam,
            'metode'    =>  $metode,
            'status_kehadiran'  =>  $status_kehadiran ); 
            return $this->db->insert('absen_siswa', $data);
        }else{
            return false;
        }
    }

    function scanmasuk_terlambat($nis)
    {
        if($this->cekabsen($nis)) {
            $nis_siswa = $nis;
            $tanggal = date("Y-m-d");
            $jam = date("H:i:s");
            $metode = "1";
            $status_kehadiran = "terlambat";
            $data = array(  'nis'   =>  $nis_siswa,
            'tanggal'   =>  $tanggal,
            'jam'       =>  $jam,
            'metode'    =>  $metode,
            'status_kehadiran'  =>  $status_kehadiran); 
            return $this->db->insert('absen_siswa', $data);
        }else{
            return false;
        }
    }

    function hadir($nip)
    {
        $nip_karyawan = $nip;
        $date = date("Y-m-d");
        $status_kehadiran = "hadir";
        $data = array(  'nip'   =>  $nip_karyawan,
        'status_kehadiran'    =>  $status_kehadiran ); 
        $this->db->where('nip', $nip_karyawan);
        $this->db->where('tanggal', $date);
        return $this->db->update('absen_administrasi', $data);
    }

    function cekabsen($nis)
    {
        $date = date("Y-m-d");
        $this->db->select('nis');
        $this->db->from('absen_siswa');
        $this->db->where('tanggal', $date);
        $this->db->where('nis', $nis);
        $query = $this->db->get();
        $jml = $query->num_rows();
        if($jml > 0) {
            return false;
        }else{
            return true;
        }
    }
}
?>