<?php

use Restserver\Libraries\REST_Controller;

defined('BASEPATH') OR exit('No direct script access allowed');

require APPPATH . '/libraries/REST_Controller.php';

class Reservasi extends REST_Controller {

   public function __construct(){
       parent::__construct();
        $this->load->model('Reservasi_model');
   }

   public function index_get()
   {

       $id = $this->get('id_reservasi');
       $keyword = $this->get('keyword');

       if ($id === null || $keyword === null) {
            $Reservasi = $this->Reservasi_model->getAllReservasi();
       }else if ($id || $keyword === null) {
            $Reservasi = $this->Reservasi_model->getAllReservasi($id);
       }else if ($id === null || $keyword) {
            $Reservasi = $this->Reservasi_model->cariDatareservasi($keyword);
       }else {
            $Reservasi = $this->Reservasi_model->getAllReservasi();
       }
       
       if ($Reservasi) {
           $this->response([
               'status' => TRUE,
               'data' => $Reservasi
           ], REST_Controller::HTTP_OK);
       } else {
           $this->response([
               'status' => FALSE,
               'message' => 'id tidak ditemukan !'
           ], REST_Controller::HTTP_NOT_FOUND);
       }
   }

   public function index_delete() {
       
       $id = $this->delete('id_reservasi');

       if ($id === null) {
           $this->response([
               'status' => FALSE,
               'message' => 'id tidak di isi !'
           ], REST_Controller::HTTP_BAD_REQUEST);
       } else {
           if ($this->Reservasi_model->hapusReservasi($id) > 0) {
               $this->response([
                   'status' => TRUE,
                   'id_Reservasi' => $id,
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

  
}


?>