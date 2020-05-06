<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Kelas_siswa extends CI_Controller {

    // Load Model
    public function __construct()
    {
        parent::__construct();
        $this->load->model('kelas_model');
        $this->load->model('jurusan_model');
        $this->load->model('siswa_model');
        $this->load->model('tatausaha_model');
        $this->load->model('konfigurasi_model');
        // Proteksi Halaman
        $this->simple_login_tata_usaha->cek_login();
    }

    // Data Kelas Siswa
    public function index() 
    {
        $konfigurasi = $this->konfigurasi_model->listing();
        $kode_administrasi = $this->session->userdata('kode_administrasi');
        $tata_usaha = $this->tatausaha_model->listing($kode_administrasi);
        
        $kelas = $this->kelas_model->listing();
        $data = array(  'title' =>  'Data Kelas Siswa',
                        'kelas' =>  $kelas,
                        'konfigurasi'   =>  $konfigurasi,
                        'tata_usaha'    =>  $tata_usaha,
                        'isi'   =>  'tata_usaha/kelas_siswa/list'
                     );
        $this->load->view('tata_usaha/layout/wrapper', $data, false);
    }

        //Tambah produk
    public function tambah($kode_siswa)
    {
        $konfigurasi = $this->konfigurasi_model->listing();
        $kode_administrasi = $this->session->userdata('kode_administrasi');
        $tata_usaha = $this->tatausaha_model->listing($kode_administrasi);

        // Ambil data kelas
        $kelas = $this->kelas_model->kelas();
        //Ambil data siswa
        $siswa     = $this->siswa_model->detail($kode_siswa);
        
        //Validasi input
        $valid = $this->form_validation;
        
        $valid->set_rules('nis', 'NIS', 'required',
                    array('required'    =>  "%s Harus diisi"));

        $valid->set_rules('kelas', 'Kelas Siswa', 'required',
                    array('required'    =>  "%s Harus diisi"));
        
        if($valid->run()===false){
            //End validasi
            
        $data = array(	'title' => 'Tambah Kelas Siswa',
                        'siswa'  =>  $siswa,
                        'kelas' =>  $kelas,
                        'konfigurasi'   =>  $konfigurasi,
                        'tata_usaha'    =>  $tata_usaha,
                        'isi'      => 'tata_usaha/kelas_siswa/tambah');
        $this->load->view('tata_usaha/layout/wrapper',$data,FALSE);
        //Masuk Database
        }else{
	    $i = $this->input;   
            
            $data = array(  'nis'           =>  $i->post('nis'),
                            'kode_kelas' =>  $i->post('kelas'),
                         );
            $this->kelas_model->tambah($data);
            $this->session->set_flashdata('sukses','Data telah ditambah');
            redirect(base_url('tata_usaha/kelas_siswa'),'refresh');
        }
        $data = array(	'title' => 'Tambah Kelas Siswa',
                        'siswa'  =>  $siswa,
                        'kelas' =>  $kelas,
                        'konfigurasi'   =>  $konfigurasi,
                        'tata_usaha'    =>  $tata_usaha,
                        'isi'      => 'tata_usaha/kelas_siswa/tambah');
        $this->load->view('tata_usaha/layout/wrapper',$data,FALSE);
    }

    //Edit siswa
    public function edit($kode_siswa)
    {
        $konfigurasi = $this->konfigurasi_model->listing();
        $kode_administrasi = $this->session->userdata('kode_administrasi');
        $tata_usaha = $this->tatausaha_model->listing($kode_administrasi);

        // Ambil data kelas
        $kelas = $this->kelas_model->kelas();
        //Ambil data siswa
        $siswa     = $this->siswa_model->detail($kode_siswa);
        
        //validasi input
        $valid      = $this->form_validation;

        $valid->set_rules('kelas', 'Kelas Siswa', 'required',
                    array('required'    =>  "%s Harus diisi"));
        
        if($valid->run()===false){
            //Akhir Validasi
        
        $data = array(	'title' => 'Tambah Kelas Siswa',
                        'siswa'  =>  $siswa,
                        'kelas' =>  $kelas,
                        'konfigurasi'   =>  $konfigurasi,
                        'tata_usaha'    =>  $tata_usaha,
                        'isi'      => 'tata_usaha/kelas_siswa/edit');
        $this->load->view('tata_usaha/layout/wrapper',$data,FALSE);
        //masuk database
        }else{
            $i = $this->input;
            
            $data = array(  'nis'       =>  $i->post('nis'),
                            'kode_kelas' =>  $i->post('kelas'),
                         );
            $this->kelas_model->edit($data);
            $this->session->set_flashdata('sukses', 'Data telah diedit');
            redirect(base_url('tata_usaha/kelas_siswa'), 'refresh');
        }
        //akhir masuk database
            
        $data = array(	'title' => 'Tambah Kelas Siswa',
                        'siswa'  =>  $siswa,
                        'kelas' =>  $kelas,
                        'konfigurasi'   =>  $konfigurasi,
                        'tata_usaha'    =>  $tata_usaha,
                        'isi'      => 'tata_usaha/kelas_siswa/tambah');
        $this->load->view('tata_usaha/layout/wrapper',$data,FALSE);
    }

    // Cetak Siswa
    public function cetak($kode_kelas)
    {
        $konfigurasi = $this->konfigurasi_model->listing();
        $siswa = $this->siswa_model->detail($kode_kelas);
        $data = array(  'title' =>  $kelas->tingkat_kelas,
                        'siswa'  =>  $siswa,
                        'konfigurasi'   =>  $konfigurasi,
                     );
        $this->load->view('tata_usaha/kelas_siswa/cetak', $data, false);
    }
    
    // Delete Jabatan
    public function delete($nis)
    {
        $data = array('nis' => $nis);

        $this->kelas_model->delete($data);
        $this->session->set_flashdata('sukses', 'Data telah dihapus');
        redirect(base_url('tata_usaha/kelas_siswa'), 'refresh');
    }

}
?>