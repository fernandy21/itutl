<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Landpage extends CI_Controller {
    public function __construct(){
        parent::__construct();
        $this->load->helper(['url','form','sia','tgl_indo']);
        $this->load->library(['session','form_validation']);
    }
    public function index() {
        // $data['title'] = "Home Page";
        // $data['content'] = 'home'; // Nama file view
        $titleTag = 'Dashboard';
        $content = 'user/landpage';
        // $data['is_logged_in'] = $this->session->userdata('login');
        $login = $this->session->userdata('login');

        $this->load->view('templatemat', compact('login','titleTag','content'));
    }
}
