<?php 
defined('BASEPATH') OR exit('No direct script access allowed');

class Tatausaha_model extends CI_Model {
    
    public function __construct() 
    {
        parent::__construct();
        $this->load->database();
    }

    //Listing all Tata Usaha
    public function listing($kode_administrasi)
    {
        $this->db->select('*');
        $this->db->from('administrasi');
        $this->db->where('administrasi.kode_administrasi', $kode_administrasi);
        $this->db->order_by('kode_administrasi',  'asc');
        $query = $this->db->get();
        return $query->row();
    }

    //Listing all Tata Usaha
    public function administrasi()
    {
        $this->db->select('*');
        $this->db->from('administrasi');
        $this->db->order_by('nama_administrasi');
        $query = $this->db->get();
        return $query->result();
    }

    public function absen($nip)
    {
        $this->db->select('*');
        $this->db->from('administrasi');
        $this->db->where('nip',$nip);
        $query = $this->db->get();
        return $query->row();
    }

    //Login Tata Usaha
    public function login($username,$password)
    {
        $this->db->select('*');
        $this->db->from('administrasi');
        // JOIN
        $this->db->where(array('nip' => $username,
                               'password' => $password));
        $this->db->order_by('kode_administrasi', 'desc');
        $query = $this->db->get();
        return $query->row();
    }

    public function hitung_siswa()
    {
        $this->db->select('*');
        $this->db->from('siswa');
        $query = $this->db->get();
        return $query->num_rows();
    }

    public function hitung_guru()
    {
        $this->db->select('*');
        $this->db->from('guru');
        $query = $this->db->get();
        return $query->num_rows();
    }
}
?>