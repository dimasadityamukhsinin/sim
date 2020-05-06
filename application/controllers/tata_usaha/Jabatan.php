<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Jabatan extends CI_Controller {

    // Load Model
    public function __construct()
    {
        parent::__construct();
        $this->load->model('jabatan_model');
        $this->load->model('jurusan_model');
        $this->load->model('guru_model');
        $this->load->model('kelas_model');
        $this->load->model('tatausaha_model');
        $this->load->model('tahun_ajaran_model');
        $this->load->model('konfigurasi_model');
        // Proteksi Halaman
        $this->simple_login_tata_usaha->cek_login();
    }

    // Data jabatan Guru
    public function index() 
    {
        $konfigurasi = $this->konfigurasi_model->listing();
        $kode_administrasi = $this->session->userdata('kode_administrasi');
        $tata_usaha = $this->tatausaha_model->listing($kode_administrasi);

        $jabatan = $this->jabatan_model->listing();
        $data = array(  'title' =>  'Data jabatan Guru',
                        'jabatan' =>  $jabatan,
                        'konfigurasi'   =>  $konfigurasi,
                        'tata_usaha'   =>   $tata_usaha,
                        'isi'   =>  'tata_usaha/jabatan/list'
                     );
        $this->load->view('tata_usaha/layout/wrapper', $data, false);
    }

    //Tambah Jabatan
    public function tambah()
    {   
        $kode_administrasi = $this->session->userdata('kode_administrasi');
        $tata_usaha = $this->tatausaha_model->listing($kode_administrasi);

        // Ambil data Guru
        $guru = $this->guru_model->listing();
        $tahun = $this->tahun_ajaran_model->listing();
        // Ambil data Guru
        $jurusan = $this->jabatan_model->jurusan();
        $konfigurasi = $this->konfigurasi_model->listing();
        
        //Validasi input
        $valid = $this->form_validation;
        
        $valid->set_rules('tingkatkelas', 'Tingkat Kelas', 'required',
                    array('required'    =>  "%s Harus diisi"));

        $valid->set_rules('tahunajar', 'Tahun Ajar', 'required',
                    array('required'    =>  "%s Harus diisi"));

        $valid->set_rules('nama', 'Nama Guru', 'required',
                    array('required'    =>  "%s Harus diisi"));

        $valid->set_rules('tahunangkatan', 'Tahun Angkatan', 'required',
                    array('required'    =>  "%s Harus diisi"));
        
        if($valid->run()===false){
            //End validasi
            
        $data = array(	'title' => 'Tambah jabatan Guru',
                        'guru'  =>  $guru,
                        'konfigurasi'   =>  $konfigurasi,
                        'tata_usaha'    =>  $tata_usaha,
			            'jurusan' => $jurusan,
                        'tahun'     =>  $tahun,
                        'isi'      => 'tata_usaha/jabatan/tambah');
        $this->load->view('tata_usaha/layout/wrapper',$data,FALSE);
        //Masuk Database
        }else{
	    $i = $this->input;   
            
            $data = array(  'kode_jurusan'  =>  $i->post('jurusan'),
                            'tingkat_kelas' =>  $i->post('tingkatkelas'),
                            'kode_ajaran'    =>  $i->post('tahunajar'),
                            'kode_guru'     =>  $i->post('nama'),
                            'tahun_angkatan'     =>  $i->post('tahunangkatan'),
                         );
            $this->jabatan_model->tambah($data);
            $this->session->set_flashdata('sukses','Data telah ditambah');
            redirect(base_url('tata_usaha/jabatan'),'refresh');
        }
        //Akhir masuk database
        $data = array(	'title' => 'Tambah jabatan Guru',
                        'guru'  =>  $guru,
                        'konfigurasi'   =>  $konfigurasi,
                        'tata_usaha'    =>  $tata_usaha,
			            'jurusan' => $jurusan,
                        'tahun'     =>  $tahun,
                        'isi'      => 'tata_usaha/jabatan/tambah');
        $this->load->view('tata_usaha/layout/wrapper',$data,FALSE);
    }

    //Edit siswa
    public function edit($jabatan_guru)
    {
        $konfigurasi = $this->konfigurasi_model->listing();
        $kode_administrasi = $this->session->userdata('kode_administrasi');
        $tata_usaha = $this->tatausaha_model->listing($kode_administrasi);

        $guru = $this->guru_model->listing();
        // Ambil data Jurusan
        $jurusan = $this->jurusan_model->listing();
        // Ambil data jabatan yang akan diedit
        $jabatan = $this->jabatan_model->detail($jabatan_guru);
        $tahun = $this->tahun_ajaran_model->listing();
        //validasi input
        $valid      = $this->form_validation;
        
        $valid->set_rules('jurusan', 'Jurusan', 'required',
                    array('required'    =>  "%s Harus diisi"));

        $valid->set_rules('tingkatkelas', 'Tingkat Kelas', 'required',
                    array('required'    =>  "%s Harus diisi"));

        $valid->set_rules('tahunajar', 'Tahun Ajar', 'required',
                    array('required' => "%s Harus diisi"));

        $valid->set_rules('nama', 'Nama Guru', 'required',
                    array('required' => "%s Harus diisi"));
        
        if($valid->run()===false){
            //Akhir Validasi
        
        $data = array(  'title'     =>  'Edit Jabatan Guru',
                        'jurusan'   =>  $jurusan,
                        'guru'      =>  $guru,
                        'konfigurasi'   =>  $konfigurasi,
                        'tata_usaha'    =>  $tata_usaha,
                        'jabatan'   =>  $jabatan,
                        'tahun'     =>  $tahun,
                        'isi'       =>  'tata_usaha/jabatan/edit'
                     );
        $this->load->view('tata_usaha/layout/wrapper', $data, false);
        //masuk database
        }else{
            $i = $this->input;
            
            $data = array(  'nama_jurusan'  =>  $i->post('jurusan'),
                            'kode_kelas'     =>  $jabatan_guru,
                            'tingkat_kelas' =>  $i->post('tingkatkelas'),
                            'kode_ajaran'    =>  $i->post('tahunajar'),
                            'kode_guru'     =>  $i->post('nama'),
                         );
            $this->jabatan_model->edit($data);
            $this->session->set_flashdata('sukses', 'Data telah diedit');
            redirect(base_url('tata_usaha/jabatan'), 'refresh');
        }
        //akhir masuk database
            
        $data = array(  'title'     =>  'Edit Jabatan Guru',
                        'jurusan'   =>  $jurusan,
                        'guru'      =>  $guru,
                        'tata_usaha'    =>  $tata_usaha,
                        'jabatan'   =>  $jabatan,
                        'tahun'     =>  $tahun,
                        'isi'       =>  'tata_usaha/jabatan/edit'
                     );
        $this->load->view('tata_usaha/layout/wrapper', $data, false);
    }
    
    // Delete Jabatan
    public function delete($kode_kelas)
    {
        $data = array('kode_kelas' => $kode_kelas);

        $this->jabatan_model->delete($data);
        $this->session->set_flashdata('sukses', 'Data telah dihapus');
        redirect(base_url('tata_usaha/jabatan'), 'refresh');
    }

}
?>