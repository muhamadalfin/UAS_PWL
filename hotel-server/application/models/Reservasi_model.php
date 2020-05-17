<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class Reservasi_model extends CI_Model {

    public function getAllreservasi($id = null){
        if ($id === null) {
            $this->db->select('r.id_reservasi, p.nama, p.alamat, p.tlp, p.ktp, k.no_kamar, k.type, k.harga, r.tgl_masuk, r.tgl_keluar');
            $this->db->from('reservasi r');
            $this->db->join('pengunjung p','p.id_pengunjung = r.id_pengunjung');
            $this->db->join('kamar k','k.id_kamar = r.id_kamar');
            //$this->db->where('r.id_pengunjung','1');
            $query = $this->db->get();
            return $query->result_array();
        } else {
            $this->db->select('r.id_reservasi, p.nama, p.alamat, p.tlp, p.ktp, k.no_kamar, k.type, k.harga, r.tgl_masuk, r.tgl_keluar');
            $this->db->from('reservasi r');
            $this->db->join('pengunjung p','p.id_pengunjung = r.id_pengunjung');
            $this->db->join('kamar k','k.id_kamar = r.id_kamar');
            $this->db->where('r.id_pengunjung', $id);
            $query = $this->db->get();
            return $query->result_array();
        }
        
    }

    public function cariDatareservasi($keyword){
        $this->db->select('r.id_reservasi, p.nama, p.alamat, p.tlp, p.ktp, k.no_kamar, k.type, k.harga, r.tgl_masuk, r.tgl_keluar');
        $this->db->from('reservasi r');
        $this->db->join('pengunjung p','p.id_pengunjung = r.id_pengunjung');
        $this->db->join('kamar k','k.id_kamar = r.id_kamar');
        //$this->db->where('r.id_pengunjung', $id);
        $this->db->like('p.nama',$keyword);
        $this->db->or_like('p.ktp',$keyword);
        $query = $this->db->get();
        return $query->result_array();
    }

    public function hapusReservasi($id){
        $this->db->delete('reservasi', ['id_reservasi' => $id]);
        return $this->db->affected_rows();
    }

}



?>