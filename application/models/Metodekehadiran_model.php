<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class metodekehadiran_model extends CI_Model {

    public function __construct()
    {
        parent::__construct();
        $this->load->database();
    }

    // Listing all Metode kehadiran
    public function listing()
    {
        $this->db->select('*');
        $this->db->from('metode_kehadiran');
        $query = $this->db->get();
        return $query->result();
    }
}
?>