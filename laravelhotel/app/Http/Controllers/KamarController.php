<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Http;
use App\Http\Controllers\Controller;
use App\User;

use GuzzleHttp\Client;

class KamarController extends Controller
{

    private $__client;

    public function __construct() {
        $this->middleware('auth');

        $this->_client = new Client([
            'base_uri' => 'http://localhost/laravel-ci-server/hotel-server/api/'
        ]);
    }

    public function index(){

        $response = $this->_client->request('GET', 'Kamar');

        $result = json_decode($response->getBody()->getContents(), true);
        
        $Kamar = $result['data'];

        return view('kamar.index',['Kamar' => $Kamar]);
    }

    public function cari(Request $request)
	{
		$keyword = $request->cari;
        
        $response = $this->_client->request('GET', 'kamar', [
            'query' => [
                'id_kamar' => '',
                'keyword' => $keyword
            ]
        ]);

        $result = json_decode($response->getBody()->getContents(), true);

        $Kamar = $result['data'];
 
		return view('kamar.index',['Kamar' => $Kamar]);
 
	}

    public function tambah() {
        return view('kamar.tambah');
    }

    public function simpan(Request $request) {

        $data=[
            "no_kamar"=> $request->nokamar,
            "type"=> $request->type,
            "harga"=> $request->harga,
        ];
        
        $response = $this->_client->request('POST', 'Kamar', [
            'form_params' => $data
        ]);
        
        $keyword = $request->nokamar;

        $response = $this->_client->request('GET', 'kamar', [
            'query' => [
                'id_kamar' => '',
                'keyword' => $keyword
            ]
        ]);

        $result = json_decode($response->getBody()->getContents(), true);

        $Kamar = $result['data'][0];
        
        return view('kamar.simpan',['Kamar' => $Kamar]);

    }

    public function detail($id) {

        $response = $this->_client->request('GET', 'Kamar', [
            'query' => [
                'id_kamar' => $id,
                'keyword' => ''
            ]
        ]);
        
        $result = json_decode($response->getBody()->getContents(), true);

        $Kamar = $result['data'][0];

        return view('kamar.detail',['Kamar' => $Kamar]);
    }

    public function edit($id) {
        
        $response = $this->_client->request('GET', 'kamar', [
            'query' => [
                'id_kamar' => $id,
                'keyword' => ''
            ]
        ]);

        $result = json_decode($response->getBody()->getContents(), true);

        $Kamar = $result['data'][0];

        return view('kamar.edit',['Kamar' => $Kamar]);
    }

    public function update(Request $request) {

        $data=[
            "no_kamar"=> $request->nokamar,
            "type"=> $request->type,
            "harga"=> $request->harga,
            "id_kamar"=> $request->id_kamar
        ];

        $response = $this->_client->request('PUT', 'Kamar', [
            'form_params' => $data
        ]);

        $result = json_decode($response->getBody()->getContents(), true);
        
        return redirect('/kamar');
    }

    public function hapus($id) {

        $response = $this->_client->request('DELETE', 'Kamar', [
            'form_params' => [
                'id_kamar' => $id
            ]
        ]);

        $result = json_decode($response->getBody()->getContents(), true);

        return redirect('/kamar');
    }

}
