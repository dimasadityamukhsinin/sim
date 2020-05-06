<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Konfigurasi extends CI_Controller {

    // Load Model
    public function __construct()
    {
        parent::__construct();
        $this->load->model('konfigurasi_model');
        $this->load->model('tatausaha_model');
        // Proteksi Halaman
        $this->simple_login_tata_usaha->cek_login();
    }

    // Konfigurasi Umum
    public function index()
    {
        $kode_administrasi = $this->session->userdata('kode_administrasi');
        $tata_usaha = $this->tatausaha_model->listing($kode_administrasi);

        $konfigurasi = $this->konfigurasi_model->listing();

        // Validasi input
        $valid = $this->form_validation;

        $valid->set_rules('nama_sekolah', 'Nama', 'required',
                    array('required' => "%s Harus diisi"));

        if($valid->run()===false){
            // End Validasi

            $data = array(  'title'     =>  'Konfigurasi KAS Sekolah',
                            'konfigurasi'     =>  $konfigurasi,
                            'tata_usaha'    =>  $tata_usaha,
                            'isi'       =>  'tata_usaha/konfigurasi/list'
                         );
            $this->load->view('tata_usaha/layout/wrapper', $data, false);
            // Masuk Database
        }else{
            $i = $this->input;

            $data = array(  'kode_konfigurasi'  =>  $konfigurasi->kode_konfigurasi,
                            'nama_sekolah'      =>  $i->post('nama_sekolah'),
                            'alamat'            =>  $i->post('alamat'),
                            'no_telpon'         =>  $i->post('no_telpon')
                         );
            $this->konfigurasi_model->edit($data);
            $this->session->set_flashdata('sukses', 'Data telah diupdate');
            redirect(base_url('tata_usaha/konfigurasi'), 'refresh');
        }
    }

    // Konfigurasi gambar
    public function gambar()
    {
        $kode_administrasi = $this->session->userdata('kode_administrasi');
        $tata_usaha = $this->tatausaha_model->listing($kode_administrasi);

        $konfigurasi = $this->konfigurasi_model->listing();

        //validasi input
        $valid      = $this->form_validation;
        
        $valid->set_rules('nama_sekolah', 'Nama Sekolah', 'required',
                    array('required'    =>  "%s Harus diisi"));
        
        if($valid->run()){
            //Cek jika gambar diganti
            if(!empty($_FILES['gambar']['name'])){
                
            $config['upload_path']      = './assets/upload/image/';
            $config['allowed_types']    = 'gif|jpg|png|jpeg';
            $config['max_size']         = '2400';//Dalam KB
            $config['max_width']        = '2024';
            $config['max_height']       = '2024';
            
            $this->load->library('upload',$config);
            
            if(!$this->upload->do_upload('gambar')){
            //Akhir Validasi
        
        $data = array(  'title'       => 'Konfigurasi Gambar Sekolah',
                        'konfigurasi'       => $konfigurasi,
                        'tata_usaha'    =>  $tata_usaha,
                        'error'       => $this->upload->display_errors(),
                        'isi'         => 'tata_usaha/konfigurasi/gambar'  );
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
            $config['width']            = 350;//Dalam Pixel
            $config['height']           = 350;//Dalam Pixel
            $config['thumb_marker']     = '';

            $this->load->library('image_lib', $config);

            $this->image_lib->resize();
            //Akhir buat thumbnail
            
            $i = $this->input;

            $data = array(  //Disimpan nama file gambar
                            'gambar'          =>  $upload_gambar['upload_data']['file_name'],
                            'kode_konfigurasi'     =>  $konfigurasi->kode_konfigurasi,
                            'nama_sekolah'           =>  $i->post('nama_sekolah'),
                         );
            $this->konfigurasi_model->edit($data);
            $this->session->set_flashdata('sukses','Data telah diedit');
            redirect(base_url('tata_usaha/konfigurasi/gambar'),'refresh');
            
        }}else{
            //Edit guru tanpa ganti gambar
            $i = $this->input;

            $data = array(  //Disimpan nama file gambar
                            //'gambar'          =>  $upload_gambar['upload_data']['file_name'],
                            'kode_konfigurasi'     =>  $konfigurasi->kode_konfigurasi,
                            'nama_sekolah'           =>  $i->post('nama_sekolah'),
                         );
            $this->konfigurasi_model->edit($data);
            $this->session->set_flashdata('sukses','Data telah diedit');
            redirect(base_url('tata_usaha/konfigurasi/gambar'),'refresh');
        }}
        //akhir masuk database
        $data = array(  'title'       => 'Konfigurasi Gambar Sekolah',
                        'konfigurasi'       => $konfigurasi,
                        'tata_usaha'    =>  $tata_usaha,
                        'isi'         => 'tata_usaha/konfigurasi/gambar'  );
        $this->load->view('tata_usaha/layout/wrapper',$data,FALSE);
    }

    // Konfigurasi Icon
    public function icon()
    {
        $kode_administrasi = $this->session->userdata('kode_administrasi');
        $tata_usaha = $this->tatausaha_model->listing($kode_administrasi);

        $konfigurasi = $this->konfigurasi_model->listing();

        //validasi input
        $valid      = $this->form_validation;
        
        $valid->set_rules('nama_sekolah', 'Nama Sekolah', 'required',
                    array('required'    =>  "%s Harus diisi"));
        
        if($valid->run()){
            //Cek jika icon diganti
            if(!empty($_FILES['icon']['name'])){
                
            $config['upload_path']      = './assets/upload/image/';
            $config['allowed_types']    = 'gif|jpg|png|jpeg';
            $config['max_size']         = '2400';//Dalam KB
            $config['max_width']        = '2024';
            $config['max_height']       = '2024';
            
            $this->load->library('upload',$config);
            
            if(!$this->upload->do_upload('icon')){
            //Akhir Validasi
        
        $data = array(  'title'       => 'Konfigurasi Icon Sekolah',
                        'konfigurasi'       => $konfigurasi,
                        'tata_usaha'    =>  $tata_usaha,
                        'error'       => $this->upload->display_errors(),
                        'isi'         => 'tata_usaha/konfigurasi/icon'  );
        $this->load->view('tata_usaha/layout/wrapper',$data,FALSE);
        //masuk database
        }else{
            $upload_gambar = array('upload_data' => $this->upload->data());
                
            //Buat thumbnail icon
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

            $data = array(  //Disimpan nama file icon
                            'icon'          =>  $upload_gambar['upload_data']['file_name'],
                            'kode_konfigurasi'     =>  $konfigurasi->kode_konfigurasi,
                            'nama_sekolah'           =>  $i->post('nama_sekolah'),
                         );
            $this->konfigurasi_model->edit($data);
            $this->session->set_flashdata('sukses','Data telah diedit');
            redirect(base_url('tata_usaha/konfigurasi/icon'),'refresh');
            
        }}else{
            //Edit guru tanpa ganti icon
            $i = $this->input;

            $data = array(  //Disimpan nama file icon
                            //'icon'          =>  $upload_gambar['upload_data']['file_name'],
                            'kode_konfigurasi'     =>  $konfigurasi->kode_konfigurasi,
                            'nama_sekolah'           =>  $i->post('nama_sekolah'),
                         );
            $this->konfigurasi_model->edit($data);
            $this->session->set_flashdata('sukses','Data telah diedit');
            redirect(base_url('tata_usaha/konfigurasi/icon'),'refresh');
        }}
        //akhir masuk database
        $data = array(  'title'       => 'Konfigurasi Icon Sekolah',
                        'konfigurasi'       => $konfigurasi,
                        'tata_usaha'    =>  $tata_usaha,
                        'isi'         => 'tata_usaha/konfigurasi/icon'  );
        $this->load->view('tata_usaha/layout/wrapper',$data,FALSE);
    }
}
?>