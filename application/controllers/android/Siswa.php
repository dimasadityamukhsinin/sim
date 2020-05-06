<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Siswa extends CI_Controller{

    // Load Model
    public function __construct()
    {
        parent::__construct();
        $this->load->model('siswa_model');
    }
    
    public function index()
    {
        $siswa     = $this->siswa_model->listing();
        echo json_encode($siswa);
    }

    public function detail($nis)
    {
        $siswa = $this->siswa_model->siswa($nis);
        echo json_encode($siswa);
    }

}
?>