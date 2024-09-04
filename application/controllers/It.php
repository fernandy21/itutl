<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class It extends CI_Controller{
    public function __construct(){
        parent::__construct();
        $this->load->library('curl');
        $this->load->helper(['url','form']);
        $this->load->library(['session','form_validation']);
        $this->load->model('Ip_model','ip',true);
        $this->load->model('Remote_model','rmt',true);
        $this->load->model('Lembur_model','lembur',true);
        $this->load->model('Logdai_model','logdai',true);
        $this->load->model('Tinta_model','tinta',true);
        // $this->load->view('user/landpage');
        $login = $this->session->userdata('login');
        if(!$login){
            redirect('login');
        }
    }
    
    public function index() {
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
        $tinta = $this->tinta->getDataTinta();

        $username = $this->session->userdata('username');
        $this->session->set_userdata('username', $username);
        $isAtem = ($username === 'ATEM');
            
        // echo '<pre>';
        // var_dump($isAtem);
        // echo '</pre>';
        // die();
    
        // Mengambil data ruangan dari API
        $urlRuangan = DEFINED_URL('getRuangan');
        $responseRuangan = $this->curl->simple_get($urlRuangan);
        $ruangan = ($responseRuangan === FALSE) ? [] : json_decode($responseRuangan, true);

        // Mengambil data suhu dan kelembapan untuk setiap ruangan
        foreach ($ruangan as &$r) {
            // Get current temperature and humidity
            $urlTempNow = DEFINED_URL('getTempNow') . '/' . $r['id_ruangan'];
            $responseTempNow = $this->curl->simple_get($urlTempNow);
            if ($responseTempNow === FALSE) {
                $tempNow = [];
            } else {
                $tempNow = json_decode($responseTempNow, true);
                if (json_last_error() !== JSON_ERROR_NONE) {
                    $tempNow = []; // Handle JSON decoding errors
                }
            }

            // Get monitoring schedule
            $urlJadwalMonit = DEFINED_URL('getJadwalMonitoring') . '/' . $r['id_ruangan'];
            $responseJadwalMonit = $this->curl->simple_get($urlJadwalMonit);
            if ($responseJadwalMonit === FALSE) {
                $JadwalMonit = [];
            } else {
                $JadwalMonit = json_decode($responseJadwalMonit, true);
                if (json_last_error() !== JSON_ERROR_NONE) {
                    $JadwalMonit = []; // Handle JSON decoding errors
                }
            }

            // Initialize an empty array to hold multiple schedules
            $r['jadwal'] = [];
            
            if (!empty($JadwalMonit)) {
                foreach ($JadwalMonit as $jadwal) {
                    $r['jadwal'][] = [
                        'id_jadwal' => $jadwal['id_jadwal'],
                        'id_item' => $jadwal['id_item'],
                        'waktu_sampling_jadwal' => $jadwal['waktu_sampling']
                    ];
                }

                // Update ruangan with temperature and humidity info
                $r['actual_temperature'] = $tempNow['actual_temperature'] ?? 'N/A';
                $r['actual_humidity'] = $tempNow['actual_humidity'] ?? 'N/A';
                $r['weighted_temperature'] = $tempNow['weighted_temperature'] ?? 'N/A';
                $r['weighted_humidity'] = $tempNow['weighted_humidity'] ?? 'N/A';
            } else {
                // Handle case where no schedules are returned
                $r['jadwal'][] = [
                    'id_jadwal' => 'N/A',
                    'id_item' => 'N/A',
                    'waktu_sampling_jadwal' => 'N/A'
                ];
            }
        }
    
        // Data Detail Ruangan (jika ada input POST)
        if ($this->input->is_ajax_request() && $this->input->post('data')) {
            $urlDetail = DEFINED_URL('getHistorySpec');
            $postData = array('id_item' => $this->input->post('data'));
        
            // Make POST request
            $ch = curl_init($urlDetail);
            curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
            curl_setopt($ch, CURLOPT_POST, true);
            curl_setopt($ch, CURLOPT_HTTPHEADER, array('Content-Type: application/json'));
            curl_setopt($ch, CURLOPT_POSTFIELDS, json_encode($postData));
        
            $detailResponse = curl_exec($ch);
            curl_close($ch);
        
            // Decode the JSON response
            $detailData = json_decode($detailResponse, true);
        
            // Sort the data by timestamp
            if (isset($detailData['data']) && is_array($detailData['data'])) {
                usort($detailData['data'], function($a, $b) {
                    $dateA = DateTime::createFromFormat('d-m-Y H:i:s', $a['timestamp']);
                    $dateB = DateTime::createFromFormat('d-m-Y H:i:s', $b['timestamp']);
                    return $dateB <=> $dateA;
                });
            
                // Batasi data ke 10 item terbaru, lalu urutkan ascending
                $detailData['data'] = array_slice($detailData['data'], 0, 40);
                $detailData['data'] = array_reverse($detailData['data']);
            }
        
            // Output JSON response
            header('Content-Type: application/json');
            echo json_encode($detailData);
            exit;
        }
    
        foreach ($logname as $row) {
            $data[] = (array) $this->logdai->getLogByNameData($row->NIK);
        }
    
        $jumlahlogname = count($logname);
    
        $this->load->view('template', compact(
            'content',
            'titleTag',
            'datauser',
            'data',
            'alllog',
            'logweekly',
            'jumlahlogname',
            'logname',
            'ip',
            'lembur',
            'lemburpernama',
            'rmt',
            'tinta',
            'isAtem',
            'ruangan'
        ));
    }
    

    public function printLembur(){
        $this->load->view('user/printlembur');
    }
    
    public function createLogdai(){
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
                    'NIK'=>$this->input->post('user',true),
                    'tanggal'=>$this->input->post('tanggal',true),
                    'judul_act'=>$this->input->post('judul_act',true),
                    'deskripsi_act'=>$this->input->post('deskripsi_act',true),
                    'catatan'=>$this->input->post('catatan',true)
                );
            }
        }
        if(count($data[id])>0){
            $id = $data[id];
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
        redirect('it'); 
    }
    
    public function deleteLog($id, $explain) {
        $this->logdai->deleteLog($id);
        $this->session->set_flashdata('berhasil', 'Data Log <b>' . urldecode($explain) . '</b> Berhasil Di Hapus');
        redirect('it');
    }

    public function createIp(){
        if(! $_POST) {
            $data = (object) $this->ip->getDefaultValues();
        } else {
            if ($this->input->post('id-ipaddr', true)) {
                $data = array(
                    'id' => $this->input->post('id-ipaddr', true),
                    'ipaddr' => $this->input->post('ipaddr', true),
                    'name' => $this->input->post('name', true)
                );
            } else {
                $data = array(
                    'ipaddr' => $this->input->post('ipaddr', true),
                    'name' => $this->input->post('name', true)
                );
            }
        }
        if (count($data[id]) > 0) {
            $id = $data[id];
            // unset($data[id]);
            $this->ip->updateDataIp($id, $data);
            $this->session->set_flashdata('berhasil', 'Data IP Berhasil Di Edit ');
        } else {
            $this->ip->insertIp($data);
            $this->session->set_flashdata('berhasil', 'Data IP Berhasil Di Tambahkan ');
        }
        redirect('it');
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
        redirect('it');    
    }
    
    public function deleteRemote($id, $explain) {
        $this->rmt->deleteRemote($id);
        $this->session->set_flashdata('berhasil', 'Data Remote <b>' . urldecode($explain) . '</b> Berhasil Di Hapus');
        redirect('it');
    }
    
    public function updateIp($id) {
        $updated_data = array(
            'ipaddr' => $this->input->post('ipaddr'),
            'name' => $this->input->post('name')
        );

        $this->ip->updateDataIp($id, $updated_data);
        $this->session->set_flashdata('berhasil','Data IP Berhasil Di Edit');
        redirect('it');    
    }

    public function deleteIp($id, $explain) {
        $this->ip->deleteIp($id);
        $this->session->set_flashdata('berhasil', 'Data IP <b>' . urldecode($explain) . '</b> Berhasil Di Hapus');
        redirect('it');
    }

    public function createLogTinta(){
        if(!$_POST){
            $data = (object) $this->logdai->getDefaultValues();
        }else{
            $formatted_date = (new DateTime($tanggal_cek_habis))->format('Y-m-d');

            $unit_pengguna = $this->input->post('unit_pengguna', true);
            $tinta_black = $this->input->post('tinta_black', true);
            $tinta_cyan = $this->input->post('tinta_cyan', true);
            $tinta_magenta = $this->input->post('tinta_magenta', true);
            $tinta_yellow = $this->input->post('tinta_yellow', true);

            $stok_black = $this->input->post('stok_black', true);
            $stok_cyan = $this->input->post('stok_cyan', true);
            $stok_magenta = $this->input->post('stok_magenta', true);
            $stok_yellow = $this->input->post('stok_yellow', true);
            
            $deskripsi = trim("$unit_pengguna tinta $tinta_black $tinta_cyan $tinta_magenta $tinta_yellow");
            $sisa_stok = "BK = $stok_black\n C = $stok_cyan\n M = $stok_magenta\n Y = $stok_yellow";
            if($this->input->post('idtinta',true)){
                $data = array(
                    'id'=>$this->input->post('idtinta',true),
                    'tanggal_isi'=>$this->input->post('tanggal_isi',true),
                    'tanggal_cek_habis'=>$this->input->post('tanggal_cek_habis',true),
                    'deskripsi'=>$deskripsi,
                    'sisa_stok' => $sisa_stok
                );
                // echo '<pre>';
                // var_dump($data);
                // echo '</pre>';
                // die();
            }else{
                $data = array(
                    // 'id'=>$this->input->post('idtinta',true),
                    'tanggal_isi'=>$this->input->post('tanggal_isi',true),
                    'tanggal_cek_habis'=>$this->input->post('tanggal_cek_habis',true),
                    'deskripsi'=>$deskripsi,
                    'sisa_stok' => $sisa_stok
                );
            }
        }
        if(count($data[id])>0){
            $id = $data[id];
            // unset($data[id]);
            
            // echo "ini ediitttt";
            // echo '<pre>';
            // var_dump($data);
            // echo '</pre>';
            // die();
            
            $this->logdai->updateDataLog($id,$data);
            $this->session->set_flashdata('berhasil','Data Log Berhasil Di Edit ');
        }else{
            // unset($data[id]);
            $datalog = array(
                'id' => $this->input->post('user_tinta',true)."_". date('dmYHis'),
                'NIK' => $this->input->post('user_tinta',true),
                'tanggal' => $formatted_date,
                'judul_act' => "isi ulang tinta di $unit_pengguna",
                'deskripsi_act' => "isi ulang tinta $deskripsi",
                'catatan' => "-"
            );
            // echo "ini penambahan";
            // echo '<pre>';
            // var_dump($data);
            // var_dump($datalog);
            // echo '</pre>';
            // die();
            $this->tinta->insertLogTinta($data);
            $this->logdai->insertLog($datalog);
            $this->session->set_flashdata('berhasil','Data Log Tinta Berhasil Di Tambahkan ');
        }
        redirect('it'); 
    }
    public function deleteTinta($id, $explain) {
        $this->tinta->deleteTinta($id);
        $this->session->set_flashdata('berhasil', 'Data IP <b>' . urldecode($explain) . '</b> Berhasil Di Hapus');
        redirect('it');
    }

    public function logout(){
        // $this->user->logout();
        // redirect('it');
        $this->session->sess_destroy();

        redirect('it');
    }

    // public function login(){
    //     $login = $this->session->userdata('login');
    //     if(!$login){
    //         redirect('login');
    //     }else{
    //         redirect('it');
    //     }
    // }
}
