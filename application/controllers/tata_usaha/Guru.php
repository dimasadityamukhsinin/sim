<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Guru extends CI_Controller {

    // Load Model
    public function __construct()
    {
        parent::__construct();
        $this->load->model('guru_model');
        $this->load->model('spp_model');
        $this->load->model('tatausaha_model');
        $this->load->model('konfigurasi_model');
        // Proteksi Halaman
        $this->simple_login_tata_usaha->cek_login();
    }

    // Data Guru
    public function index() 
    {
        $kode_administrasi = $this->session->userdata('kode_administrasi');
        $tata_usaha = $this->tatausaha_model->listing($kode_administrasi);

        $guru = $this->guru_model->listing();
        $konfigurasi = $this->konfigurasi_model->listing();
        $data = array(  'title' =>  'Data Guru',
                        'guru' =>  $guru,
                        'konfigurasi'   =>  $konfigurasi,
                        'tata_usaha'    =>  $tata_usaha,
                        'isi'   =>  'tata_usaha/guru/list'
                     );
        $this->load->view('tata_usaha/layout/wrapper', $data, false);
    }

    //Tambah produk
    public function tambah()
    {
        $kode_administrasi = $this->session->userdata('kode_administrasi');
        $tata_usaha = $this->tatausaha_model->listing($kode_administrasi);
        $konfigurasi = $this->konfigurasi_model->listing();

        //Validasi input
        $valid = $this->form_validation;
        
        $valid->set_rules('nip', 'NIP', 'required|is_unique[guru.nip]',
                    array('required'    =>  "%s Harus diisi",
                          'is_unique'   =>  "%s Sudah ada. Buat NIP baru."));

        $valid->set_rules('password', 'Password', 'required',
                    array('required'    =>  "%s Harus diisi"));

        $valid->set_rules('nama', 'Nama Guru', 'required',
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
        
        if($valid->run()){
            $config['upload_path']      = './assets/upload/image/';
            $config['allowed_types']    = 'gif|jpg|png|jpeg';
            $config['max_size']         = '2400';//Dalam KB
            $config['max_width']        = '2024';
            $config['max_height']       = '2024';
            
            $this->load->library('upload',$config);
            
            if(!$this->upload->do_upload('foto')){
                
        //End validasi
            
        $data = array(  'title'     => 'Tambah Guru',
                        'tata_usaha'    =>  $tata_usaha,
                        'konfigurasi'   =>  $konfigurasi,
                        'error'     => $this->upload->display_errors(),
                        'isi'       => 'tata_usaha/guru/tambah');
        $this->load->view('tata_usaha/layout/wrapper',$data,FALSE);
        //Masuk Database
        }else{
            $upload_gambar = array('upload_data' => $this->upload->data());
                
            //Buat Thumbnail gambar
            $config['image_library']    = 'gd2';
            $config['source_image']     = './assets/upload/image/'.$upload_gambar['upload_data']['file_name'];
            //Lokasi Thumbnail
            $config['new_image']        = './assets/upload/image/thumbs/';
            $config['create_thumb']     = TRUE;
            $config['maintain_ratio']   = TRUE;
            $config['width']            = 350;//Pixel
            $config['height']           = 350;//Pixel
            $config['thumb_marker']     = '';

            $this->load->library('image_lib', $config);

            $this->image_lib->resize();
            //Akhir Buat Thumbnail
                
            $i = $this->input;   
            
            $data = array(  'foto'          =>  $upload_gambar['upload_data']['file_name'],
                            'nip'           =>  $i->post('nip'),
                            'password'      =>  $i->post('password'),
                            'nama_guru'     =>  $i->post('nama'),
                            'kelamin'       =>  $i->post('kelamin'),
                            'agama'         =>  $i->post('agama'),
                            'alamat'        =>  $i->post('alamat'),
                            'no_telpon'     =>  $i->post('notelpon'),
                            'tempat_lahir'  =>  $i->post('tempatlahir'),
                            'tanggal_lahir' =>  $i->post('tanggallahir'),
                         );
            $this->guru_model->tambah($data);
            $this->session->set_flashdata('sukses','Data telah ditambah');
            redirect(base_url('tata_usaha/guru'),'refresh');
        }}
        //Akhir masuk database
        $data = array(  'title'     => 'Tambah Guru',
                        'tata_usaha'    =>  $tata_usaha,
                        'konfigurasi'   =>  $konfigurasi,
                        'isi'       => 'tata_usaha/guru/tambah');
        $this->load->view('tata_usaha/layout/wrapper',$data,FALSE);
    }

    //Edit Guru
    public function edit($kode_guru)
    {
        $kode_administrasi = $this->session->userdata('kode_administrasi');
        $tata_usaha = $this->tatausaha_model->listing($kode_administrasi);
        $konfigurasi = $this->konfigurasi_model->listing();

        //Ambil data guru yg akan diedit
        $guru     = $this->guru_model->detail($kode_guru);
        //validasi input
        $valid      = $this->form_validation;
        
        $valid->set_rules('nip', 'NIP', 'required',
                    array('required'    =>  "%s Harus diisi"));

        $valid->set_rules('password', 'Password', 'required',
                    array('required'    =>  "%s Harus diisi"));

        $valid->set_rules('nama', 'Nama Guru', 'required',
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
        
        if($valid->run()){
            //Cek jika gambar diganti
            if(!empty($_FILES['foto']['name'])){
                
            $config['upload_path']      = './assets/upload/image/';
            $config['allowed_types']    = 'gif|jpg|png|jpeg';
            $config['max_size']         = '2400';//Dalam KB
            $config['max_width']        = '2024';
            $config['max_height']       = '2024';
            
            $this->load->library('upload',$config);
            
            if(!$this->upload->do_upload('foto')){
            //Akhir Validasi
        
        $data = array(  'title'       => 'Edit Guru',
                        'guru'       => $guru,
                        'konfigurasi'   =>  $konfigurasi,
                        'tata_usaha'    =>  $tata_usaha,
                        'error'       => $this->upload->display_errors(),
                        'isi'         => 'tata_usaha/guru/edit'  );
        $this->load->view('tata_usaha/layout/wrapper',$data,FALSE);
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
            $config['width']            = 250;//Dalam Pixel
            $config['height']           = 250;//Dalam Pixel
            $config['thumb_marker']     = '';

            $this->load->library('image_lib', $config);

            $this->image_lib->resize();
            //Akhir buat thumbnail
            
            $i = $this->input;
            
            $data = array(  //Disimpan nama file gambar
                            'foto'          =>  $upload_gambar['upload_data']['file_name'],
                            'kode_guru'     =>  $kode_guru,
                            'nip'           =>  $i->post('nip'),
                            'password'      =>  $i->post('password'),
                            'nama_guru'     =>  $i->post('nama'),
                            'kelamin'       =>  $i->post('kelamin'),
                            'agama'         =>  $i->post('agama'),
                            'alamat'        =>  $i->post('alamat'),
                            'no_telpon'     =>  $i->post('notelpon'),
                            'tempat_lahir'  =>  $i->post('tempatlahir'),
                            'tanggal_lahir' =>  $i->post('tanggallahir'),
                         );
            $this->guru_model->edit($data);
            $this->session->set_flashdata('sukses','Data telah diedit');
            redirect(base_url('tata_usaha/guru'),'refresh');
            
        }}else{
            //Edit produk tanpa ganti gambar
            $i = $this->input;
            
            $data = array(  //Disimpan nama file gambar(gambar tidak diganti)
                            // 'foto'          =>  $upload_gambar['upload_data']['file_name'],
                            'kode_guru'     =>  $kode_guru,
                            'nip'           =>  $i->post('nip'),
                            'password'      =>  $i->post('password'),
                            'nama_guru'     =>  $i->post('nama'),
                            'kelamin'       =>  $i->post('kelamin'),
                            'agama'         =>  $i->post('agama'),
                            'alamat'        =>  $i->post('alamat'),
                            'no_telpon'     =>  $i->post('notelpon'),
                            'tempat_lahir'  =>  $i->post('tempatlahir'),
                            'tanggal_lahir' =>  $i->post('tanggallahir'),
                         );
            $this->guru_model->edit($data);
            $this->session->set_flashdata('sukses','Data telah diedit');
            redirect(base_url('tata_usaha/guru'),'refresh');
        }}
        //akhir masuk database
        $data = array(  'title'     => 'Edit Guru : '.$guru->nama_guru,
                        'guru'      => $guru,
                        'konfigurasi'   =>  $konfigurasi,
                        'tata_usaha'    =>  $tata_usaha,
                        'isi'       => 'tata_usaha/guru/edit'  );
        $this->load->view('tata_usaha/layout/wrapper',$data,FALSE);
    }

    // Detail Guru
    public function detail($kode_guru)
    {
        $kode_administrasi = $this->session->userdata('kode_administrasi');
        $tata_usaha = $this->tatausaha_model->listing($kode_administrasi);

        $guru = $this->guru_model->detail($kode_guru);
        $konfigurasi = $this->konfigurasi_model->listing();
        $data = array(  'title' =>  'Detail data : '.$guru->nama_guru,
                        'guru'  =>  $guru,
                        'konfigurasi'   =>  $konfigurasi,
                        'tata_usaha'    =>  $tata_usaha,
                        'isi'   =>  'tata_usaha/guru/detail'
                     );
        $this->load->view('tata_usaha/layout/wrapper', $data, false);
    }

    // Cetak Guru
    public function cetak($kode_guru)
    {
        $konfigurasi = $this->konfigurasi_model->listing();
        $guru = $this->guru_model->detail($kode_guru);
        $data = array(  'title' =>  $guru->nama_guru,
                        'guru'  =>  $guru,
                        'konfigurasi'   =>  $konfigurasi,
                     );
        $this->load->view('tata_usaha/guru/cetak', $data, false);
    }
    
    // Delete Guru
    public function delete($kode_guru)
    {
        $guru = $this->guru_model->detail($kode_guru);
        $data = array('kode_guru' => $kode_guru);

        $this->guru_model->delete($data);
        $this->session->set_flashdata('sukses', 'Data telah dihapus');
        redirect(base_url('tata_usaha/guru'), 'refresh');
    }

}
?>