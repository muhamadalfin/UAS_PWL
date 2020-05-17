<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class Kamar_model extends CI_Model {

    //user_login
    public function listkamarA(){
        $query = $this->db->query("SELECT * FROM kamar WHERE no_kamar LIKE '%A%'");
        return $query->result_array();
    }

    public function listkamarB(){
        $query = $this->db->query("SELECT * FROM kamar WHERE no_kamar LIKE '%B%'");
        return $query->result_array();
    }

    public function listkamarC(){
        $query = $this->db->query("SELECT * FROM kamar WHERE no_kamar LIKE '%C%'");
        return $query->result_array();
    }

    public function listkamarD(){
        $query = $this->db->query("SELECT * FROM kamar WHERE no_kamar LIKE '%D%'");
        return $query->result_array();
    }

    public function cariDataPengunjung(){
        $no_kamar = $this->session->userdata('no_kamar');
        $query = $this->db->query("SELECT * FROM kamar WHERE no_kamar = '$no_kamar' ");
        return $query->result_array();
    }

    public function datatabels($id_kamar = null) {
        if ($id_kamar === null) {
            $query = $this->db->order_by('id_kamar')->get('kamar');
            return $query->result_array();
        } else {
            return $this->db->get_where('kamar', ['id_kamar' => $id_kamar])->result_array();
        }
    }

    public function hapusKamar($id) {
        $this->db->delete('kamar', ['id_kamar' => $id]);
        return $this->db->affected_rows();
    }

    public function tambahKamar($data2){
            $this->db->insert('kamar', $data2);
            return $this->db->affected_rows();
    }

    public function cekKamar($no_kamar){
        $this->db->select('no_kamar,type,harga');
        $this->db->from('kamar');
         $this->db->where('no_kamar',$no_kamar);
        //$this->db->limit(1);
        return $this->db->affected_rows();
    }

    public function ubahKamar($data, $id){
        $this->db->update('kamar', $data, ['id_kamar' => $id]);
        return $this->db->affected_rows();
    }

    public function cariDatakamar($keyword){
        $this->db->like('no_kamar',$keyword);
        $this->db->or_like('type',$keyword);
        return $this->db->get('kamar')->result_array();
    }

    /*public function getAllkamar(){
       return $this->db->get('kamar')->result_array();
   }

   public function tambahdatakm(){
       $data=[
            "nokamar"=> $this->input->post('no_kamar',true),
            "type"=> $this->input->post('type',true),
            "harga"=> $this->input->post('harga',true),
       ];
       $this->db->insert('kamar',$data);
   }

   public function hapusdatamkm($id_kamar){
       $this->db->where('id_kamar',$id_kamar);
       $this->db->delete('kamar');
   }

   public function getkamarByID($id_kamar){
       return $this->db->get_where('kamar',['id_kamar'=>$id_kamar])->row_array();
   }

   public function ubahdatakm(){
        $data=[
            "no_kamar"=> $this->input->post('no_kamar',true),
            "type"=> $this->input->post('type',true),
            "harga"=> $this->input->post('harga',true),
        ];
        $this->db->where('id_kamar',$this->input->post('id_kamar'));
        $this->db->update('kamar',$data);
   }

   public function cariDatakamar(){
       $keyword=$this->input->post('keyword');
       $this->db->like('no_kamar',$keyword);
       $this->db->or_like('type',$keyword);
       return $this->db->get('kamar')->result_array();
   }

    public function booked(){
        $data=[
            "name"=> $this->input->post('name',true),
            "ktp"=> $this->input->post('ktp',true),
            "tlp"=> $this->input->post('tlp',true),
            "alamat"=> $this->input->post('alamat',true),
        ];
        $this->db->insert('pengunjung',$data);
        
    }*/
}


?>