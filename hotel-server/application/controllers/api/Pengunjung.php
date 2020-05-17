<?php

use Restserver\Libraries\REST_Controller;

defined('BASEPATH') OR exit('No direct script access allowed');

require APPPATH . '/libraries/REST_Controller.php';

class Pengunjung extends REST_Controller {

   public function __construct(){
       parent::__construct();
        $this->load->model('Pengunjung_model');
   }

   public function index_get() {

       $id = $this->get('id_pengunjung');
       $keyword = $this->get('keyword');

       if ($id === null || $keyword === null ) {
            $Pengunjung = $this->Pengunjung_model->getAllpengunjung();
       }else if ($id || $keyword === null){
            $Pengunjung = $this->Pengunjung_model->getAllpengunjung($id);
       }else if ($id === null || $keyword) {
            $Pengunjung = $this->Pengunjung_model->cariDatapengunjung($keyword);
       }else {
            $Pengunjung = $this->Pengunjung_model->getAllpengunjung();
       }
       
       if ($Pengunjung) {
           $this->response([
               'status' => TRUE,
               'data' => $Pengunjung
           ], REST_Controller::HTTP_OK);
       } else {
           $this->response([
               'status' => FALSE,
               'message' => 'id tidak ditemukan !'
           ], REST_Controller::HTTP_NOT_FOUND);
       }
   }

   public function index_delete() {
       
       $id = $this->delete('id_pengunjung');

       if ($id === null) {
           $this->response([
               'status' => FALSE,
               'message' => 'id tidak di isi !'
           ], REST_Controller::HTTP_BAD_REQUEST);
       } else {
           if ($this->Pengunjung_model->hapusPengunjung($id) > 0) {
               $this->response([
                   'status' => TRUE,
                   'id_pengunjung' => $id,
                   'message' => 'dihapus.'
               ], REST_Controller::HTTP_OK);
           } else {
               $this->response([
                   'status' => FALSE,
                   'message' => 'id tidak ditemukan !'
               ], REST_Controller::HTTP_BAD_REQUEST);
           }
       }
   }

   public function index_post() {

       //$nama = htmlspecialchars($this->post('nama'));

       $data1=[
           "nama"=> $this->post('nama'),
           "alamat"=> $this->post('alamat'),
           "tlp"=> $this->post('tlp'),
           "ktp"=> $this->post('ktp')
          ];
       /*$data2=[
           "nama"=> $this->post('nama'),
           "username"=> $this->post('username'),
           "password"=> $this->post('password'),
           "tlp"=> $this->post('tlp'),
           "level"=> $this->post('level'),
           "status"=> $this->post('status')
       ];*/
       
       
       //if($this->Pengunjung_model->cekPengunjung($nama) > 0) {
           //if ($this->Pengunjung_model->tambahUser($data2) > 0) {
               if ($this->Pengunjung_model->tambahPengunjung($data1) > 0 ) {
                   $this->response([
                       'status' => TRUE,
                       'message' => 'Data berhasil dibuat.'
                   ], REST_Controller::HTTP_CREATED);
               }
           //}
           else {
               $this->response([
                   'status' => FALSE,
                   'message' => 'Data gagal dibuat !'
               ], REST_Controller::HTTP_BAD_REQUEST);
           }
       /*} else {
           $this->response([
               'status' => FALSE,
               'message' => 'Nama telah digunakan !'
           ], REST_Controller::HTTP_BAD_REQUEST);
       }*/
       
   }

   public function index_put() {

       //$username = htmlspecialchars($this->put('username'));
       $id = $this->put('id');

       $data=[
            "nama"=> $this->put('nama'),
            "alamat"=> $this->put('alamat'),
            "tlp"=> $this->put('tlp'),
            "ktp"=> $this->put('ktp')
       ];

       //if($this->Pengunjung_model->cekUser($username) > 0) {
           if ($this->Pengunjung_model->ubahPengunjung($data, $id) > 0) {
                   $this->response([
                       'status' => TRUE,
                       'message' => 'Data berhasil di update.'
                   ], REST_Controller::HTTP_CREATED);
           }else {
               $this->response([
                   'status' => FALSE,
                   'message' => 'Data gagal di update !'
               ], REST_Controller::HTTP_BAD_REQUEST);
           }
       /*} else {
           $this->response([
               'status' => FALSE,
               'message' => 'Username telah digunakan !'
           ], REST_Controller::HTTP_BAD_REQUEST);
       }*/
   }
}


?>