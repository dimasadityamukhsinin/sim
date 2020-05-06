<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Absen_siswa extends CI_Controller {

    // Load Model
    public function __construct()
    {
        parent::__construct();
        $this->load->model('absen_siswa_model');
        $this->load->model('konfigurasi_model');
        $this->load->model('siswa_model');
        $this->load->model('metodekehadiran_model');
        // Proteksi Halaman
        $this->simple_login_tata_usaha->cek_login();
    }

    // Halaman Absen Administrasi
    public function index()
    {
        $konfigurasi = $this->konfigurasi_model->listing();
        $kode_administrasi = $this->session->userdata('kode_administrasi');
        $tata_usaha = $this->tatausaha_model->listing($kode_administrasi);
        $siswa = $this->siswa_model->listing();
        $data = array(  'title'         =>  'Absensi Siswa',
                        'siswa'         =>  $siswa,
                        'konfigurasi'   =>  $konfigurasi,
                        'tata_usaha'    =>  $tata_usaha,
                        'isi'           =>  'tata_usaha/absen_siswa/list'
                     );
        $this->load->view('tata_usaha/layout/wrapper', $data, false);
    }

    //Tambah Absen
    public function tambah($nis)
    {
        $kode_administrasi = $this->session->userdata('kode_administrasi');
        $tata_usaha = $this->tatausaha_model->listing($kode_administrasi);

        $siswa = $this->siswa_model->siswa($nis);
        $metode = $this->metodekehadiran_model->listing();
        $konfigurasi = $this->konfigurasi_model->listing();
        //validasi input
        $valid      = $this->form_validation;
        
        $valid->set_rules('nis', 'NIS', 'required',
                    array('required'    =>  "%s Harus diisi"));

        $valid->set_rules('jam', 'Jam', 'required',
                    array('required'    =>  "%s Harus diisi"));

        $valid->set_rules('tanggal', 'Tanggal', 'required',
                    array('required'    =>  "%s Harus diisi"));

        $valid->set_rules('metode', 'Metode', 'required',
                    array('required'    =>  "%s Harus diisi"));

        $valid->set_rules('status_kehadiran', 'Status Kehadiran', 'required',
                    array('required'    =>  "%s Harus diisi"));
        
        if($valid->run()===false){
            //Akhir Validasi
        
        $data = array(  'title'         =>  'Tambah Absen',
                        'siswa'         =>  $siswa,
                        'konfigurasi'   =>  $konfigurasi,
                        'metode'        =>  $metode,
                        'tata_usaha'    =>  $tata_usaha,
                        'isi'           =>  'tata_usaha/absen_siswa/tambah'
                     );
        $this->load->view('tata_usaha/layout/wrapper', $data, false);
        //masuk database
        }else{
            $i = $this->input;
            
            $data = array(  'nis'               =>  $nis,
                            'jam'               =>  $i->post('jam'),
                            'tanggal'           =>  $i->post('tanggal'),
                            'metode'            =>  $i->post('metode'),
                            'status_kehadiran'  =>  $i->post('status_kehadiran')
                         );
            $this->absen_siswa_model->tambah($data);
            $this->session->set_flashdata('sukses', 'Data telah ditambah');
            redirect(base_url('tata_usaha/absen_siswa/riwayat/'.$nis), 'refresh');
        }
        //akhir masuk database
            
        $data = array(  'title'         =>  'Tambah Absen',
                        'siswa'         =>  $siswa,
                        'konfigurasi'   =>  $konfigurasi,
                        'metode'        =>  $metode,
                        'tata_usaha'    =>  $tata_usaha,
                        'isi'           =>  'tata_usaha/absen_siswa/tambah'
                     );
        $this->load->view('tata_usaha/layout/wrapper', $data, false);
    }

    //Riwayat Absen
    public function riwayat($nis)
    {
        $kode_administrasi = $this->session->userdata('kode_administrasi');
        $tata_usaha = $this->tatausaha_model->listing($kode_administrasi);

        $absen = $this->absen_siswa_model->riwayat($nis);
        $konfigurasi = $this->konfigurasi_model->listing();
        $data = array(  'title'     =>  'Riwayat Absen',
                        'absen'     =>  $absen,
                        'konfigurasi'   =>  $konfigurasi,
                        'tata_usaha'    =>  $tata_usaha,
                        'isi'       =>  'tata_usaha/absen_siswa/riwayat'
                     );
        $this->load->view('tata_usaha/layout/wrapper', $data, false);
    }

    // Laporan
    public function laporan()
    {
        $bulan = date("m");
        $tahun = date("Y");	
        $tgl = date_create($tahun.'-'.$bulan.'-01');
        $bulan_txt = date_format($tgl, "F");
        $tgl_akhir = date("t");
        $hasil_arr = array();

        $hasil_absen = $this->absen_siswa_model->datakehadiran($tahun,$bulan);

        $kode_administrasi = $this->session->userdata('kode_administrasi');
        $tata_usaha = $this->tatausaha_model->listing($kode_administrasi);
        $konfigurasi = $this->konfigurasi_model->listing();

        $siswa = $this->siswa_model->listing();
        $data = array(  'title'         =>  'Laporan Data Absensi Siswa',
                        'siswa'         =>  $siswa,
                        'tata_usaha'    =>  $tata_usaha,
                        'tgl'           =>  $tgl,
                        'bulan_txt'     =>  $bulan_txt,
                        'hasil_absen'   =>  $hasil_absen,
                        'tahun'         =>  $tahun,
                        'tgl_akhir'     =>  $tgl_akhir,
                        'hasil_arr'     =>  $hasil_arr,
                        'konfigurasi'   =>  $konfigurasi,
                        'isi'           =>  'tata_usaha/absen_siswa/laporan'
                    );
        $this->load->view('tata_usaha/layout/wrapper', $data, false);
    }

    // Delete Absen administrasi
    public function delete($nis,$jam,$tanggal,$metode)
    {
        $data = array('nis'     => $nis,
                      'jam'     =>  $jam,
                      'tanggal' =>  $tanggal,
                      'metode'  =>  $metode
                     );

        $this->absen_siswa_model->delete($data);
        $this->session->set_flashdata('sukses', 'Data telah dihapus');
        redirect(base_url('tata_usaha/absen_siswa/riwayat/'.$nis), 'refresh');
    }
}
?>