<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Scan_absen_siswa extends CI_Controller {

    // Load Model
    public function __construct()
    {
        parent::__construct();
        $this->load->model('scanabsen_siswa_model');
        $this->load->model('siswa_model');
    }

    public function absen($nis,$date)
    {
        $siswa = $this->siswa_model->siswa($nis);
        $scanmasuk_hadir = true;
        $scanmasuk_terlambat = true;
        $jam = date("H");
        $waktu = date("Y-m-d");
        if($waktu == $date) {
            if($jam <= 7) {
                $scanmasuk_hadir = $this->scanabsen_siswa_model->scanmasuk_hadir($nis);
            }else if($jam > 7) {
                $scanmasuk_terlambat = $this->scanabsen_siswa_model->scanmasuk_terlambat($nis);
            }

            if($scanmasuk_hadir || $scanmasuk_terlambat) {
            echo json_encode($siswa);
            }else{
                echo "gagal";
            }
        }else{
            echo "QR CODE Sudah Kadaluarsa";
        }
    }
}
?>