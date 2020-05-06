<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Menu extends CI_Controller{
	
	// Load Model
    public function __construct()
    {
        parent::__construct();
        $this->load->model('konfigurasi_model');
    }
    
    public function index()
    {
        $konfigurasi = $this->konfigurasi_model->listing();
        $data = array(  'title' =>  'Labcreative',
        				'konfigurasi'	=>	$konfigurasi,
                     );
        $this->load->view('menu/list', $data, false);
    }

}