<?php 
defined('BASEPATH') or exit('No script access allowed');

class Kategori_spp extends CI_Controller {

    // Load Model
    public function __construct()
    {
        parent::__construct();
        $this->load->model('kategori_model');
        $this->load->model('jurusan_model');
        $this->load->model('tatausaha_model');
        $this->load->model('konfigurasi_model');
        // Proteksi Halaman
        $this->simple_login_tata_usaha->cek_login();
    }

    // Data Kategori SPP
    public function index()
    {
        $konfigurasi = $this->konfigurasi_model->listing();
        $kode_administrasi = $this->session->userdata('kode_administrasi');
        $tata_usaha = $this->tatausaha_model->listing($kode_administrasi);

        $kategori = $this->kategori_model->listing_spp();
        $data = array(  'title'     => 'Data Kategori  SPP',
                        'kategori'  =>  $kategori,
                        'konfigurasi'   =>  $konfigurasi,
                        'tata_usaha'    =>  $tata_usaha,
                        'isi'       =>  'tata_usaha/kategori_spp/list'
                     );
        $this->load->view('tata_usaha/layout/wrapper', $data, false);
    }

    // Tambah Kategori SPP 
    public function tambah()
    {
        $konfigurasi = $this->konfigurasi_model->listing();
        $kode_administrasi = $this->session->userdata('kode_administrasi');
        $tata_usaha = $this->tatausaha_model->listing($kode_administrasi);
        
        //Validasi input
        $valid = $this->form_validation;
        
        $valid->set_rules('jenisbayar', 'Jenis Pembayaran', 'required',
                    array('required'    =>  "%s Harus diisi"));

        $valid->set_rules('jumlah', 'Jumlah', 'required',
                    array('required'    =>  "%s Harus diisi"));
        
        if($valid->run()===false){
            //End validasi
            
        $data = array(	'title' => 'Tambah Kategori SPP',
                        'tata_usaha'    =>  $tata_usaha,
                        'konfigurasi'   =>  $konfigurasi,
                        'isi'      => 'tata_usaha/kategori_spp/tambah');
        $this->load->view('tata_usaha/layout/wrapper',$data,FALSE);
        //Masuk Database
        }else{
	    $i = $this->input;   
            
            $data = array(  'jenis_bayar'  =>  $i->post('jenisbayar'),
                            'jumlah'    =>  $i->post('jumlah'),
                         );
            $this->kategori_model->tambah_spp($data);
            $this->session->set_flashdata('sukses','Data telah ditambah');
            redirect(base_url('tata_usaha/kategori_spp'),'refresh');
        }
        //Akhir masuk database
        $data = array(	'title'     => 'Tambah Kategori SPP',
                        'tata_usaha'    =>  $tata_usaha,
                        'konfigurasi'   =>  $konfigurasi,
                        'isi'       => 'tata_usaha/kategori_spp/tambah');
        $this->load->view('tata_usaha/layout/wrapper',$data,FALSE);
    }

    //Edit siswa
    public function edit($kode_bayar)
    {
        $konfigurasi = $this->konfigurasi_model->listing();
        $kode_administrasi = $this->session->userdata('kode_administrasi');
        $tata_usaha = $this->tatausaha_model->listing($kode_administrasi);

        // Ambil data kategori bayar yang akan diedit
        $kategori = $this->kategori_model->detail_spp($kode_bayar);
        //validasi input
        $valid      = $this->form_validation;
        
        $valid->set_rules('jenisbayar', 'Jenis Pembayaran', 'required',
                    array('required'    =>  "%s Harus diisi"));

        $valid->set_rules('jumlah', 'Jumlah', 'required',
                    array('required'    =>  "%s Harus diisi"));
        
        if($valid->run()===false){
            //Akhir Validasi
        
        $data = array(  'title'     =>  'Edit Kategori SPP',
                        'kategori'  =>  $kategori,
                        'konfigurasi'   =>  $konfigurasi,
                        'tata_usaha'    =>  $tata_usaha,
                        'isi'       =>  'tata_usaha/kategori_spp/edit'
                     );
        $this->load->view('tata_usaha/layout/wrapper', $data, false);
        //masuk database
        }else{
            $i = $this->input;
            
            $data = array(  'kode_bayar'    =>  $kode_bayar,
                            'jenis_bayar'   =>  $i->post('jenisbayar'),
                            'jumlah'        =>  $i->post('jumlah'),
                         );
            $this->kategori_model->edit($data);
            $this->session->set_flashdata('sukses', 'Data telah diedit');
            redirect(base_url('tata_usaha/kategori_spp'), 'refresh');
        }
        //akhir masuk database
            
        $data = array(  'title'     =>  'Edit Kategori SPP',
                        'kategori'  =>  $kategori,
                        'konfigurasi'   =>  $konfigurasi,
                        'tata_usaha'    =>  $tata_usaha,
                        'isi'       =>  'tata_usaha/kategori_bayar/edit'
                     );
        $this->load->view('tata_usaha/layout/wrapper', $data, false);
    }

    // Delete Kategori Bayar
    public function delete($kode_bayar)
    {
        $data = array(  'kode_bayar'  =>  $kode_bayar,
                     );

        $this->kategori_model->delete($data);
        $this->session->set_flashdata('sukses', 'Data telah dihapus');
        redirect(base_url('tata_usaha/kategori_spp'), 'refresh');
    }
}
?>