<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Jurusan extends CI_Controller {

    // Load Model
    public function __construct()
    {
        parent::__construct();
        $this->load->model('jurusan_model');
        $this->load->model('tatausaha_model');
        $this->load->model('spp_model');
        $this->load->model('konfigurasi_model');
        // Proteksi Halaman
        $this->simple_login_tata_usaha->cek_login();
    }

    // Data Jurusan
    public function index()
    {
        $konfigurasi = $this->konfigurasi_model->listing();
        $kode_administrasi = $this->session->userdata('kode_administrasi');
        $tata_usaha = $this->tatausaha_model->listing($kode_administrasi);

        $jurusan = $this->jurusan_model->listing();
        $data = array(  'title'     =>  'Data Jurusan',
                        'jurusan'   =>  $jurusan,
                        'konfigurasi'   =>  $konfigurasi,
                        'tata_usaha'    =>  $tata_usaha,
                        'isi'       =>  'tata_usaha/jurusan/list'
                     );
        $this->load->view('tata_usaha/layout/wrapper', $data, false);
    }

    // Tambah Jurusan
    public function tambah()
    {
        $kode_administrasi = $this->session->userdata('kode_administrasi');
        $tata_usaha = $this->tatausaha_model->listing($kode_administrasi);

        // Ambil data jurusan
        $jurusan = $this->jurusan_model->listing();
        $spp = $this->spp_model->listing();
        $konfigurasi = $this->konfigurasi_model->listing();
        // Validasi input
        $valid = $this->form_validation;

        $valid->set_rules('nama', 'Nama Jurusan', 'required',
                    array('required' => "%s Harus diisi"));

        $valid->set_rules('spp', 'SPP', 'required',
                    array('required' => "%s Harus diisi"));

        if($valid->run()===false){
            // End Validasi

            $data = array(  'title'     =>  'Tambah Jurusan',
                            'jurusan'   =>  $jurusan,
                            'spp'       =>  $spp,
                            'konfigurasi'   =>  $konfigurasi,
                            'tata_usaha'    =>  $tata_usaha,
                            'isi'       =>  'tata_usaha/jurusan/tambah'
                         );
            $this->load->view('tata_usaha/layout/wrapper', $data, false);
            // Masuk Database
        }else{
            $i = $this->input;

            $data = array(  'nama_jurusan'  =>  $i->post('nama'),
                            'jumlah'        =>  $i->post('spp')
                         );
            $this->jurusan_model->tambah($data);
            $this->session->set_flashdata('sukses', 'Data telah ditambah');
            redirect(base_url('tata_usaha/jurusan'), 'refresh');
        }
        // Akhir masuk database 
        $data = array(  'title'     =>  'Tambah Jurusan',
                        'jurusan'   =>  $jurusan,
                        'spp'       =>  $spp,
                        'konfigurasi'   =>  $konfigurasi,
                        'tata_usaha'    =>  $tata_usaha,
                        'isi'       =>  'tata_usaha/jurusan/tambah'
                        );
        $this->load->view('tata_usaha/layout/wrapper', $data, false);
    }

    // Edit Jurusan
    public function edit($nama_jurusan)
    {
        $konfigurasi = $this->konfigurasi_model->listing();
        $kode_administrasi = $this->session->userdata('kode_administrasi');
        $tata_usaha = $this->tatausaha_model->listing($kode_administrasi);

        // Ambil data jurusan yang akan diedit
        $jurusan = $this->jurusan_model->detail($nama_jurusan);
        $spp = $this->spp_model->listing();
        // Validasi input
        $valid = $this->form_validation;

        $valid->set_rules('nama', 'Nama Jurusan', 'required',
                    array('required' => "%s Harus diisi"));

        if($valid->run()===false){
            // Akhir validasi

            $data = array(  'title'     =>  'Edit Jurusan',
                            'jurusan'   =>  $jurusan,
                            'spp'       =>  $spp,
                            'konfigurasi'   =>  $konfigurasi,
                            'tata_usaha'    =>  $tata_usaha,
                            'isi'       =>  'tata_usaha/jurusan/edit'
                         );
            $this->load->view('tata_usaha/layout/wrapper', $data, false);
            // Masuk Database
        }else{
            $i = $this->input;

            $data = array(  'nama_jurusan'  =>  $i->post('nama'),
                            'kode_jurusan'  =>  $nama_jurusan,
                            'jumlah'        =>  $i->post('spp')
                         );
            $this->jurusan_model->edit($data);
            $this->session->set_flashdata('sukses', 'Data telah diedit');
            redirect(base_url('tata_usaha/jurusan'), 'refresh');
        }
        // Akhir masuk database

        $data = array(  'title'         =>  'Edit Jurusan',
                        'jurusan'       =>  $jurusan,
                        'spp'           =>  $spp,
                        'konfigurasi'   =>  $konfigurasi,
                        'tata_usaha'    =>  $tata_usaha,
                        'isi'           =>  'tata_usaha/jurusan/edit'
                        );
        $this->load->view('tata_usaha/layout/wrapper', $data, false);
    }

    // Delete Jurusan
    public function delete($kode_jurusan)
    {
        $data = array(  'kode_jurusan'  =>  $kode_jurusan);

        $this->jurusan_model->delete($data);
        $this->session->set_flashdata('sukses', 'Data telah dihapus');
        redirect(base_url('tata_usaha/jurusan'), 'refresh');
    }
}
?>