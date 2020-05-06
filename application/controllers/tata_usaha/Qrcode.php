<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Qrcode extends CI_Controller {

    // Load Model
    public function __construct()
    {
        parent::__construct();
        $this->load->model('qrcode_model');
        $this->load->model('konfigurasi_model');
        // Proteksi Halaman
        $this->simple_login_tata_usaha->cek_login();
    }

    // Halaman Catatan
    public function index()
    {
        $konfigurasi = $this->konfigurasi_model->listing();
        $kode_administrasi = $this->session->userdata('kode_administrasi');
        $tata_usaha = $this->tatausaha_model->listing($kode_administrasi);
        $data = array(  'title' =>  'Generate QR Code',
                        'tata_usaha'    =>  $tata_usaha,
                        'konfigurasi'   =>  $konfigurasi,
                        'isi'       =>  'tata_usaha/qrcode/list'
                     );
        $this->load->view('tata_usaha/layout/wrapper', $data, false);
    }
}
?>