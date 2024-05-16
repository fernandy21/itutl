<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Hamid extends CI_Controller{
    public function __construct(){
        parent::__construct();
        $this->load->helper(['url','form','sia','tgl_indo']);
        $this->load->library(['session','form_validation']);
        $this->load->model('Ip_model','ip',true);
        $this->load->model('Lembur_model','lembur',true);
        $this->load->model('Logdai_model','logdai',true);
        $login = $this->session->userdata('login');
        if(!$login){
        redirect('login');
        }
    }

    public function index(){
        $titleTag = 'Dashboard';
        $content = 'user/itutilities';
        $ip = $this->ip->getIpList();
        $lembur = $this->lembur->getLemburList();
        $lemburpernama = $this->lembur->getLemburGroupNamaByBulan();
        $datauser = $this->logdai->getUsers();
        $log = $this->logdai->getLog();
        $logname = $this->logdai->getLogByName();
        
        foreach ($logname as $row) {
            $data[] = (array) $this->logdai->getLogByNameData($row->NIK);
        }
        
        // echo '<pre>';
        // var_dump($data);
        // echo '</pre>';
        // die();
        // print_r($ip);die();


        $jumlahlogname = count($logname);
        
        $this->load->view('template',compact('content','titleTag','datauser','data','log','jumlahlogname','logname','ip','lembur','lemburpernama'));
    }

    public function printLembur(){
        // $titleTag = 'Dashboard';
        // $content = 'user/printlembur';
        // $ip = $this->ip->getIpList();
        // $lembur = $this->lembur->getLemburId();

        // echo '<pre>';
        // var_dump($lembur);
        // echo '</pre>';
        // die($lembur);
        // print_r($lembur);die();

// $this->load->view('user/printlembur',compact('content','lemburid'));
        $this->load->view('user/printlembur');
    }
    
    public function createLogdai(){
        // Jika data sebelumnya ditemukan, gunakan nilai sebelumnya, jika tidak, gunakan nilai default
        if(!$_POST){
            $data = (object) $this->logdai->getDefaultValues();
        }else{
            $data = array(
                'NIK'=>$this->input->post('NIK',true),
                'tanggal'=>$this->input->post('tanggal',true),
                'judul_act'=>$this->input->post('judul_act',true),
                'deskripsi_act'=>$this->input->post('deskripsi_act',true),
                'catatan'=>$this->input->post('catatan',true)
            );
        }

        // Data baru untuk diinsert
        $data = array(
            'id' => $data[NIK] ."_". date('dmYHis'),
            'NIK' => $data[NIK],
            'tanggal' => $data[tanggal],
            'judul_act' => $data[judul_act],
            'deskripsi_act' => $data[deskripsi_act],
            'catatan' => $data[catatan]
        );
        
        $this->logdai->insertLog($data);
        $this->session->set_flashdata('berhasil','Daily Log Berhasil Di Tambahkan');
        redirect('');    
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
