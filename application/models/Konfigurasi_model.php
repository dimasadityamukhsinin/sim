<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Konfigurasi_model extends CI_Model {
    
    public function __construct() 
    {
        parent::__construct();
        $this->load->database();
    }

    // Listing all konfigurasi
    public function listing()
    {
        $query = $this->db->get('konfigurasi');
        return $query->row();
    }

    public function edit($data)
    {
        $this->db->where('kode_konfigurasi', $data['kode_konfigurasi']);
        $this->db->update('konfigurasi', $data);
    }

    public function logo()
    {

    }
}
?>