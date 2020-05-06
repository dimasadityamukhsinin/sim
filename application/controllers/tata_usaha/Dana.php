<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Dana extends CI_Controller {

    // Load Model
    public function __construct()
    {
        parent::__construct();
        $this->load->model('dana_model');
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

        $dana = $this->dana_model->listing();
        $dana_masuk = $this->dana_model->total_masuk();
        $dana_keluar = $this->dana_model->total_keluar();
        $data = array(  'title' =>  'Halaman Dana',
                        'dana'   =>  $dana,
                        'konfigurasi'   =>  $konfigurasi,
                        'tata_usaha'    =>  $tata_usaha,
                        'dana_masuk'    =>  $dana_masuk,
                        'dana_keluar'    =>  $dana_keluar,
                        'isi'       =>  'tata_usaha/dana/list'
                     );
        $this->load->view('tata_usaha/layout/wrapper', $data, false);
    }

    //Tambah Dana
    public function tambah()
    {
        $kode_administrasi = $this->session->userdata('kode_administrasi');
        $tata_usaha = $this->tatausaha_model->listing($kode_administrasi);

        $dana = $this->dana_model->listing();
        $konfigurasi = $this->konfigurasi_model->listing();
        //Validasi input
        $valid = $this->form_validation;
        
        $valid->set_rules('keterangan[]', 'Keterangan', 'required',
                    array('required'    =>  "%s Harus diisi"));

        $valid->set_rules('jumlah[]', 'Jumlah', 'required',
                    array('required'    =>  "%s Harus diisi"));

        $valid->set_rules('tanggal[]', 'Tanggal', 'required',
                    array('required'    =>  "%s Harus diisi"));

        $valid->set_rules('jenis[]', 'Jenis', 'required',
                    array('required'    =>  "%s Harus diisi"));
        
        if($valid->run()===false){
            //End validasi
            
        $data = array(	'title' => 'Tambah Dana',
                        'tata_usaha'    =>  $tata_usaha,
                        'dana'          =>  $dana, 
                        'konfigurasi'   =>  $konfigurasi,
                        'isi'      => 'tata_usaha/dana/tambah');
        $this->load->view('tata_usaha/layout/wrapper',$data,FALSE);
        //Masuk Database
        }else{
	    $i = $this->input;   
            
            $keterangan     =  $i->post('keterangan');
            $jumlah_dana    =  $i->post('jumlah');
            $tanggal        =  $i->post('tanggal');
            $jenis          =  $i->post('jenis');
            $data = array();

            for ($i = 0; $i < count($this->input->post('keterangan')); $i++)
            {
                $data[] = array(
                    'keterangan'    => $keterangan[$i],
                    'jumlah_dana'   => $jumlah_dana[$i],
                    'tanggal'       => $tanggal[$i],
                    'jenis'         => $jenis[$i]
                );
            } 
            $this->dana_model->tambah($data);
            $this->session->set_flashdata('sukses','Data telah ditambah');
            redirect(base_url('tata_usaha/dana'),'refresh');
        }
        //Akhir masuk database
        $data = array(	'title' => 'Tambah Dana',
                        'tata_usaha'    =>  $tata_usaha,
                        'dana'          =>  $dana,
                        'konfigurasi'   =>  $konfigurasi,
                        'isi'      => 'tata_usaha/dana/tambah');
        $this->load->view('tata_usaha/layout/wrapper',$data,FALSE);
    }

    //Edit siswa
    public function edit($kode_dana)
    {
        $kode_administrasi = $this->session->userdata('kode_administrasi');
        $tata_usaha = $this->tatausaha_model->listing($kode_administrasi);

        $dana = $this->dana_model->detail($kode_dana);
        $konfigurasi = $this->konfigurasi_model->listing();
        //validasi input
        $valid      = $this->form_validation;
        
        $valid->set_rules('keterangan', 'Keterangan', 'required',
                    array('required'    =>  "%s Harus diisi"));

        $valid->set_rules('jumlah', 'Jumlah', 'required',
                    array('required'    =>  "%s Harus diisi"));

        $valid->set_rules('tanggal', 'Tanggal', 'required',
                    array('required'    =>  "%s Harus diisi"));

        $valid->set_rules('jenis', 'Jenis', 'required',
                    array('required'    =>  "%s Harus diisi"));
        
        if($valid->run()===false){
            //Akhir Validasi
        
        $data = array(  'title'     =>  'Edit Dana',
                        'dana'      =>  $dana,
                        'konfigurasi'   =>  $konfigurasi,
                        'tata_usaha'    =>  $tata_usaha,
                        'isi'       =>  'tata_usaha/dana/edit'
                     );
        $this->load->view('tata_usaha/layout/wrapper', $data, false);
        //masuk database
        }else{
            $i = $this->input;
            
            $data = array(  'kode_dana'     =>  $kode_dana,
                            'keterangan'    =>  $i->post('keterangan'),
                            'jumlah_dana'   =>  $i->post('jumlah'),
                            'tanggal'       =>  $i->post('tanggal'),
                            'tanggal'       =>  $i->post('tanggal'),
                            'jenis'         =>  $i->post('jenis'),
                         );
            $this->dana_model->edit($data);
            $this->session->set_flashdata('sukses', 'Data telah diedit');
            redirect(base_url('tata_usaha/dana'), 'refresh');
        }
        //akhir masuk database
            
        $data = array(  'title'     =>  'Edit Dana',
                        'tata_usaha'    =>  $tata_usaha,
                        'dana'   =>  $dana,
                        'konfigurasi'   =>  $konfigurasi,
                        'isi'       =>  'tata_usaha/dana/edit'
                     );
        $this->load->view('tata_usaha/layout/wrapper', $data, false);
    }

    // Detail Catatan
    public function detail($kode_dana)
    {
        $kode_administrasi = $this->session->userdata('kode_administrasi');
        $tata_usaha = $this->tatausaha_model->listing($kode_administrasi);

        $dana = $this->dana_model->detail($kode_dana);
        $konfigurasi = $this->konfigurasi_model->listing();
        $data = array(  'title'     =>  'Detail Dana Masuk',
                        'dana'  =>  $dana,
                        'konfigurasi'   =>  $konfigurasi,
                        'tata_usaha'    =>  $tata_usaha,
                        'isi'       =>  'tata_usaha/dana/detail'
                     );
        $this->load->view('tata_usaha/layout/wrapper', $data, false);
    }

    // Cetak Dana 
    public function cetak()
    {
        $dana_masuk = $this->dana_model->total_masuk();
        $dana_keluar = $this->dana_model->total_keluar();
        $konfigurasi = $this->konfigurasi_model->listing();
        $dana = $this->dana_model->listing();
        $data = array(  'title' =>  'Laporan Pendanaan Sekolah',
                        'dana' =>  $dana,
                        'dana_masuk'    =>  $dana_masuk,
                        'dana_keluar'   =>  $dana_keluar,
                        'konfigurasi'   =>  $konfigurasi
                     );
        $this->load->view('tata_usaha/dana/cetak', $data, false);
    }

    // Delete Danas
    public function delete($kode_dana)
    {
        $data = array('kode_dana' => $kode_dana);

        $this->dana_model->delete($data);
        $this->session->set_flashdata('sukses', 'Data telah dihapus');
        redirect(base_url('tata_usaha/dana'), 'refresh');
    }
}
?>