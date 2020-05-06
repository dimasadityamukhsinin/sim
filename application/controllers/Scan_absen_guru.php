<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Scan_absen_guru extends CI_Controller {

    // Load Model
    public function __construct()
    {
        parent::__construct();
        $this->load->model('scanabsen_guru_model');
        $this->load->model('guru_model');
    }

    public function absen($nip,$date)
    {
        $guru = $this->guru_model->guru($nip);
        $scanmasuk_hadir = true;
        $scanmasuk_terlambat = true;
        $jam = date("H");
        $waktu = date("Y-m-d");
        if($waktu == $date) {
            if($jam <= 7) {
                $scanmasuk_hadir = $this->scanabsen_guru_model->scanmasuk_hadir($nip);
            }else if($jam > 7) {
                $scanmasuk_terlambat = $this->scanabsen_guru_model->scanmasuk_terlambat($nip);
            }

            if($scanmasuk_hadir || $scanmasuk_terlambat) {
            echo json_encode($guru);
            }else{
                echo "gagal";
            }
        }else{
            echo "QR CODE Sudah Kadaluarsa";
        }
    }
}
?>