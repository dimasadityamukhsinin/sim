<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Dashboard extends CI_Controller {

    // Load Model
    public function __construct()
    {
        parent::__construct();
        $this->load->model('guru_model');
        $this->load->model('pmb_model');
        $this->load->model('catatan_model');
        $this->load->model('datasiswa_model');
        $this->load->model('konfigurasi_model');
        // Proteksi Halaman
        $this->simple_login_guru->cek_login();
    }

    // Halaman Dashboard
    public function index() 
    {
        $konfigurasi = $this->konfigurasi_model->listing();
        $kode_guru = $this->session->userdata('kode_guru');
        $guru = $this->guru_model->detail($kode_guru);
        $jabatan = $this->datasiswa_model->hitung_jabatan($kode_guru);
        // Catatan
        $catatan = $this->catatan_model->listing();
        // Ambil data login nis dari session
        $data = array(  'title'             => 'Halaman Guru',
                        'guru'              =>  $guru,
                        'konfigurasi'       =>  $konfigurasi,
                        'jabatan'           =>  $jabatan,
                        'catatan'           =>  $catatan,
                        'isi'               => 'guru/dashboard/list');
        $this->load->view('guru/layout/wrapper', $data, FALSE);
    }
}
?>