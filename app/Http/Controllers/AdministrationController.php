<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Http;

class AdministrationController extends Controller
{
    public function admin()
    {

        $http=Http::get(env('API_BASE_URL').'/employee');

        $admins = $http->object();

        //dd($admins);

        return view('administration',[
            'admins'=>$admins
        ]);
    }

    public function update(Request $request , $id)
    {
        //dd($request);

        $http=Http::put(env('API_BASE_URL').'/employee/'.$id,[
            'code' => $request->input('code'),
            'postalCode' =>$request->input('postalCode'),
            'firstname' =>$request->input('firstname'),
            'lastname' =>$request->input('lastname'),
            'address' =>$request->input('address'),
            'city' =>$request->input('city'),
            'phone' =>$request->input('phone'),
        ]);


        return redirect()->route('administration');
    }
}

