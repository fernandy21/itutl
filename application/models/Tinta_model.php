<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Tinta_model extends CI_Model{
    private $table = 'log_tinta';


    public function getDefaultValues(){
        return [
            'id'=>'',
            'tanggal_isi'=>'',
            'tanggal_cek_habis'=>'',
            'deskripsi'=>'',
            'sisa_stok'=>''
        ];
    }

    public function getDataTinta() {
        return $this->db->select('*')->from($this->table)->order_by('id', 'DESC')->get()->result();
    }

    public function insertLogTinta($data){
        return $this->db->insert($this->table,$data);
    }
    public function updateDataLogTinta($id, $data) {
        return $this->db->where('id', $id)->update($this->table, $data);
    }
    public function deleteTinta($id) {
        $this->db->where('id', $id)->delete($this->table);
    }
}