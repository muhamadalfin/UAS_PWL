<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Http;
use App\Http\Controllers\Controller;
use App\User;

use GuzzleHttp\Client;

class ReservasiController extends Controller
{

    private $__client;

    public function __construct() {
        $this->middleware('auth');

        $this->_client = new Client([
            'base_uri' => 'http://localhost/laravel-ci-server/hotel-server/api/'
        ]);
    }


    public function index(){

        $response = $this->_client->request('GET', 'Reservasi');

        $result = json_decode($response->getBody()->getContents(), true);
        
        $Reservasi = $result['data'];

        return view('reservasi.index',['Reservasi' => $Reservasi]);
    }

    public function cari(Request $request)
	{
		$keyword = $request->cari;
        
        $response = $this->_client->request('GET', 'Reservasi', [
            'query' => [
                'id_reservasi' => '',
                'keyword' => $keyword
            ]
        ]);

        $result = json_decode($response->getBody()->getContents(), true);

        $Reservasi = $result['data'];

        return view('reservasi.index',['Reservasi' => $Reservasi]);
 
	}

    public function hapus($id) {

        $response = $this->_client->request('DELETE', 'Reservasi', [
            'form_params' => [
                'id_reservasi' => $id
            ]
        ]);

        $result = json_decode($response->getBody()->getContents(), true);

        return redirect('/reservasi');
    }

}
