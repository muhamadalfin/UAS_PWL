<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Http;
use App\Http\Controllers\Controller;
use App\User;

use GuzzleHttp\Client;

class PengunjungController extends Controller
{

    private $__client;

    public function __construct() {
        $this->middleware('auth');

        $this->_client = new Client([
            'base_uri' => 'http://localhost/laravel-ci-server/hotel-server/api/'
        ]);
    }

    public function index(){

        $response = $this->_client->request('GET', 'Pengunjung');

        $result = json_decode($response->getBody()->getContents(), true);
        
        $Pengunjung = $result['data'];

        return view('pengunjung.index',['Pengunjung' => $Pengunjung]);
    }

    public function cari(Request $request)
	{
		$keyword = $request->cari;
        
        $response = $this->_client->request('GET', 'Pengunjung', [
            'query' => [
                'id_pengunjung' => '',
                'keyword' => $keyword
            ]
        ]);

        $result = json_decode($response->getBody()->getContents(), true);

        $Pengunjung = $result['data'];
 
		return view('pengunjung.index',['Pengunjung' => $Pengunjung]);
 
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

        $response = $this->_client->request('PUT', 'Pengunjung', [
            'form_params' => $data
        ]);

        return view('simpan',['data' => $request]);
        //return redirect('/mahasiswa');
    }

    public function detail($id) {

        $response = $this->_client->request('GET', 'Pengunjung', [
            'query' => [
                'id_pengunjung' => $id,
                'keyword' => ''
            ]
        ]);
        
        $result = json_decode($response->getBody()->getContents(), true);

        $Pengunjung = $result['data'][0];
        //return $result['data'][0];
        return view('pengunjung.detail',['Pengunjung' => $Pengunjung]);
    }

    public function edit($id) {
        
        $response = $this->_client->request('GET', 'Pengunjung', [
            'query' => [
                'id_pengunjung' => $id,
                'keyword' => ''
            ]
        ]);

        $result = json_decode($response->getBody()->getContents(), true);

        $Pengunjung = $result['data'][0];
        //return $result['data'][0];
        return view('pengunjung.edit',['Pengunjung' => $Pengunjung]);
    }

    public function update(Request $request) {

        $data=[
            "nama"=> $request->nama,
            "ktp"=> $request->tlp,
            "tlp"=> $request->tlp,
            "alamat"=> $request->alamat,
            "id"=> $request->id_pengunjung
        ];
        
        $response = $this->_client->request('PUT', 'Pengunjung', [
            'form_params' => $data
        ]);

        $result = json_decode($response->getBody()->getContents(), true);
        
        return redirect('/pengunjung');
    }

    public function hapus($id) {
        $response = $this->_client->request('DELETE', 'Pengunjung', [
            'form_params' => [
                'id_pengunjung' => $id
            ]
        ]);

        $result = json_decode($response->getBody()->getContents(), true);

        return redirect('/pengunjung');
    }

}
