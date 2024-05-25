<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Remote_model extends CI_Model{
    private $table = 'RemoteList';


    public function getDefaultValues(){
        return [
            'RemoteAddr'=>'',
            'Nama'=>''
        ];
    }
    
    public function getRemoteList(){
        return $this->db->select('id,RemoteAddr,Nama')
                    ->from($this->table)
                    // ->order_by('ipaddr','DESC')
                    // ->limit('1')
                    ->get()
                    ->result();
    }

    public function insertRemote($data) {
        try {
            // Debug: Log the data being inserted
            error_log('Inserting data: ' . print_r($data, true));
    
            // Attempt to insert the data into the database
            $result = $this->db->insert($this->table, $data);
    
            // Debug: Log the result of the insert operation
            error_log('Insert result: ' . var_export($result, true));
    
            // Return the result of the insert operation
            return $result;
        } catch (Exception $e) {
            // Handle the exception
            error_log('Database insert error: ' . $e->getMessage());
    
            // Return false to indicate failure
            return false;
        }
    }

    public function updateDataRemote($id, $data) {
        // Update data in the database
        return $this->db->where('id', $id)->update($this->table, $data);
    }

    public function deleteRemote($id) {
        // Delete data from the database
        $this->db->where('id', $id)->delete($this->table);
    }
}