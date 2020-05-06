<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Absen_siswa extends CI_Controller {

    // Load Model
    public function __construct()
    {
        parent::__construct();
        $this->load->model('absen_siswa_model');
        $this->load->model('konfigurasi_model');
        // Proteksi Halaman
        $this->simple_login_tata_usaha->cek_login();
    }

    // Absen Siswa
    public function index()
    {
        $konfigurasi = $this->konfigurasi_model->listing();
        $absen = $this->absen_siswa_model->siswa();
        $data = array(  'title' =>  'Absensi Siswa',
                        'absen'    =>  $absen,
                        'konfigurasi'   =>  $konfigurasi,
                     );
        $this->load->view('absen_siswa', $data, false);
    }
}
?>