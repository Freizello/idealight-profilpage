<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class ProfileController extends Controller
{
    public function index()
    {
        $profil = $this->getProfil();
        $profil = $profil->results['0']; // menghapus elemen result & key 0

        $data = [
            'profil' => $profil
        ];

        return view('profile', $data);
    }

    public function getProfil()
    {
        $client = new \GuzzleHttp\Client();
        $url = 'https://randomuser.me/api/';
        $request = $client->get($url);
        $response = $request->getBody();
        $konten = $response->getContents(); // String

        return json_decode($konten);
    }

    public function refreshProfil()
    {
        $profil = $this->getProfil();
        $profil = $profil->results['0']; // menghapus elemen result & key 0

        return response()->json([
            'success'=>'Got Simple Ajax Request.',
            'profil' => $profil,
        ]);
    }
}
