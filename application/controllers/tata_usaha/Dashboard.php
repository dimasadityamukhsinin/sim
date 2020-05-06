<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Dashboard extends CI_Controller {

    // Load Model
    public function __construct()
    {
        parent::__construct();
        $this->load->model('tatausaha_model');
        $this->load->model('catatan_model');
        $this->load->model('tahun_ajaran_model');
        $this->load->model('dana_model');
        $this->load->model('kelas_model');
        $this->load->model('konfigurasi_model');
        // Proteksi Halaman
        $this->simple_login_tata_usaha->cek_login();
    }

    // Halaman Dashboard
    public function index()
    {
        $konfigurasi = $this->konfigurasi_model->listing();
        // Hitung kelas
        $kelas = $this->kelas_model->hitung_kelas();
        // Hitung Dana
        $dana_masuk = $this->dana_model->total_masuk();
        $dana_keluar = $this->dana_model->total_keluar();
        // Tahun Ajaran
        $tahun = $this->tahun_ajaran_model->listing();
        // Catatan
        $catatan = $this->catatan_model->listing();
        // Hitung Guru
        $hitung_guru = $this->tatausaha_model->hitung_guru();
        // Hitung Siswa
        $hitung_siswa = $this->tatausaha_model->hitung_siswa();
        $kode_administrasi = $this->session->userdata('kode_administrasi');
        $tata_usaha = $this->tatausaha_model->listing($kode_administrasi);
        $data = array(  'title' => 'Halaman Tata Usaha',
                        'catatan'   =>  $catatan,
                        'kelas'     =>  $kelas,
                        'dana_masuk'    =>  $dana_masuk,
                        'dana_keluar'    =>  $dana_keluar,
                        'tahun'     =>  $tahun,
                        'konfigurasi'   =>  $konfigurasi,
                        'hitung_guru'   =>  $hitung_guru,
                        'hitung_siswa'  =>  $hitung_siswa,
                        'tata_usaha'    =>  $tata_usaha,
                        'isi'   => 'tata_usaha/dashboard/list');
        $this->load->view('tata_usaha/layout/wrapper', $data, FALSE);
    }
}
?>