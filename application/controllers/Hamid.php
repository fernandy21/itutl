<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Hamid extends CI_Controller{
    public function __construct(){
        parent::__construct();
        $this->load->helper(['url','form','sia','tgl_indo']);
        $this->load->library(['session','form_validation']);
        $this->load->model('Ip_model','ip',true);
        $this->load->model('Lembur_model','lembur',true);
        // $login = $this->session->userdata('login');
        // if(!$login){
        //     redirect('login');
        // }
    }

    public function index(){
        $titleTag = 'Dashboard';
        $content = 'user/itutilities';
        $ip = $this->ip->getIpList();
        $lembur = $this->lembur->getLemburList();

        // echo '<pre>';
        // var_dump($ip);
        // echo '</pre>';
        // die($ip);
        // print_r($ip);die();

        $this->load->view('template',compact('content','titleTag','ip','lembur'));
    }

    public function printLembur(){
        $titleTag = 'Dashboard';
        // $content = 'user/printlembur';
        // $ip = $this->ip->getIpList();
        $lembur = $this->lembur->getLemburId();

        // echo '<pre>';
        // var_dump($lembur);
        // echo '</pre>';
        // die($lembur);
        // print_r($lembur);die();

        $this->load->view('user/printlembur',compact('lembur'));
    }
    
    public function createIp(){
        // Jika data sebelumnya ditemukan, gunakan nilai sebelumnya, jika tidak, gunakan nilai default
        if(!$_POST){
            $data = (object) $this->ip->getDefaultValues();
        }else{
            $data = array(
                'ipaddr'=>$this->input->post('ipaddr',true),
                'name'=>$this->input->post('name',true)
            );
        }

        // Data baru untuk diinsert
        $data = array(
            'ipaddr' => $data[ipaddr],
            'name' => $data[name]
        );
        
        $this->ip->insertIp($data);
        $this->session->set_flashdata('berhasil','Data IP Berhasil Di Tambahkan');
        redirect('');    
    }

    public function updateIp($id) {
        $updated_data = array(
            'ipaddr' => $this->input->post('ipaddr'),
            'name' => $this->input->post('name')
        );

        // Update the data in the database
        $this->ip->updateDataIp($id, $updated_data);
        $this->session->set_flashdata('berhasil','Data IP Berhasil Di Edit');
        redirect('');    
    }

    public function deleteIp($id) {
        // Call the model to delete data
        $this->ip->deleteIp($id);

        // Redirect to a page or show a message indicating success
        $this->session->set_flashdata('berhasil','Data IP Berhasil Di Hapus');
        redirect('');    
    }

    public function logout(){
        // $this->user->logout();
        // redirect('');
        $this->session->sess_destroy();

        // Redirect to the login page or any other page
        redirect('');
    }
}
