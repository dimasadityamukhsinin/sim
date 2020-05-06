<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Qrcode extends CI_Controller {

    // Load Model
    public function __construct()
    {
        parent::__construct();
        $this->load->model('qrcode_model');
        $this->load->model('guru_model');
        $this->load->model('konfigurasi_model');
        // Proteksi Halaman
        $this->simple_login_guru->cek_login();
    }

    // Halaman Catatan
    public function index()
    {
        $konfigurasi = $this->konfigurasi_model->listing();
        $kode_guru = $this->session->userdata('kode_guru');
        $guru = $this->guru_model->detail($kode_guru);
        $data = array(  'title' =>  'Generate QR Code',
                        'guru'  =>  $guru,
                        'konfigurasi'   =>  $konfigurasi,
                        'isi'   =>  'guru/qrcode/list'
                     );
        $this->load->view('guru/layout/wrapper', $data, false);
    }
}
?>