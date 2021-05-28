<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Http;

class ConnexionController extends Controller
{
    function userLogin(Request $req)
    {

        $http = Http::post(env('API_BASE_URL') . '/auth/login',[
           'login'=> $req->input("login"),
           'password'=> $req->input("password"),
        ]);

        if ($http->status() == 401){
            return view('login');
        }
        session(['api_token' => $http->object()->access_token]);

        $http = Http::withHeaders(['Authorization' => 'Bearer ' . session()->get('api_token')])
            ->post(env('API_BASE_URL').'/auth/me');



        session(['privileges' => $http->object()->applications_privileges]);

        session(['firstname' => $http->object()->firstname]);
        session(['lastname' => $http->object()->lastname]);


        return redirect()->route('home');
    }

    public function index()
    {
        return view('login');
    }

    public function logout()
    {
        Http::withHeaders(['Authorization' => 'Bearer' .session()->get('api_token')])->post(env('API_BASE_URL') . '/auth/logout');

        //vider la session
        session()->pull('api_token');
        session()->pull('firstname');
        session()->pull('lastname');
        session()->pull('privileges');

        return redirect()->route('login');
    }
}
