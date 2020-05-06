<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Scan_absen_administrasi extends CI_Controller {

    // Load Model
    public function __construct()
    {
        parent::__construct();
        $this->load->model('scanabsen_administrasi_model');
    }

    // Absen Siswa
    public function index()
    {
        $kode_administrasi = $this->session->userdata('kode_administrasi');
        $tata_usaha = $this->tatausaha_model->listing($kode_administrasi);
        $absen = $this->absen_model->listing();
        $data = array(  'title' =>  'Absensi Administrasi',
                        'tata_usaha'    =>  $tata_usaha,
                        'absen'    =>  $absen,
                     );
        $this->load->view('absen_siswa', $data, false);
    }

    public function absen($nip,$date)
    {
        $tata_usaha = $this->tatausaha_model->absen($nip);
        $scanmasuk_hadir = true;
        $scanmasuk_terlambat = true;
        $jam = date("H");
        $waktu = date("Y-m-d");
        if($waktu == $date) {
            if($jam <= 7) {
                $scanmasuk_hadir = $this->scanabsen_administrasi_model->scanmasuk_hadir($nip);
            }else if($jam > 7) {
                $scanmasuk_terlambat = $this->scanabsen_administrasi_model->scanmasuk_terlambat($nip);
            }

            if($scanmasuk_hadir || $scanmasuk_terlambat) {
            echo json_encode($tata_usaha);
            }else{
                echo "gagal";
            }
        }else{
            echo "QR CODE Sudah Kadaluarsa";
        }
    }

    public function scanmasuk_hadir($nip)
    {
        $scanmasuk_hadir = $this->scanabsen_administrasi_model->scanmasuk_hadir($nip);
        return $scanmasuk_hadir;
    }

    public function scanmasuk_terlambat($nip)
    {
        $scanmasuk_terlambat = $this->scanabsen_administrasi_model->scanmasuk_terlambat($nip);
        return $scanmasuk_terlambat;
    }

    public function scankeluar($nip)
    {
        $scankeluar = $this->scanabsen_administrasi_model->scankeluar($nip);
        return $scankeluar;
    }
}
?>