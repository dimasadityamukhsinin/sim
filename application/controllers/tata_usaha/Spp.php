<?php
defined('BASEPATH') or exit('No script access allowed');

class Spp extends CI_Controller {

    // Load Model 
    public function __construct()
    {
        parent::__construct();
        $this->load->model('spp_model');
        $this->load->model('jurusan_model');
        $this->load->model('kelas_model');
        $this->load->model('siswa_model');
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
        $data = array(  'title' =>  'Data Pembayaran SPP Siswa',
                        'siswa' =>  $siswa,
                        'konfigurasi'   =>  $konfigurasi,
                        'tata_usaha'    =>  $tata_usaha,
                        'isi'   =>  'tata_usaha/spp/list'
                     );
        $this->load->view('tata_usaha/layout/wrapper', $data, false);
    }

    //Data Pembayaran
    public function histori_pembayaran($nis)
    {
        $konfigurasi = $this->konfigurasi_model->listing();
        $kode_administrasi = $this->session->userdata('kode_administrasi');
        $tata_usaha = $this->tatausaha_model->listing($kode_administrasi);

        $siswa = $this->spp_model->detail($nis);
            
        $data = array(  'title'     =>  'Riwayat Pembayaran SPP Siswa',
                        'siswa' =>  $siswa,
                        'konfigurasi'   =>  $konfigurasi,
                        'tata_usaha'    =>  $tata_usaha,
                        'isi'       =>  'tata_usaha/spp/histori_pembayaran'
                     );
        $this->load->view('tata_usaha/layout/wrapper', $data, false);
    }

    // Tambah Pembayaran SPP
    public function tambah($nis)
    {
        $kode_administrasi = $this->session->userdata('kode_administrasi');
        $tata_usaha = $this->tatausaha_model->listing($kode_administrasi);
        $konfigurasi = $this->konfigurasi_model->listing();

        $jumlah = $this->spp_model->jumlah();
        $bulan = $this->spp_model->bulan();
        $bulan_akhir = date("F");
        // Ambil data pembayaran
        $siswa = $this->spp_model->siswa($nis);
        
        // Validasi input
        $valid = $this->form_validation;

        $valid->set_rules('nis[]', 'NIS Siswa', 'required',
                    array('required' => "%s Harus diisi",
                    array($this->spp_model->siswa($nis),'readonly' =>   "%s Tidak boleh diubah")));

        $valid->set_rules('bulan[]', 'Untuk Bulan Ke', 'required',
                    array('required' => "%s Harus diisi"));

        $valid->set_rules('tanggal[]', 'Tanggal', 'required',
                    array('required' => "%s Harus diisi"));

        $valid->set_rules('tahun_ajar[]', 'Tahun Ajara', 'required',
                    array('required' => "%s Harus diisi"));

        $valid->set_rules('jumlah[]', 'Jumlah', 'required',
                    array('required' => "%s Harus diisi"));

        if($valid->run()===false){
            // End Validasi

            $data = array(  'title'     =>  'Tambah Pembayaran',
                            'jumlah'     =>  $jumlah,
                            'bulan'     =>  $bulan,
                            'konfigurasi'   =>  $konfigurasi,
                            'bulan_akhir'   =>  $bulan_akhir,
                            'siswa'   =>  $siswa,
                            'tata_usaha'    =>  $tata_usaha,
                            'isi'       =>  'tata_usaha/spp/tambah'
                         );
            $this->load->view('tata_usaha/layout/wrapper', $data, false);
            // Masuk Database
        }else{
            $i = $this->input;
            $jumlah =  $i->post('jumlah');
            $kode_bulan =  $i->post('bulan');
            $tanggal    =  $i->post('tanggal');
            $tahun_ajar =  $i->post('tahun_ajar');
            $data = array();

            for ($i = 0; $i < count($this->input->post('nis')); $i++)
            {
                $data[] = array(
                    'nis'           => $nis,
                    'jumlah'        => $jumlah[$i],
                    'kode_bulan'    => $kode_bulan[$i],
                    'tanggal'       => $tanggal[$i],
                    'tahun_ajar'    => $tahun_ajar[$i]
                );
            }       
            $this->spp_model->tambah($data);
            $this->session->set_flashdata('sukses', 'Data telah ditambah');
            redirect(base_url('tata_usaha/spp'), 'refresh');
        }
        // Akhir masuk database 
        $data = array(  'title'     =>  'Tambah Pembayaran',
                        'jumlah'     =>  $jumlah,
                        'bulan'     =>  $bulan,
                        'konfigurasi'   =>  $konfigurasi,
                        'bulan_akhir'   =>  $bulan_akhir,
                        'siswa'   =>  $siswa,
                        'tata_usaha'    =>  $tata_usaha,
                        'isi'       =>  'tata_usaha/spp/tambah'
                        );
        $this->load->view('tata_usaha/layout/wrapper', $data, false);
    }

    // Cetak SPP
    public function cetak($nis)
    {
        $konfigurasi = $this->konfigurasi_model->listing();
        $siswa = $this->spp_model->detail_cetak($nis);
        $data = array(  'title' =>  'Pembayaran SPP'.'-'.$siswa->nama_siswa.'-'.$siswa->tanggal,
                        'siswa'  =>  $siswa,
                        'konfigurasi'   =>  $konfigurasi
                     );
        $this->load->view('tata_usaha/spp/cetak', $data, false);
    }

    // Delete Pembayaran SPP
    public function delete($nis,$kode_bulan,$tanggal)
    {
        $data = array(  'nis'  =>  $nis,
                        'kode_bulan' =>  $kode_bulan,
                        'tanggal'   =>  $tanggal,
                     );

        $this->spp_model->delete($data);
        $this->session->set_flashdata('sukses', 'Data telah dihapus');
        redirect(base_url('tata_usaha/spp'), 'refresh');
    }
}
?>