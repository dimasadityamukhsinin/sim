<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Siswa extends CI_Controller {

    // Load Model
    public function __construct()
    {
        parent::__construct();
        $this->load->model('siswa_model');
        $this->load->model('tatausaha_model');
        $this->load->model('konfigurasi_model');
        // Proteksi Halaman
        $this->simple_login_tata_usaha->cek_login();
    }

    // Data Siswa
    public function index() 
    {
        $konfigurasi = $this->konfigurasi_model->listing();
        $kode_administrasi = $this->session->userdata('kode_administrasi');
        $tata_usaha = $this->tatausaha_model->listing($kode_administrasi);

        $siswa = $this->siswa_model->listing();
        $data = array(  'title' =>  'Data Siswa',
                        'siswa' =>  $siswa,
                        'konfigurasi'   =>  $konfigurasi,
                        'tata_usaha'    =>  $tata_usaha,
                        'isi'   =>  'tata_usaha/siswa/list'
                     );
        $this->load->view('tata_usaha/layout/wrapper', $data, false);
    }

    //Tambah Siswa
    public function tambah()
    {
        $konfigurasi = $this->konfigurasi_model->listing();
        $kode_administrasi = $this->session->userdata('kode_administrasi');
        $tata_usaha = $this->tatausaha_model->listing($kode_administrasi);

        //Validasi input
        $valid = $this->form_validation;
        
        $valid->set_rules('nis', 'NIS', 'required|is_unique[siswa.nis]',
                    array('required'    =>  "%s Harus diisi",
                          'is_unique'   =>  "%s Sudah ada. Buat NIS baru."));

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
            $config['upload_path']      = './assets/upload/image/';
            $config['allowed_types']    = 'gif|jpg|png|jpeg';
            $config['max_size']         = '2400';//Dalam KB
            $config['max_width']        = '2024';
            $config['max_height']       = '2024';
            
            $this->load->library('upload',$config);
            
            if(!$this->upload->do_upload('foto')){
                
        //End validasi
            
        $data = array(  'title' => 'Tambah Siswa',
                        'tata_usaha'    =>  $tata_usaha,
                        'konfigurasi'   =>  $konfigurasi,
                        'error' => $this->upload->display_errors(),
                        'isi'   => 'tata_usaha/siswa/tambah');
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
                            'nis'           =>  $i->post('nis'),
                            'password'      =>  $i->post('password'),
                            'nama_siswa'    =>  $i->post('nama'),
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
            $this->siswa_model->tambah($data);
            $this->session->set_flashdata('sukses','Data telah ditambah');
            redirect(base_url('tata_usaha/siswa'),'refresh');
        }}
        //Akhir masuk database
        $data = array(  'title' => 'Tambah Siswa',
                        'tata_usaha'    =>  $tata_usaha,
                        'konfigurasi'   =>  $konfigurasi,
                        'isi'   => 'tata_usaha/siswa/tambah');
        $this->load->view('tata_usaha/layout/wrapper',$data,FALSE);
    }

    //Edit siswa
    public function edit($kode_siswa)
    {
        $kode_administrasi = $this->session->userdata('kode_administrasi');
        $tata_usaha = $this->tatausaha_model->listing($kode_administrasi);
        $konfigurasi = $this->konfigurasi_model->listing();

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
        
        $data = array(  'title'       => 'Edit Siswa : '.$siswa->nama_siswa,
                        'siswa'       => $siswa,
                        'konfigurasi'   =>  $konfigurasi,
                        'tata_usaha'    =>  $tata_usaha,
                        'error'       => $this->upload->display_errors(),
                        'isi'         => 'tata_usaha/siswa/edit'  );
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
            redirect(base_url('tata_usaha/siswa'),'refresh');
            
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
            redirect(base_url('tata_usaha/siswa'),'refresh');
        }}
        //akhir masuk database
        $data = array('title'   => 'Edit Siswa : '.$siswa->nama_siswa,
                      'siswa'    => $siswa,
                      'konfigurasi' =>  $konfigurasi,
                      'tata_usaha'    =>  $tata_usaha,
                      'isi'     => 'tata_usaha/siswa/edit'  );
        $this->load->view('tata_usaha/layout/wrapper',$data,FALSE);
    }

    // Detail Siswa
    public function detail($kode_siswa)
    {
        $konfigurasi = $this->konfigurasi_model->listing();
        $kode_administrasi = $this->session->userdata('kode_administrasi');
        $tata_usaha = $this->tatausaha_model->listing($kode_administrasi);

        $siswa = $this->siswa_model->detail($kode_siswa);
        $data = array(  'title' =>  'Detail data : '.$siswa->nama_siswa,
                        'siswa'  =>  $siswa,
                        'konfigurasi'   =>  $konfigurasi,
                        'tata_usaha'    =>  $tata_usaha,
                        'isi'   =>  'tata_usaha/siswa/detail'
                     );
        $this->load->view('tata_usaha/layout/wrapper', $data, false);
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
        $this->load->view('tata_usaha/siswa/cetak', $data, false);
    }
    
    // Delete Siswa
    public function delete($kode_siswa)
    {
        $data = array('kode_siswa' => $kode_siswa);

        $this->siswa_model->delete($data);
        $this->session->set_flashdata('sukses', 'Data telah dihapus');
        redirect(base_url('tata_usaha/siswa'), 'refresh');
    }

}
?>