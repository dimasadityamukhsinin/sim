<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Login extends CI_Controller{

    // Load Model
    public function __construct()
    {
        parent::__construct();
        $this->load->model('login_model');
    }
    
    public function index()
    {
        $result = array();
        $nis = $this->input->post('nis');
        $password = $this->input->post('password');
        $login = $this->login_model->listing($nis, $password);
        if(isset($login)) {
            $result['value'] = 1;
            $result['message'] = 'Login berhasil';
            echo json_encode($result);
            echo json_encode($login);
        }else {
            $result['value'] = 0;
            $result['message'] = 'Login gagal';
            echo json_encode($result);
        }
    }
}
?>