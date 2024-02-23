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

    public function getLemburNama($nama) {
       return $query = $this->db->select('*')
                        ->from('lembur_it')
                        ->join('user_it', 'lembur_it.username = user_it.username')
                        ->where('user_it.Nama', $nama)
                        ->get()
                        ->result();

    }

    public function getLemburGroupNamaByBulan() {
        // Execute the query
        $query_result = $this->db->select('a.*, MONTH(a.tanggal) as bulan, user_it.nama')
            ->from('lembur_it as a')
            ->where('MONTH(a.tanggal)', date('m'))
            ->where('YEAR(a.tanggal)', date('Y'))
            ->join('user_it', 'a.username = user_it.username')
            ->group_by('user_it.nama')
            ->order_by('user_it.nama')
            ->get()
            ->result();



        // Array to map month number to Bahasa Indonesia month name
        $month_names = array(
            '1' => 'Januari',
            '2' => 'Februari',
            '3' => 'Maret',
            '4' => 'April',
            '5' => 'Mei',
            '6' => 'Juni',
            '7' => 'Juli',
            '8' => 'Agustus',
            '9' => 'September',
            '10' => 'Oktober',
            '11' => 'November',
            '12' => 'Desember'
        );

        // Loop through the result set and convert the month number to Bahasa Indonesia month name
        foreach ($query_result as $row) {
            $bulan_indo_name = $month_names[$row->bulan]; // Get Bahasa Indonesia month name
            $row->bulan = $bulan_indo_name; // Replace the month number with Bahasa Indonesia month name
        }

        // Return the modified result set
        return $query_result;
                        
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