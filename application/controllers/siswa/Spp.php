<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Spp extends CI_Controller {

    // Load Model
    public function __construct()
    {
        parent::__construct();
        $this->load->model('spp_model');
        $this->load->model('siswa_model');
        $this->load->model('konfigurasi_model');
        // Proteksi Halaman
        $this->simple_login_tata_usaha->cek_login();
        $this->simple_login_siswa->cek_login();
        $this->simple_login_guru->cek_login();
    }

    // Data Absensi Siswa
    public function index() 
    {

        $nis = $this->session->userdata('nis');
        $siswa = $this->siswa_model->siswa($nis);

        $konfigurasi = $this->konfigurasi_model->listing();
        $spp = $this->spp_model->detail($nis);
        $data = array(  'title'         =>  'Data Pembayaran SPP Siswa',
                        'siswa'         =>  $siswa,
                        'konfigurasi'   =>  $konfigurasi,
                        'spp'           =>  $spp,
                        'isi'           =>  'siswa/spp/list'
                     );
        $this->load->view('siswa/layout/wrapper', $data, false);
    }
}
?>