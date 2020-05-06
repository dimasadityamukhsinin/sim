<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Profile extends CI_Controller {

    // Load Model
    public function __construct()
    {
        parent::__construct();
        $this->load->model('profile_model');
        $this->load->model('siswa_model');
        $this->load->model('konfigurasi_model');
        // Proteksi Halaman
        $this->simple_login_siswa->cek_login();
    }

    // Profile
    public function index()
    {
        $konfigurasi = $this->konfigurasi_model->listing();
        $nis = $this->session->userdata('nis');
        $siswa = $this->siswa_model->siswa($nis);
        $data = array(  'title'         => 'Profile',
                        'siswa'         =>  $siswa,
                        'konfigurasi'   =>  $konfigurasi,
                        'isi'           => 'siswa/profile/list'  );
        $this->load->view('siswa/layout/wrapper',$data,FALSE);
    }

}
?>