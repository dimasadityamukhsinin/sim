<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Login_model extends CI_Model {

    public function __construct()
    {
        parent::__construct();
        $this->load->database();
    }

    public function listing($nis,$password) 
    {

        $result = $this->db->query("SELECT *
                                    FROM
                                        siswa
                                    WHERE
                                        nis = '$nis'
                                    AND PASSWORD = '$password'");
        return $result->result_array();
    }
}
?>