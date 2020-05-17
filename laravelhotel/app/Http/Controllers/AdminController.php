<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Http;
use App\Http\Controllers\Controller;
use App\User;

use GuzzleHttp\Client;

class AdminController extends Controller
{

    private $__client;

    public function __construct() {
        $this->middleware('auth');

        $this->_client = new Client([
            'base_uri' => 'http://localhost/laravel-ci-server/hotel-server/api/'
        ]);
    }
    
    /*public function __construct()
    {
        $this->middleware('auth');
    }*/

    public function index(){

        $response = $this->_client->request('GET', 'Administrator');

        $result = json_decode($response->getBody()->getContents(), true);
        
        $Administrator = $result['data'];

        return view('index',['Administrator' => $Administrator]);
    }

    public function cari(Request $request)
	{
		$keyword = $request->cari;
        
        $response = $this->_client->request('GET', 'Administrator', [
            'query' => [
                'id' => '',
                'keyword' => $keyword
            ]
        ]);

        $result = json_decode($response->getBody()->getContents(), true);

        $Administrator = $result['data'];
 
		return view('index',['Administrator' => $Administrator]);
 
	}

    public function tambah() {
        return view('tambah');
    }

    public function simpan(Request $request) {
        
        $this->validate($request,[
            'namamhs' => 'required',
            'nimmhs' => 'required|numeric',
            'emailmhs' => 'required|email',
            'jurusanmhs' => 'required'
        ]);

        DB::table('mahasiswa')->insert([
            'nama' => $request->namamhs,
            'nim' => $request->nimmhs,
            'email' => $request->emailmhs,
            'jurusan' => $request->jurusanmhs
        ]);

        $response = $this->_client->request('PUT', 'Administrator', [
            'form_params' => $data
        ]);

        return view('simpan',['data' => $request]);
        //return redirect('/mahasiswa');
    }

    public function detail($id) {

        /*$response = Http::get('http://localhost/rest-api/hotel-server/api/Administrator',
            [
                'query' => [
                'id' => $id,
                'keyword' => ''
                ]
            ]);*/

            $response = $this->_client->request('GET', 'Administrator', [
                'query' => [
                    'id' => $id,
                    'keyword' => ''
                ]
            ]);
        
        $result = json_decode($response->getBody()->getContents(), true);

        $Administrator = $result['data'][0];
        //return $result['data'][0];
        return view('detail',['Administrator' => $Administrator]);
    }

    public function edit($id) {
        
        $response = $this->_client->request('GET', 'Administrator', [
            'query' => [
                'id' => $id,
                'keyword' => ''
            ]
        ]);

        $result = json_decode($response->getBody()->getContents(), true);

        $Administrator = $result['data'][0];
        //return $result['data'][0];
        return view('edit',['Administrator' => $Administrator]);
    }

    public function update(Request $request) {

        $data=[
            "nama"=> $request->nama,
            "username"=> $request->username,
            "password"=> $request->password,
            "tlp"=> $request->tlp,
            "level"=> $request->level,
            "status"=> $request->status,
            "id"=> $request->id_user
        ];
        
        $response = $this->_client->request('PUT', 'Administrator', [
            'form_params' => $data
        ]);

        $result = json_decode($response->getBody()->getContents(), true);
        
        return redirect('/administrator');
    }

    public function hapus($id) {

        $response = $this->_client->request('DELETE', 'Administrator', [
            'form_params' => [
                'id_user' => $id
            ]
        ]);

        $result = json_decode($response->getBody()->getContents(), true);

        return redirect('/administrator');
    }

}
