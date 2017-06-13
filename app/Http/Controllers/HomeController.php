<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
//use guzzlehttp\guzzle\src\GuzzleHttp\Client;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
//        return view('home');
        
        $http = new \GuzzleHttp\Client;
        $response = $http->post('http://127.0.0.1:8000/oauth/token', [
            'form_params' => [
                'grant_type' => 'password',
                'client_id' => '3',
                'client_secret' => 'zwCGkmDLyxbFDWpR6nIE8EEAv2Rn2pzvxHo36glo',
                'username' => 'srh@wallpostdev.com',
                'password' => '123456',
                'scope' => '',
            ],
        ]);
        return json_decode((string) $response->getBody(), true);
        
    }
}
