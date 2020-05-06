<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Data_siswa extends CI_Controller {

    // Load Model
    public function __construct()
    {
        parent::__construct();
        $this->load->model('guru_model');
        $this->load->model('pmb_model');
        $this->load->model('datasiswa_model');
        $this->load->model('siswa_model');
        $this->load->model('spp_model');
        $this->load->model('pmb_model');
        $this->load->model('konfigurasi_model');
        // Proteksi Halaman
        $this->simple_login_guru->cek_login();
    }

    // Halaman Dashboard
    public function index() 
    {
        $konfigurasi = $this->konfigurasi_model->listing();
        $kode_guru = $this->session->userdata('kode_guru');
        $guru = $this->guru_model->detail($kode_guru);
        // Catatan
        $datasiswa = $this->datasiswa_model->listing($kode_guru);
        // Ambil data login nis dari session
        $data = array(  'title'         => 'Halaman Data Siswa',
                        'guru'          =>  $guru,
                        'konfigurasi'   =>  $konfigurasi,
                        'datasiswa'     =>  $datasiswa,
                        'isi'           => 'guru/data_siswa/list');
        $this->load->view('guru/layout/wrapper', $data, FALSE);
    }

    // Halaman Data Siswa
    public function siswa($kode_kelas) 
    {
        $konfigurasi = $this->konfigurasi_model->listing();
        $kode_guru = $this->session->userdata('kode_guru');
        $guru = $this->guru_model->detail($kode_guru);
        // Catatan
        $kelas = $this->datasiswa_model->data_siswa($kode_kelas);
        // Ambil data login nis dari session
        $data = array(  'title'             => 'Halaman Data Siswa',
                        'kelas'             =>  $kelas,
                        'guru'              =>  $guru,
                        'konfigurasi'       =>  $konfigurasi,
                        'isi'               => 'guru/data_siswa/siswa');
        $this->load->view('guru/layout/wrapper', $data, FALSE);
    }

    //Data Pembayaran SPP
    public function spp($nis)
    {
        $konfigurasi = $this->konfigurasi_model->listing();
        $kode_guru = $this->session->userdata('kode_guru');
        $guru = $this->guru_model->detail($kode_guru);

        $siswa = $this->spp_model->detail($nis);
            
        $data = array(  'title' =>  'Riwayat Pembayaran SPP Siswa',
                        'siswa' =>  $siswa,
                        'guru'  =>  $guru,
                        'konfigurasi'   =>  $konfigurasi,
                        'isi'   =>  'guru/data_siswa/spp'
                     );
        $this->load->view('guru/layout/wrapper', $data, false);
    }

    //Data Pembayaran Pembangunan
    public function pembangunan($nis)
    {
        $konfigurasi = $this->konfigurasi_model->listing();
        $kode_guru = $this->session->userdata('kode_guru');
        $guru = $this->guru_model->detail($kode_guru);

        $siswa = $this->pmb_model->detail($nis);
        $total_dana = $this->pmb_model->total_masuk($nis);
        $sisa_pmb = $this->pmb_model->sisa_pmb($nis);
        $data = array(  'title'         =>  'Riwayat Pembayaran Pembangunan Siswa',
                        'siswa'         =>  $siswa,
                        'total_dana'    =>  $total_dana,
                        'sisa_pmb'      =>  $sisa_pmb,
                        'guru'          =>  $guru,
                        'konfigurasi'   =>  $konfigurasi,
                        'isi'           =>  'guru/data_siswa/pembangunan'
                     );
        $this->load->view('guru/layout/wrapper', $data, false);
    }

    //Edit siswa
    public function edit($kode_siswa)
    {
        $konfigurasi = $this->konfigurasi_model->listing();
        $kode_guru = $this->session->userdata('kode_guru');
        $guru = $this->guru_model->detail($kode_guru);

        //Ambil data siswa yg akan diedit
        $siswa     = $this->siswa_model->detail($kode_siswa);
        //validasi input
        $valid      = $this->form_validation;
        
        $valid->set_rules('nis', 'NIS', 'required',
                    array('required'    =>  "%s Harus diisi"));

        $valid->set_rules('password', 'Password', 'required',
                    array('required'    =>  "%s Harus diisi"));

        $valid->set_rules('nama', 'Nama Siswa', 'required',
                    array('required'    =>  "%s Harus diisi"));

        $valid->set_rules('kelamin', 'Kelamin', 'required',
                    array('required'    =>  "%s Harus diisi"));

        $valid->set_rules('agama', 'Agama', 'required',
                    array('required'    =>  "%s Harus diisi"));

        $valid->set_rules('alamat', 'Alamat', 'required',
                    array('required' => "%s Harus diisi"));

        $valid->set_rules('notelpon', 'No Telpon', 'required',
                    array('required' => "%s Harus diisi"));

        $valid->set_rules('tempatlahir', 'Tempat Lahir', 'required',
                    array('required' => "%s Harus diisi"));

        $valid->set_rules('tanggallahir', 'Tanggal Lahir', 'required',
                    array('required' => "%s Harus diisi"));

        $valid->set_rules('ortulk', 'Orang Tua Laki-laki', 'required',
                    array('required' => "%s Harus diisi"));

        $valid->set_rules('ortupr', 'Orang Tua Perempuan', 'required',
                    array('required' => "%s Harus diisi"));

        $valid->set_rules('asalsekolah', 'Asal Sekolah', 'required',
                    array('required' => "%s Harus diisi"));
        
        if($valid->run()){
            //Cek jika gambar diganti
            if(!empty($_FILES['gambar']['name'])){
                
            $config['upload_path']      = './assets/upload/image/';
            $config['allowed_types']    = 'gif|jpg|png|jpeg';
            $config['max_size']         = '2400';//Dalam KB
            $config['max_width']        = '2024';
            $config['max_height']       = '2024';
            
            $this->load->library('upload',$config);
            
            if(!$this->upload->do_upload('foto')){
            //Akhir Validasi
        
        $data = array(  'title'       =>    'Edit Siswa : '.$siswa->nama_siswa,
                        'siswa'       =>    $siswa,
                        'konfigurasi' =>    $konfigurasi,
                        'guru'        =>    $guru,
                        'error'       =>    $this->upload->display_errors(),
                        'isi'         =>    'guru/data_siswa/edit'  );
        $this->load->view('guru/layout/wrapper',$data,FALSE);
        //masuk database
        }else{
            $upload_gambar = array('upload_data' => $this->upload->data());
                
            //Buat thumbnail gambar
            $config['image_library']    = 'gd2';
            $config['source_image']     = './assets/upload/image/'.$upload_gambar['upload_data']['file_name'];
            //lokasi folder thumbnail
            $config['new_image']        = './assets/upload/image/thumbs/';
            $config['create_thumb']     = TRUE;
            $config['maintain_ratio']   = TRUE;
            $config['width']            = 350;//Dalam Pixel
            $config['height']           = 350;//Dalam Pixel
            $config['thumb_marker']     = '';

            $this->load->library('image_lib', $config);

            $this->image_lib->resize();
            //Akhir buat thumbnail
            
            $i = $this->input;

            $data = array(  //Disimpan nama file gambar
                            'foto'          =>  $upload_gambar['upload_data']['file_name'],
                            'kode_siswa'     =>  $kode_siswa,
                            'nis'           =>  $i->post('nis'),
                            'password'      =>  $i->post('password'),
                            'nama_siswa'     =>  $i->post('nama'),
                            'kelamin'       =>  $i->post('kelamin'),
                            'agama'         =>  $i->post('agama'),
                            'alamat'        =>  $i->post('alamat'),
                            'no_telpon'     =>  $i->post('notelpon'),
                            'tempat_lahir'  =>  $i->post('tempatlahir'),
                            'tanggal_lahir' =>  $i->post('tanggallahir'),
                            'ortu_lk'       =>  $i->post('ortulk'),
                            'ortu_pr'       =>  $i->post('ortupr'),
                            'asal_sekolah'  =>  $i->post('asalsekolah'),
                         );
            $this->siswa_model->edit($data);
            $this->session->set_flashdata('sukses','Data telah diedit');
            redirect(base_url('guru/data_siswa'),'refresh');
            
        }}else{
            //Edit guru tanpa ganti gambar
            $i = $this->input;

            $data = array(  //Disimpan nama file gambar(gambar tidak diganti)
                            // 'foto'          =>  $upload_gambar['upload_data']['file_name'],
                            'kode_siswa'     =>  $kode_siswa,
                            'nis'           =>  $i->post('nis'),
                            'password'      =>  $i->post('password'),
                            'nama_siswa'     =>  $i->post('nama'),
                            'kelamin'       =>  $i->post('kelamin'),
                            'agama'         =>  $i->post('agama'),
                            'alamat'        =>  $i->post('alamat'),
                            'no_telpon'     =>  $i->post('notelpon'),
                            'tempat_lahir'  =>  $i->post('tempatlahir'),
                            'tanggal_lahir' =>  $i->post('tanggallahir'),
                            'ortu_lk'       =>  $i->post('ortulk'),
                            'ortu_pr'       =>  $i->post('ortupr'),
                            'asal_sekolah'  =>  $i->post('asalsekolah'),
                         );
            $this->siswa_model->edit($data);
            $this->session->set_flashdata('sukses','Data telah diedit');
            redirect(base_url('guru/data_siswa'),'refresh');
        }}
        //akhir masuk database
        $data = array('title'   => 'Edit Siswa : '.$siswa->nama_siswa,
                      'siswa'    => $siswa,
                      'guru'    =>  $guru,
                      'konfigurasi' =>  $konfigurasi,
                      'isi'     => 'guru/data_siswa/edit'  );
        $this->load->view('guru/layout/wrapper',$data,FALSE);
    }

    // Detail Siswa
    public function detail($kode_siswa)
    {
        $konfigurasi = $this->konfigurasi_model->listing();
        $kode_guru = $this->session->userdata('kode_guru');
        $guru = $this->guru_model->detail($kode_guru);

        $siswa = $this->siswa_model->detail($kode_siswa);
        $data = array(  'title' =>  'Detail data : '.$siswa->nama_siswa,
                        'siswa'  =>  $siswa,
                        'guru'    =>  $guru,
                        'konfigurasi'   =>  $konfigurasi,
                        'isi'   =>  'guru/data_siswa/detail'
                     );
        $this->load->view('guru/layout/wrapper', $data, false);
    }

    // Cetak Siswa
    public function cetak($kode_siswa)
    {
        $konfigurasi = $this->konfigurasi_model->listing();
        $siswa = $this->siswa_model->detail($kode_siswa);
        $data = array(  'title' =>  $siswa->nama_siswa,
                        'siswa'  =>  $siswa,
                        'konfigurasi'   =>  $konfigurasi
                     );
        $this->load->view('guru/data_siswa/cetak', $data, false);
    }
}
?>