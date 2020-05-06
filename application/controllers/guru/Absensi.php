<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Absensi extends CI_Controller {

    // Load Model
    public function __construct()
    {
        parent::__construct();
        $this->load->model('absen_guru_model');
        $this->load->model('guru_model');
        $this->load->model('konfigurasi_model');
        // Proteksi Halaman
        $this->simple_login_guru->cek_login();
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

        $hasil_absen = $this->absen_guru_model->datakehadiran($tahun,$bulan);

        $kode_guru = $this->session->userdata('kode_guru');
        $guru = $this->guru_model->detail($kode_guru);
        $data = array(  'title'         =>  'Laporan Data Absensi Guru',
                        'guru'          =>  $guru,
                        'tgl'           =>  $tgl,
                        'bulan_txt'     =>  $bulan_txt,
                        'hasil_absen'   =>  $hasil_absen,
                        'tahun'         =>  $tahun,
                        'konfigurasi'   =>  $konfigurasi,
                        'tgl_akhir'     =>  $tgl_akhir,
                        'hasil_arr'     =>  $hasil_arr,
                        'isi'           =>  'guru/absensi/list'
                    );
        $this->load->view('guru/layout/wrapper', $data, false);
    }
}
?>