<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Scanabsen_guru_model extends CI_Model {
    
    public function __construct() 
    {
        parent::__construct();
        $this->load->database();
    }

    function scanmasuk_hadir($nip)
    {
        if($this->cekabsen($nip)) {
            $nip_guru = $nip;
            $tanggal = date("Y-m-d");
            $jam = date("H:i:s");
            $metode = "1";
            $status_kehadiran = "hadir";
            $data = array(  'nip'   =>  $nip_guru,
            'tanggal'   =>  $tanggal,
            'jam'       =>  $jam,
            'metode'    =>  $metode,
            'status_kehadiran'  =>  $status_kehadiran ); 
            return $this->db->insert('absen_guru', $data);
        }else{
            return false;
        }
    }

    function scanmasuk_terlambat($nip)
    {
        if($this->cekabsen($nip)) {
            $nip_guru = $nip;
            $tanggal = date("Y-m-d");
            $jam = date("H:i:s");
            $metode = "1";
            $status_kehadiran = "terlambat";
            $data = array(  'nip'   =>  $nip_guru,
            'tanggal'   =>  $tanggal,
            'jam'       =>  $jam,
            'metode'    =>  $metode,
            'status_kehadiran'  =>  $status_kehadiran); 
            return $this->db->insert('absen_guru', $data);
        }else{
            return false;
        }
    }

    function cekabsen($nip)
    {
        $date = date("Y-m-d");
        $this->db->select('nip');
        $this->db->from('absen_guru');
        $this->db->where('tanggal', $date);
        $this->db->where('nip', $nip);
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