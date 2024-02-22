<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Lembur_model extends CI_Model{
    private $table = 'lembur_it';


    public function getDefaultValues(){
        return [
            'id'=>'',
            'username'=>'',
            'tanggal'=>'',
            'sub_judul'=>'',
            'perihal'=>'',
            'perihal'=>'',
            'durasi'=>''
        ];
    }

    public function getLemburList(){
        $this->db->select('*');
        $this->db->from($this->table.' as a');
        $this->db->join('user_it as b', 'a.username = b.username');
        return $query = $this->db->get()->result();            
    }

    public function getLemburId($id) {
        $query = $this->db->select('*')
                        ->from('lembur_it')
                        ->join('user_it', 'lembur_it.username = user_it.username')
                        ->where('lembur_it.id', $id)
                        ->get();
        return $result = $query->row();

    }
    public function getLemburGroupNamaByBulan() {
        return $query = $this->db->select('*')
                  ->from('lembur_it')
                  ->where('month(lembur_it.tanggal)',date('m'))
                  ->where('year(lembur_it.tanggal)',date('Y'))
                  ->join('user_it', 'lembur_it.username = user_it.username')
                  ->group_by('user_it.nama')
                  ->order_by('user_it.nama')
                  ->get()
                  ->result();
                        
        // echo '<pre>';
        // var_dump($query);
        // echo '</pre>';
        // die();
    }

    // public function insertIp($data){
    //     return $this->db->insert($this->table,$data);
    // }

    // public function updateDataIp($id, $data) {
    //     // Update data in the database
    //     return $this->db->where('id', $id)->update($this->table, $data);
    // }

    // public function deleteIp($id) {
    //     // Delete data from the database
    //     $this->db->where('id', $id)->delete($this->table);
    // }
}