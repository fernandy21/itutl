<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Logdai_model extends CI_Model{
    private $table = 'daily_log';


    public function getDefaultValues(){
        return [
            'id'=>'',
            'username'=>'',
            'tanggal'=>'',
            'judul_act'=>'',
            'deskripsi_act'=>'',
            'note'=>''
        ];
    }

    public function getUsers() {
        $this->db->select('*');
        return $query = $this->db->get('user_it')->result();
    }

    public function getAllLog(){
        return $query = $this->db->select('*')
                ->from($this->table)
                ->join('user_it as b', 'daily_log.NIK = b.NIK')
                ->order_by('tanggal', 'DESC')
                ->get()
                ->result();
    }

    public function getLogWeekly(){
        return $query = $this->db->select('*')
                ->from($this->table)
                ->where("WEEK(daily_log.tanggal) = WEEK(NOW())")
                // ->where("b.NIK LIKE '%234.030221%'")
                ->join('user_it as b', 'daily_log.NIK = b.NIK')
                ->get()
                ->result();
    }

    public function getLogByName(){

        return $query = $this->db->select('user_it.NIK, user_it.username, user_it.Nama')
                ->from($this->table)
                ->where("WEEK(daily_log.tanggal) = WEEK(NOW())")
                ->join('user_it', 'daily_log.NIK = user_it.NIK')
                ->group_by('user_it.NIK')
                ->get()
                ->result();
        // echo '<pre>';
        // var_dump($query);
        // echo '</pre>';
        // die();
    }

    public function getLogByNameData($nik){
        return $this->db->select('*')
                ->from('daily_log')
                ->join('user_it', 'user_it.NIK = daily_log.NIK')
                ->where("WEEK(daily_log.tanggal) = WEEK(NOW())")
                ->where("user_it.NIK",$nik)
                ->get()
                ->result();
    }

    public function insertLog($data){
        return $this->db->insert($this->table,$data);
    }
    
    public function updateDataLog($id, $data) {
        // Update data in the database
        return $this->db->where('id', $id)->update($this->table, $data);
    }

    public function deleteLog($id) {
        // Delete data from the database
        $this->db->where('id', $id)->delete($this->table);
    }

}