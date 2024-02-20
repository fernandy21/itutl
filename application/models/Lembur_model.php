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
        return $this->db->select('id, username, tanggal, sub_judul, perihal, perihal, durasi')
                    ->from($this->table)
                    // ->order_by('ipaddr','DESC')
                    // ->limit('1')
                    ->get()
                    ->result();
    }

    public function getLemburId($id) {
        // Fetch data by ID from the database
        // return $this->db->where('id',$id)->get($this->table)->row();
        return $this->db->get_where($this->table, array('id' => $id))->row(); // Return single row
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