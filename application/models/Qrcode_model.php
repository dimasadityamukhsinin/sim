<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Qrcode_model extends CI_Model {
    
    public function __construct() 
    {
        parent::__construct();
        $this->load->database();
    }
    
    //
    public function tambah($data)
    {  
        $jam = date("H:i:s");
        $data_absen = $data;
        $data = array(  'data'   =>  $data_absen,
        'jam' =>  $jam); 
        $this->db->insert('qrcode', $data);
    }
}