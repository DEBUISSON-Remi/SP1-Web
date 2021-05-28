<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Http;

class PractitionerController extends Controller
{
    public function list()
    {

        $http=Http::get(env('API_BASE_URL').'/practitioner');

        $users = $http->object();

        //dd($users[4]);

        return view('portefeuillePraticien',[
            'users'=>$users
        ]);
    }
}
