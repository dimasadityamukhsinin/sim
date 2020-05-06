<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Simple_login_guru 
{
    
    protected $CI;
    
    public function __construct()
    {
        $this->CI =& get_instance();
        //Load data model user
        $this->CI->load->model('guru_model');
    }
    
    //Fungsi Login
    public function login($username,$password)
    {
        $check = $this->CI->guru_model->login($username,$password);
        //Jika ada data user, maka session untuk login dibuat
        if($check)
        {
            $kode_guru     = $check->kode_guru;
            $nama        = $check->nama_guru;
            //Buat session
            $this->CI->session->set_userdata('kode_guru',$kode_guru);
            $this->CI->session->set_userdata('nama_guru',$nama);
            $this->CI->session->set_userdata('nip',$username);
            //jika sukses tampil halaman admin yang diproteksi
            redirect(base_url('guru/dashboard'),'refresh');
            
        }else{
            //Kalau username password salah, maka akan disuruh login lagi
            $this->CI->session->set_flashdata('warning','nip atau password salah');
            redirect(base_url('guru/login'),'refresh');
        }
    }
    
    //Fungsi cek login
    public function cek_login()
    {
        //Mmeriksa apakah session sudah atau belum, jika belum alihkan ke halaman login
        if($this->CI->session->userdata('nip') == ""){
            $this->CI->session->set_flashdata('warning','Anda belum login');
            redirect(base_url('guru/login'),'refresh');
        }
    }
    
    //Fungsi logout
    public function logout()
    {
        // Membuang semua session yang telah diset pada saat login
        $this->CI->session->unset_userdata('kode_guru');
        $this->CI->session->unset_userdata('nama_guru');
        $this->CI->session->unset_userdata('nip');
        // Setelah session dibuang, maka dialihkan ke halaman login kembali
        $this->CI->session->set_flashdata('sukses','Anda berhasil logout');
        redirect(base_url('guru/login'),'refresh');
    }
}