<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Pembangunan extends CI_Controller {

    // Load Model
    public function __construct()
    {
        parent::__construct();
        $this->load->model('pmb_model');
        $this->load->model('konfigurasi_model');
        // Proteksi Halaman
        $this->simple_login_siswa->cek_login();
    }

    // Data Absensi Siswa
    public function index() 
    {
        $konfigurasi = $this->konfigurasi_model->listing();
        $nis = $this->session->userdata('nis');
        $siswa = $this->pmb_model->detail($nis);
        $total_dana = $this->pmb_model->total_masuk($nis);
        $sisa_pmb = $this->pmb_model->sisa_pmb($nis);
        $data = array(  'title'         =>  'Data Pembayaran Pembangunan Siswa',
                        'siswa'         =>  $siswa,
                        'konfigurasi'   =>  $konfigurasi,
                        'total_dana'    =>  $total_dana,
                        'sisa_pmb'      =>  $sisa_pmb,
                        'isi'           =>  'siswa/pembangunan/list'
                     );
        $this->load->view('siswa/layout/wrapper', $data, false);
    }
}
?>