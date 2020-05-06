<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Dashboard extends CI_Controller {

    // Load Model
    public function __construct()
    {
        parent::__construct();
        $this->load->model('kelas_model');
        $this->load->model('siswa_model');
        $this->load->model('pmb_model');
        $this->load->model('absen_siswa_model');
        $this->load->model('konfigurasi_model');
        // Proteksi Halaman
        $this->simple_login_siswa->cek_login();
    }

    // Halaman Dashboard
    public function index() 
    {
        $konfigurasi = $this->konfigurasi_model->listing();
        $nis = $this->session->userdata('nis');
        $siswa = $this->siswa_model->siswa($nis);
        $total_pmb = $this->pmb_model->total_masuk($nis);
        $total_kehadiran = $this->absen_siswa_model->total_kehadiran($nis);
        // Ambil data login nis dari session
        $data = array(  'title'             => 'Halaman Siswa',
                        'siswa'             =>  $siswa,
                        'konfigurasi'       =>  $konfigurasi,
                        'total_kehadiran'   =>  $total_kehadiran,
                        'total_pmb'         =>  $total_pmb,
                        'isi'               => 'siswa/dashboard/list');
        $this->load->view('siswa/layout/wrapper', $data, FALSE);
    }
}
?>