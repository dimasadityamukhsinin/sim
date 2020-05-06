<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Absen_guru extends CI_Controller {

    // Load Model
    public function __construct()
    {
        parent::__construct();
        $this->load->model('absen_guru_model');
        $this->load->model('konfigurasi_model');
        // Proteksi Halaman
        $this->simple_login_tata_usaha->cek_login();
    }

    // Absen Siswa
    public function index()
    {
        $konfigurasi = $this->konfigurasi_model->listing();
        $absen = $this->absen_guru_model->guru();
        $data = array(  'title' =>  'Absensi Guru',
                        'absen'    =>  $absen,
                        'konfigurasi'   =>  $konfigurasi,
                     );
        $this->load->view('absen_guru', $data, false);
    }
}
?>