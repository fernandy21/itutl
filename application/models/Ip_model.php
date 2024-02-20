<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Ip_model extends CI_Model{
    private $table = 'IpList';


    public function getDefaultValues(){
        return [
            'ipaddr'=>'',
            'name'=>''
        ];
    }
    
    public function getIpList(){
        return $this->db->select('id,ipaddr,name')
                    ->from($this->table)
                    // ->order_by('ipaddr','DESC')
                    // ->limit('1')
                    ->get()
                    ->result();
    }

    public function insertIp($data){
        return $this->db->insert($this->table,$data);
    }

    public function updateDataIp($id, $data) {
        // Update data in the database
        return $this->db->where('id', $id)->update($this->table, $data);
    }

    public function deleteIp($id) {
        // Delete data from the database
        $this->db->where('id', $id)->delete($this->table);
    }
}