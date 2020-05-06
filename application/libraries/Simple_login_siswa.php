<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Simple_login_siswa 
{
    
    protected $CI;
    
    public function __construct()
    {
        $this->CI =& get_instance();
        //Load data model user
        $this->CI->load->model('kelas_model');
    }
    
    //Fungsi Login
    public function login($username,$password)
    {
        $check = $this->CI->kelas_model->login($username,$password);
        //Jika ada data user, maka session untuk login dibuat
        if($check)
        {
            $kode_siswa     = $check->kode_siswa;
            $nama        = $check->nama_siswa;
            //Buat session
            $this->CI->session->set_userdata('kode_siswa',$kode_siswa);
            $this->CI->session->set_userdata('nama_siswa',$nama);
            $this->CI->session->set_userdata('nis',$username);
            //jika sukses tampil halaman admin yang diproteksi
            redirect(base_url('siswa/dashboard'),'refresh');
            
        }else{
            //Kalau username password salah, maka akan disuruh login lagi
            $this->CI->session->set_flashdata('warning','Username atau password salah');
            redirect(base_url('siswa/login'),'refresh');
        }
    }
    
    //Fungsi cek login
    public function cek_login()
    {
        //Mmeriksa apakah session sudah atau atau belum, jika belum alihkan ke halaman login
        if($this->CI->session->userdata('nis') == ""){
            $this->CI->session->set_flashdata('warning','Anda belum login');
            redirect(base_url('siswa/login'),'refresh');
        }
    }
    
    //Fungsi logout
    public function logout()
    {
        // Membuang semua session yang telah diset pada saat login
        $this->CI->session->unset_userdata('kode_siswa');
        $this->CI->session->unset_userdata('nama_siswa');
        $this->CI->session->unset_userdata('nis');
        // Setelah session dibuang, maka dialihkan ke halaman login kembali
        $this->CI->session->set_flashdata('sukses','Anda berhasil logout');
        redirect(base_url('siswa/login'),'refresh');
    }
}