<?php

use Restserver\Libraries\REST_Controller;

defined('BASEPATH') OR exit('No direct script access allowed');

require APPPATH . '/libraries/REST_Controller.php';

class Kamar extends REST_Controller {

   public function __construct(){
       parent::__construct();
        $this->load->model('Kamar_model');
   }

    public function index_get()
    {

        $id_kamar = $this->get('id_kamar');
        $keyword = $this->get('keyword');

        if ($id_kamar === null || $keyword === null) {
            $Kamar = $this->Kamar_model->datatabels();
        }else if ($id_kamar || $keyword === null){
            $Kamar = $this->Kamar_model->datatabels($id_kamar);
        }else if ($id_kamar === null || $keyword) {
            $Kamar = $this->Kamar_model->cariDatakamar($keyword);
        }else {
            $Kamar = $this->Kamar_model->datatabels();
        }
        
        if ($Kamar) {
            $this->response([
                'status' => TRUE,
                'data' => $Kamar
            ], REST_Controller::HTTP_OK);
        } else {
            $this->response([
                'status' => FALSE,
                'message' => 'id tidak ditemukan !'
            ], REST_Controller::HTTP_NOT_FOUND);
        }
    }

    public function index_delete() {
        
        $id_kamar = $this->delete('id_kamar');

        if ($id_kamar === null) {
            $this->response([
                'status' => FALSE,
                'message' => 'id tidak di isi !'
            ], REST_Controller::HTTP_BAD_REQUEST);
        } else {
            if ($this->Kamar_model->hapusKamar($id_kamar) > 0) {
                $this->response([
                    'status' => TRUE,
                    'id_kamar' => $id_kamar,
                    'message' => 'dihapus.'
                ], REST_Controller::HTTP_NO_CONTENT);
            } else {
                $this->response([
                    'status' => FALSE,
                    'message' => 'id tidak ditemukan !'
                ], REST_Controller::HTTP_BAD_REQUEST);
            }
        }
    }

    public function index_post() {

        //$type = $this->post('type');

        /*$data1=[
            "no_kamar"=> $this->post('no_kamar'),
            "alamat"=> $this->post('alamat'),
            "tlp"=> $this->post('tlp'),
            "ktp"=> $this->post('ktp')
	   	];*/
		$data2=[
			"no_kamar"=> $this->post('no_kamar'),
            "type"=> $this->post('type'),
            "id_kamar"=> $this->post('id_kamar')
		];
        
        
        //if($this->Kamar_model->cekUser($type) > 0) {
            if ($this->Kamar_model->tambahKamar($data2) > 0) {
                //if ($this->Kamar_model->tambahPengunjung($data1) > 0 ) {
                    $this->response([
                        'status' => TRUE,
                        'message' => 'Data berhasil dibuat.'
                    ], REST_Controller::HTTP_CREATED);
                //}
            }else {
                $this->response([
                    'status' => FALSE,
                    'message' => 'Data gagal dibuat !'
                ], REST_Controller::HTTP_BAD_REQUEST);
            }
        /*} else {
            $this->response([
                'status' => FALSE,
                'message' => 'type telah digunakan !'
            ], REST_Controller::HTTP_BAD_REQUEST);
        }*/
        
    }

    public function index_put() {

        //$type = htmlspecialchars($this->put('type'));
        $id_kamar = $this->put('id_kamar');

		$data=[
            "id_kamar"=> $this->put('id_kamar'),
			"no_kamar"=> $this->put('no_kamar'),
            "type"=> $this->put('type'),
            "harga"=> $this->put('harga')
        ];

        //if($this->Kamar_model->cekUser($type) > 0) {
            if ($this->Kamar_model->ubahKamar($data, $id_kamar) > 0) {
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
                'message' => 'type telah digunakan !'
            ], REST_Controller::HTTP_BAD_REQUEST);
        }*/
    }

}


?>