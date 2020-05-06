<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Absensi extends CI_Controller {

    // Load Model
    public function __construct()
    {
        parent::__construct();
        $this->load->model('absen_siswa_model');
        $this->load->model('siswa_model');
        $this->load->model('konfigurasi_model');
        // Proteksi Halaman
        $this->simple_login_siswa->cek_login();
    }

    // Data Absensi Siswa
    public function index() 
    {
        $konfigurasi = $this->konfigurasi_model->listing();
        $bulan = date("m");
        $tahun = date("Y");	
        $tgl = date_create($tahun.'-'.$bulan.'-01');
        $bulan_txt = date_format($tgl, "F");
        $tgl_akhir = date("t");
        $hasil_arr = array();

        $hasil_absen = $this->absen_siswa_model->datakehadiran($tahun,$bulan);

        $nis = $this->session->userdata('nis');
        $siswa = $this->siswa_model->siswa($nis);
        $data = array(  'title'         =>  'Laporan Data Absensi Siswa',
                        'siswa'         =>  $siswa,
                        'tgl'           =>  $tgl,
                        'konfigurasi'   =>  $konfigurasi,
                        'bulan_txt'     =>  $bulan_txt,
                        'hasil_absen'   =>  $hasil_absen,
                        'tahun'         =>  $tahun,
                        'tgl_akhir'     =>  $tgl_akhir,
                        'hasil_arr'     =>  $hasil_arr,
                        'isi'           =>  'siswa/absensi/list'
                    );
        $this->load->view('siswa/layout/wrapper', $data, false);
    }
}
?>