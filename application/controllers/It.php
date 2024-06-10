<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class It extends CI_Controller{
    public function __construct(){
        parent::__construct();
        $this->load->helper(['url','form','sia','tgl_indo']);
        $this->load->library(['session','form_validation']);
        $this->load->model('Ip_model','ip',true);
        $this->load->model('Remote_model','rmt',true);
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
        $rmt = $this->rmt->getRemoteList();
        $lembur = $this->lembur->getLemburList();
        $lemburpernama = $this->lembur->getLemburGroupNamaByBulan();
        $datauser = $this->logdai->getUsers();
        $alllog = $this->logdai->getAllLog();
        $logweekly = $this->logdai->getLogWeekly();
        $logname = $this->logdai->getLogByName();
        
        foreach ($logname as $row) {
            $data[] = (array) $this->logdai->getLogByNameData($row->NIK);
        }
        
        // echo '<pre>';
        // var_dump($alllog);
        // echo '</pre>';
        // die();
        // print_r($ip);die();

        $jumlahlogname = count($logname);
        
        $this->load->view('template',compact(
            'content',
            'titleTag',
            'datauser',
            'data',
            'alllog','logweekly',
            'jumlahlogname',
            'logname',
            'ip',
            'lembur',
            'lemburpernama',
            'rmt'
        ));
    }

    public function printLembur(){
        $this->load->view('user/printlembur');
    }
    
    public function createLogdai(){
        // if(!$_POST){
        //     $data = (object) $this->logdai->getDefaultValues();
        // }else{
        //     $data = array(
        //         'NIK'=>$this->input->post('NIK',true),
        //         'tanggal'=>$this->input->post('tanggal',true),
        //         'judul_act'=>$this->input->post('judul_act',true),
        //         'deskripsi_act'=>$this->input->post('deskripsi_act',true),
        //         'catatan'=>$this->input->post('catatan',true)
        //     );
        // }

        // // Data baru untuk diinsert
        // $data = array(
        //     'id' => $data[NIK] ."_". date('dmYHis'),
        //     'NIK' => $data[NIK],
        //     'tanggal' => $data[tanggal],
        //     'judul_act' => $data[judul_act],
        //     'deskripsi_act' => $data[deskripsi_act],
        //     'catatan' => $data[catatan]
        // );
        
        // $this->logdai->insertLog($data);
        // $this->session->set_flashdata('berhasil','Daily Log Berhasil Di Tambahkan');
        // redirect('');

        // Jika data sebelumnya ditemukan, gunakan nilai sebelumnya, jika tidak, gunakan nilai default
        if(!$_POST){
            $data = (object) $this->logdai->getDefaultValues();
        }else{
            if($this->input->post('id',true)){
                $data = array(
                    'id'=>$this->input->post('id',true),
                    'NIK'=>$this->input->post('NIK',true),
                    'tanggal'=>$this->input->post('tanggal',true),
                    'judul_act'=>$this->input->post('judul_act',true),
                    'deskripsi_act'=>$this->input->post('deskripsi_act',true),
                    'catatan'=>$this->input->post('catatan',true)
                );
            }else{
                $data = array(
                    'NIK'=>$this->input->post('NIK',true),
                    'tanggal'=>$this->input->post('tanggal',true),
                    'judul_act'=>$this->input->post('judul_act',true),
                    'deskripsi_act'=>$this->input->post('deskripsi_act',true),
                    'catatan'=>$this->input->post('catatan',true)
                );
            }
        }
        if(count($data[id])>0){
            $id = $data[id];
            // echo '<pre>';
            // var_dump($data);
            // echo '</pre>';
            // die();
            // unset($data[id]);
            
            $this->logdai->updateDataLog($id,$data);
            $this->session->set_flashdata('berhasil','Data Log Berhasil Di Edit ');
        }else{
            $data = array(
                'id' => $data[NIK] ."_". date('dmYHis'),
                'NIK' => $data[NIK],
                'tanggal' => $data[tanggal],
                'judul_act' => $data[judul_act],
                'deskripsi_act' => $data[deskripsi_act],
                'catatan' => $data[catatan]
            );  
            $this->logdai->insertLog($data);
            $this->session->set_flashdata('berhasil','Data Log Berhasil Di Tambahkan ');
        }
        redirect(''); 
    }
    
    public function deleteLog($id, $judul_act) {
        $this->logdai->deleteLog($id);
        $this->session->set_flashdata('berhasil', 'Data Log <b>' . urldecode($judul_act) . '</b> Berhasil Di Hapus');
        redirect('');
    }
    

    public function createIp(){
        if(!$_POST){
            $data = (object) $this->ip->getDefaultValues();
        }else{
            $data = array(
                'ipaddr'=>$this->input->post('ipaddr',true),
                'name'=>$this->input->post('name',true)
            );
        }

        $data = array(
            'ipaddr' => $data[ipaddr],
            'name' => $data[name]
        );
        
        $this->ip->insertIp($data);
        $this->session->set_flashdata('berhasil','Data IP Berhasil Di Tambahkan');
        redirect('');    
    }

    public function createRemote(){
        // Jika data sebelumnya ditemukan, gunakan nilai sebelumnya, jika tidak, gunakan nilai default
        if(!$_POST){
            $data = (object) $this->rmt->getDefaultValues();
        }else{
            if($this->input->post('id',true)){
                $data = array(
                    'id'=>$this->input->post('id',true),
                    'RemoteAddr'=>$this->input->post('remoteaddr',true),
                    'Nama'=>$this->input->post('name',true)
                );
            }else{
                $data = array(
                    'RemoteAddr'=>$this->input->post('remoteaddr',true),
                    'Nama'=>$this->input->post('name',true)
                );
            }
        }
        if(count($data[id])>0){
            $id = $data[id];
            unset($data[id]);
            $this->rmt->updateDataRemote($id,$data);
        }else{
            $this->rmt->insertRemote($data);
        }
        $this->session->set_flashdata('berhasil','Data Remote Berhasil Di Tambahkan ');
        redirect('');    
    }
    
    public function deleteRemote($id) {
        $this->rmt->deleteRemote($id);

        // Redirect to a page or show a message indicating success
        $this->session->set_flashdata('berhasil','Data Remote Berhasil Di Hapus');
        redirect('');    
    }
    
    public function updateIp($id) {
        $updated_data = array(
            'ipaddr' => $this->input->post('ipaddr'),
            'name' => $this->input->post('name')
        );

        $this->ip->updateDataIp($id, $updated_data);
        $this->session->set_flashdata('berhasil','Data IP Berhasil Di Edit');
        redirect('');    
    }

    public function deleteIp($id) {
        $this->ip->deleteIp($id);

        $this->session->set_flashdata('berhasil','Data IP Berhasil Di Hapus');
        redirect('');    
    }

    public function logout(){
        // $this->user->logout();
        // redirect('');
        $this->session->sess_destroy();

        redirect('');
    }
}
