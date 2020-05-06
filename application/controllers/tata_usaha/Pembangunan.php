<?php
defined('BASEPATH') or exit('No script access allowed');

class Pembangunan extends CI_Controller {

    // Load Model 
    public function __construct()
    {
        parent::__construct();
        $this->load->model('spp_model');
        $this->load->model('jurusan_model');
        $this->load->model('kelas_model');
        $this->load->model('siswa_model');
        $this->load->model('pmb_model');
        $this->load->model('tatausaha_model');
        $this->load->model('konfigurasi_model');
        // Proteksi Halaman
        $this->simple_login_tata_usaha->cek_login();
    }

    // Data siswa
    public function index()
    {
        $konfigurasi = $this->konfigurasi_model->listing();
        $kode_administrasi = $this->session->userdata('kode_administrasi');
        $tata_usaha = $this->tatausaha_model->listing($kode_administrasi);

        $siswa = $this->kelas_model->listing();
        $data = array(  'title' =>  'Data Pembayaran Pembangunan Siswa',
                        'siswa' =>  $siswa,
                        'konfigurasi'   =>  $konfigurasi,
                        'tata_usaha'    =>  $tata_usaha,
                        'isi'   =>  'tata_usaha/pmb/list'
                     );
        $this->load->view('tata_usaha/layout/wrapper', $data, false);
    }

    //Data Pembayaran
    public function histori_pembayaran($nis)
    {
        $kode_administrasi = $this->session->userdata('kode_administrasi');
        $tata_usaha = $this->tatausaha_model->listing($kode_administrasi);

        $siswa = $this->pmb_model->detail($nis);
        $total_dana = $this->pmb_model->total_masuk($nis);
        $sisa_pmb = $this->pmb_model->sisa_pmb($nis);
        $konfigurasi = $this->konfigurasi_model->listing();
        $data = array(  'title'     =>  'Riwayat Pembayaran Pembangunan Siswa',
                        'siswa' =>  $siswa,
                        'konfigurasi'   =>  $konfigurasi,
                        'total_dana'    =>  $total_dana,
                        'sisa_pmb'  =>  $sisa_pmb,
                        'tata_usaha'    =>  $tata_usaha,
                        'isi'       =>  'tata_usaha/pmb/histori_pembayaran'
                     );
        $this->load->view('tata_usaha/layout/wrapper', $data, false);
    }

    // Cetak Pembangunan
    public function cetak($nis)
    {
        $konfigurasi = $this->konfigurasi_model->listing();
        // Sisa Pembayaran
        $sisa_pmb = $this->pmb_model->sisa_pmb($nis);
        // Konfigurasi Data Sekolah
        $konfigurasi = $this->konfigurasi_model->listing();
        // Data Pembayaran Siswa
        $siswa = $this->pmb_model->detail_cetak($nis);
        $data = array(  'title'         =>  'Pembayaran Pembangunan'.'-'.$siswa->nama_siswa.'-'.$siswa->tanggal,
                        'siswa'         =>  $siswa,
                        'konfigurasi'   =>  $konfigurasi,
                        'sisa_pmb'      =>  $sisa_pmb,
                        'konfigurasi'   =>  $konfigurasi
                     );
        $this->load->view('tata_usaha/pmb/cetak', $data, false);
    }

    // Tambah Pembayaran SPP
    public function tambah($nis)
    {
        $konfigurasi = $this->konfigurasi_model->listing();
        $kode_administrasi = $this->session->userdata('kode_administrasi');
        $tata_usaha = $this->tatausaha_model->listing($kode_administrasi);

        $jumlah = $this->pmb_model->jumlah();
        // Ambil data pembayaran
        $siswa = $this->pmb_model->siswa($nis);
        
        // Validasi input
        $valid = $this->form_validation;

        $valid->set_rules('nis', 'NIS Siswa', 'required',
                    array('required' => "%s Harus diisi",
                    array($this->pmb_model->siswa($nis),'readonly' =>   "%s Tidak boleh diubah")));

        $valid->set_rules('tanggal', 'Tanggal', 'required',
                    array('required' => "%s Harus diisi"));

        $valid->set_rules('jumlah', 'Jumlah', 'required',
                    array('required' => "%s Harus diisi"));

        $valid->set_rules('tahun_ajaran', 'Tahun Ajaran', 'required',
                    array('required' => "%s Harus diisi"));

        if($valid->run()===false){
            // End Validasi

            $data = array(  'title'     =>  'Tambah Pembayaran',
                            'jumlah'     =>  $jumlah,
                            'siswa'   =>  $siswa,
                            'konfigurasi'   =>  $konfigurasi,
                            'tata_usaha'    =>  $tata_usaha,
                            'isi'       =>  'tata_usaha/pmb/tambah'
                         );
            $this->load->view('tata_usaha/layout/wrapper', $data, false);
            // Masuk Database
        }else{
            $i = $this->input;

            $data = array(  'nis'  =>  $nis,
                            'tanggal'    =>  $i->post('tanggal'),
                            'kode_bayar_pmb'    =>  $i->post('jenis'),
                            'jumlah_bayar'    =>  $i->post('jumlah'),
                            'tahun_ajaran'    =>  $i->post('tahun_ajaran')
                         );
            $this->pmb_model->tambah($data);
            $this->session->set_flashdata('sukses', 'Data telah ditambah');
            redirect(base_url('tata_usaha/pembangunan'), 'refresh');
        }
        // Akhir masuk database 
        $data = array(  'title'     =>  'Tambah Pembayaran',
                        'jumlah'     =>  $jumlah,
                        'siswa'   =>  $siswa,
                        'tata_usaha'    =>  $tata_usaha,
                        'isi'       =>  'tata_usaha/pmb/tambah'
                        );
        $this->load->view('tata_usaha/layout/wrapper', $data, false);
    }

    // Delete Pembayaran SPP
    public function delete($kode_pembangunan,$nis,$tanggal)
    {
        $data = array(  'kode_pembangunan'  =>  $kode_pembangunan,
                        'nis'  =>  $nis,
                        'tanggal'   =>  $tanggal,
                     );

        $this->pmb_model->delete($data);
        $this->session->set_flashdata('sukses', 'Data telah dihapus');
        redirect(base_url('tata_usaha/pembangunan'), 'refresh');
    }
}
?>