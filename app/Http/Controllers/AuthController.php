<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class AuthController extends Controller
{
    public function create(){
        return view('auth.registr');
    }

    public function registr(Request $request){
        // var_dump($request->name);
        // var_dump(request('name'));
        $request->validate([
            'name' => 'required',
            'email' => 'required|email',
            'password' => 'required|min:6'
            ]
        );
        $response = [
            'name' => $request->name,
            'email' => $request->email,
            'password' => $request->password
        ];
        return response()->json($response);
    }


    // public function registr(Request $request){
    //     var_dump($request->name);
    //     var_dump(request('name'));
    //     $request -> validate([
    //         'name' => 'required',
    //         'email' => 'required | email',
    //         'password' => 'required | min:6'
    //     ]);
    //     $response = [
    //         'name' => $request->name,
    //         'email' => $request->email,
    //     ];
    //     return response()->json($response);
    // }
}

