<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Absen_administrasi extends CI_Controller {

    // Load Model
    public function __construct()
    {
        parent::__construct();
        $this->load->model('absen_administrasi_model');
        $this->load->model('konfigurasi_model');
        // Proteksi Halaman
        $this->simple_login_tata_usaha->cek_login();
    }

    // Absen Siswa
    public function index()
    {
        $konfigurasi = $this->konfigurasi_model->listing();
        $absen = $this->absen_administrasi_model->administrasi();
        $data = array(  'title' =>  'Absensi Administrasi',
                        'absen'    =>  $absen,
                        'konfigurasi'   =>  $konfigurasi,
                     );
        $this->load->view('absen_administrasi', $data, false);
    }
}
?>