<?php
defined('BASEPATH') or exit('No script access allowed');

class Tahun_ajaran extends CI_Controller {

    // Load Model 
    public function __construct()
    {
        parent::__construct();
        $this->load->model('tahun_ajaran_model');
        $this->load->model('konfigurasi_model');
        // Proteksi Halaman
        $this->simple_login_tata_usaha->cek_login();
    }

    // Data Tahun Ajaran
    public function index()
    {
        $konfigurasi = $this->konfigurasi_model->listing();
        $kode_administrasi = $this->session->userdata('kode_administrasi');
        $tata_usaha = $this->tatausaha_model->listing($kode_administrasi);

        $tahun_ajaran = $this->tahun_ajaran_model->listing();
        $data = array(  'title' =>  'Data Periode Tahun Ajaran',
                        'tahun_ajaran' =>  $tahun_ajaran,
                        'konfigurasi'   =>  $konfigurasi,
                        'tata_usaha'    =>  $tata_usaha,
                        'isi'   =>  'tata_usaha/tahun_ajaran/list'
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
        
        $valid->set_rules('tahun_ajaran', 'Tahun Ajaran', 'required',
                    array('required'    =>  "%s Harus diisi"));

        $valid->set_rules('tanggal_mulai', 'Tanggal', 'required',
                    array('required'    =>  "%s Harus diisi"));

        $valid->set_rules('tanggal_akhir', 'Jam', 'required',
                    array('required'    =>  "%s Harus diisi"));
        
        if($valid->run()===false){
            //End validasi
            
        $data = array(	'title'         => 'Tambah Tahun Ajaran',
                        'tata_usaha'    =>  $tata_usaha,
                        'konfigurasi'   =>  $konfigurasi,
                        'isi'           => 'tata_usaha/tahun_ajaran/tambah');
        $this->load->view('tata_usaha/layout/wrapper',$data,FALSE);
        //Masuk Database
        }else{
	    $i = $this->input;   
            
            $data = array(  'tahun_ajar'    =>  $i->post('tahun_ajaran'),
                            'tgl_mulai'     =>  $i->post('tanggal_mulai'),
                            'tgl_akhir'     =>  $i->post('tanggal_akhir')
                         );
            $this->tahun_ajaran_model->tambah($data);
            $this->session->set_flashdata('sukses','Data telah ditambah');
            redirect(base_url('tata_usaha/tahun_ajaran'),'refresh');
        }
        //Akhir masuk database
        $data = array(	'title' => 'Tambah Tahun Ajaran',
                        'tata_usaha'    =>  $tata_usaha,
                        'konfigurasi'   =>  $konfigurasi,
                        'isi'   => 'tata_usaha/tahun_ajaran/tambah');
        $this->load->view('tata_usaha/layout/wrapper',$data,FALSE);
    }

    //Edit Catatan
    public function edit($kode_ajaran)
    {
        $konfigurasi = $this->konfigurasi_model->listing();
        $kode_administrasi = $this->session->userdata('kode_administrasi');
        $tata_usaha = $this->tatausaha_model->listing($kode_administrasi);

        $tahun_ajaran = $this->tahun_ajaran_model->detail($kode_ajaran);
        //validasi input
        $valid      = $this->form_validation;
        
        $valid->set_rules('tahun_ajaran', 'Tahun Ajaran', 'required',
                    array('required'    =>  "%s Harus diisi"));

        $valid->set_rules('tanggal_mulai', 'Tanggal Mulai', 'required',
                    array('required'    =>  "%s Harus diisi"));

        $valid->set_rules('tanggal_akhir', 'Tanggal Akhir', 'required',
                    array('required'    =>  "%s Harus diisi"));
        
        if($valid->run()===false){
            //Akhir Validasi
        
        $data = array(  'title'         =>  'Edit Tahun Ajaran',
                        'tahun_ajaran'  =>  $tahun_ajaran,
                        'tata_usaha'    =>  $tata_usaha,
                        'konfigurasi'   =>  $konfigurasi,
                        'isi'           =>  'tata_usaha/tahun_ajaran/edit'
                     );
        $this->load->view('tata_usaha/layout/wrapper', $data, false);
        //masuk database
        }else{
            $i = $this->input;
            
            $data = array(  'kode_ajaran'   =>  $kode_ajaran,
                            'tahun_ajar'    =>  $i->post('tahun_ajaran'),
                            'tgl_mulai'     =>  $i->post('tanggal_mulai'),
                            'tgl_akhir'     =>  $i->post('tanggal_akhir')
                         );
            $this->tahun_ajaran_model->edit($data);
            $this->session->set_flashdata('sukses', 'Data telah diedit');
            redirect(base_url('tata_usaha/tahun_ajaran'), 'refresh');
        }
        //akhir masuk database
            
        $data = array(  'title'         =>  'Edit Tahun Ajaran',
                        'tahun_ajaran'  =>  $tahun_ajaran,
                        'tata_usaha'    =>  $tata_usaha,
                        'konfigurasi'   =>  $konfigurasi,
                        'isi'           =>  'tata_usaha/tahun_ajaran/edit'
                     );
        $this->load->view('tata_usaha/layout/wrapper', $data, false);
    }

    // Delete Catatan
    public function delete($kode_ajaran)
    {
        $data = array('kode_ajaran' => $kode_ajaran);

        $this->tahun_ajaran_model->delete($data);
        $this->session->set_flashdata('sukses', 'Data telah dihapus');
        redirect(base_url('tata_usaha/tahun_ajaran'), 'refresh');
    }
}
?>