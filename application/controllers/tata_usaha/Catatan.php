<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Catatan extends CI_Controller {

    // Load Model
    public function __construct()
    {
        parent::__construct();
        $this->load->model('catatan_model');
        $this->load->model('tatausaha_model');
        $this->load->model('konfigurasi_model');
        // Proteksi Halaman
        $this->simple_login_tata_usaha->cek_login();
    }

    // Halaman Catatan
    public function index()
    {
        $konfigurasi = $this->konfigurasi_model->listing();
        $kode_administrasi = $this->session->userdata('kode_administrasi');
        $tata_usaha = $this->tatausaha_model->listing($kode_administrasi);
        $catatan = $this->catatan_model->listing();
        $data = array(  'title' =>  'Halaman Catatan',
                        'catatan'   =>  $catatan,
                        'konfigurasi'   =>  $konfigurasi,
                        'tata_usaha'    =>  $tata_usaha,
                        'isi'       =>  'tata_usaha/catatan/list'
                     );
        $this->load->view('tata_usaha/layout/wrapper', $data, false);
    }

    //Tambah Catatan
    public function tambah()
    {
        $kode_administrasi = $this->session->userdata('kode_administrasi');
        $tata_usaha = $this->tatausaha_model->listing($kode_administrasi);
        $konfigurasi = $this->konfigurasi_model->listing();

        //Validasi input
        $valid = $this->form_validation;
        
        $valid->set_rules('judul', 'Judul', 'required',
                    array('required'    =>  "%s Harus diisi"));

        $valid->set_rules('tanggal', 'Tanggal', 'required',
                    array('required'    =>  "%s Harus diisi"));

        $valid->set_rules('jam', 'Jam', 'required',
                    array('required'    =>  "%s Harus diisi"));

        $valid->set_rules('isi', 'Isi', 'required',
                    array('required'    =>  "%s Harus diisi"));
        
        if($valid->run()===false){
            //End validasi
            
        $data = array(	'title' => 'Tambah Catatan',
                        'tata_usaha'    =>  $tata_usaha,
                        'konfigurasi'   =>  $konfigurasi,
                        'isi'      => 'tata_usaha/catatan/tambah');
        $this->load->view('tata_usaha/layout/wrapper',$data,FALSE);
        //Masuk Database
        }else{
	    $i = $this->input;   
            
            $data = array(  'judul_catatan' =>  $i->post('judul'),
                            'tanggal'       =>  $i->post('tanggal'),
                            'jam'           =>  $i->post('jam'),
                            'isi'           =>  $i->post('isi'),
                         );
            $this->catatan_model->tambah($data);
            $this->session->set_flashdata('sukses','Data telah ditambah');
            redirect(base_url('tata_usaha/catatan'),'refresh');
        }
        //Akhir masuk database
        $data = array(	'title' => 'Tambah Catatan',
                        'konfigurasi'   =>  $konfigurasi,
                        'tata_usaha'    =>  $tata_usaha,
                        'isi'      => 'tata_usaha/catatan/tambah');
        $this->load->view('tata_usaha/layout/wrapper',$data,FALSE);
    }

    //Edit Catatan
    public function edit($kode_catatan)
    {
        $kode_administrasi = $this->session->userdata('kode_administrasi');
        $tata_usaha = $this->tatausaha_model->listing($kode_administrasi);

        $catatan = $this->catatan_model->detail($kode_catatan);
        $konfigurasi = $this->konfigurasi_model->listing();
        //validasi input
        $valid      = $this->form_validation;
        
        $valid->set_rules('judul', 'Judul', 'required',
                    array('required'    =>  "%s Harus diisi"));

        $valid->set_rules('tanggal', 'Tanggal', 'required',
                    array('required'    =>  "%s Harus diisi"));

        $valid->set_rules('jam', 'Jam', 'required',
                    array('required'    =>  "%s Harus diisi"));

        $valid->set_rules('isi', 'Isi', 'required',
                    array('required'    =>  "%s Harus diisi"));
        
        if($valid->run()===false){
            //Akhir Validasi
        
        $data = array(  'title'     =>  'Edit Catatan',
                        'catatan'   =>  $catatan,
                        'konfigurasi'   =>  $konfigurasi,
                        'tata_usaha'    =>  $tata_usaha,
                        'isi'       =>  'tata_usaha/catatan/edit'
                     );
        $this->load->view('tata_usaha/layout/wrapper', $data, false);
        //masuk database
        }else{
            $i = $this->input;
            
            $data = array(  'kode_catatan'  =>  $kode_catatan,
                            'judul_catatan' =>  $i->post('judul'),
                            'tanggal'       =>  $i->post('tanggal'),
                            'jam'           =>  $i->post('jam'),
                            'isi'           =>  $i->post('isi'),
                         );
            $this->catatan_model->edit($data);
            $this->session->set_flashdata('sukses', 'Data telah diedit');
            redirect(base_url('tata_usaha/catatan'), 'refresh');
        }
        //akhir masuk database
            
        $data = array(  'title'     =>  'Edit Catatan',
                        'catatan'   =>  $catatan,
                        'konfigurasi'   =>  $konfigurasi,
                        'tata_usaha'    =>  $tata_usaha,
                        'isi'       =>  'tata_usaha/catatan/edit'
                     );
        $this->load->view('tata_usaha/layout/wrapper', $data, false);
    }

    // Detail Catatan
    public function detail($kode_catatan)
    {
        $kode_administrasi = $this->session->userdata('kode_administrasi');
        $tata_usaha = $this->tatausaha_model->listing($kode_administrasi);
        $konfigurasi = $this->konfigurasi_model->listing();

        $catatan = $this->catatan_model->detail($kode_catatan);
        $data = array(  'title'     =>  'Detail Catatan : '.$catatan->judul_catatan,
                        'catatan'  =>  $catatan,
                        'konfigurasi'   =>  $konfigurasi,
                        'tata_usaha'    => $tata_usaha,
                        'isi'       =>  'tata_usaha/catatan/detail'
                     );
        $this->load->view('tata_usaha/layout/wrapper', $data, false);
    }

    // Delete Catatan
    public function delete($kode_catatan)
    {
        $data = array('kode_catatan' => $kode_catatan);

        $this->catatan_model->delete($data);
        $this->session->set_flashdata('sukses', 'Data telah dihapus');
        redirect(base_url('tata_usaha/catatan'), 'refresh');
    }
}
?>